<?php

namespace App\Livewire;

use App\Exports\IpExport;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\IP;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Maatwebsite\Excel\Facades\Excel;

class IPTable extends DataTableComponent
{
    protected $model = IP::class;

    use LivewireAlert;

    public $id;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setSearchPlaceholder('Search...')
            ->setLoadingPlaceholderStatus(true)
            ->setLoadingPlaceholderContent('Loading...')
            ->setEmptyMessage('No Resource Found')
            ->setBulkActions([
                'export' => 'Export',
                'confirmDialog' => 'Delete',
            ])

        ;
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
            ->sortable(),
            Column::make("User ID", "user_id")
                ->sortable()
                ->searchable(),
            Column::make("Value", "value")
                ->sortable()
                ->searchable(),
            Column::make("Date Created", "created_at")
                ->format(function($timestamp){
                    $timestamp = Carbon::createFromFormat('Y-m-d H:i:s', $timestamp, 'UTC')
                        ->setTimezone('Asia/Manila');
                    return date("D M j, Y, g:i A", strtotime($timestamp));
                })
                ->sortable(),
            Column::make("Last Modified", "updated_at")
                ->format(function($timestamp){
                    return Carbon::parse($timestamp)->timezone('Asia/Manila')->diffForHumans();
                })
            ->sortable(),
            Column::make('Actions', 'id')
                ->format(function($value, $column, $row) {
                    return view('pages.admin.ip.action', compact('value', 'column', 'row'));
                })
                ->excludeFromColumnSelect(),
        ];
    }

    public function builder(): Builder
    {
        return IP::query()
            // ->search(request()->get('search'))
            ->latest();
    }

    public function export()
    {
        // Data Selected
        $ip_addresses = $this->getSelected();

        // Selected Column in table
        $columns = [];
        foreach($this->columns as $column){
            $title = '';
            if(isset(explode(' ', $column->title)[1])){
                $title =  lcfirst(explode(' ', $column->title)[0]) . '-' . lcfirst(explode(' ', $column->title)[1]);
            }else {
                $title = lcfirst($column->title);
            }
            $columns[] = [$title, $column->field];
        }
        $finalSelectQuery = [];
        $headers = [];
        foreach($columns as $column){
            $headers[] = $column[0];
            if(in_array($column[0], $this->selectedColumns)){
                $finalSelectQuery[] = $column[1];
            }
        }

        // Ignore Manage Columns
        if(count($columns) == 7){
            unset($columns[count($columns)-1]);
        }
        unset($finalSelectQuery[count($finalSelectQuery)-1]);

        // Header of exported excell
        $headersForComparison = [];
        foreach($headers as $headerv2){
            if($headerv2 == 'date-created'){
                $headersForComparison[] = 'created_at';
            }
            if($headerv2 == 'last-modified'){
                $headersForComparison[] = 'updated_at';
            }
            if($headerv2 != 'date-created' && $headerv2 != 'last-modified'){
                $headersForComparison[] = $headerv2;
            }
        }

        $headerCompared = [];
        foreach($headersForComparison as $hfc){
            if(in_array($hfc, $finalSelectQuery)){
                $headerCompared[] = $hfc;
            }
        }


        $finalHeaders = [];
        foreach($headerCompared as $hc){
            $title = '';
            if(isset(explode('_', $hc)[1])){
                if(explode('_', $hc)[0] == 'created'){
                    $title =  'Date Created';
                }
                if(explode('_', $hc)[0] == 'updated'){
                    $title =  'Last Modified';
                }
            }else {
                $title = ucfirst($hc);
            }
            $finalHeaders[] = $title;
        }

        $this->clearSelected();
        return Excel::download(
            new IpExport($ip_addresses , $finalSelectQuery, $finalHeaders),
            now().'_ip-address.xlsx'
        );
    }

    #[On('delete')]
    public function delete()
    {
        try{
            User::whereIn('id', $this->getSelected())->delete();
        }catch(\Exception $e){
            $this->alert('error', 'Something went wrong please try again later.', [
                'toast' => true,
            ]);
            return;
        }
        $this->clearSelected();
        $this->resetPage();
        $this->alert('success', 'Selected Data Deleted Sucessfully!', [
            'toast' => true,
        ]);
    }

    public function confirmDialog($id=null)
    {
        $this->confirm('Warning', [
            'icon' => 'warning',
            'text' => 'Are you sure you want to delete selected records?',
            'onConfirmed' => 'delete',
            'confirmButtonText' => 'Yes! Delete',
            'cancelButtonText' => 'Cancel',
            'allowOutsideClick' => false
        ]);
    }
}
