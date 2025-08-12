<?php

namespace App\Exports;

use App\Models\Bank;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class BankExport implements FromCollection
{
    public $banks;
    public $finalSelectQuery;
    public $finalHeaders;

    public function __construct($banks, $finalSelectQuery, $finalHeaders) {
        $this->banks = $banks;
        $this->finalSelectQuery = $finalSelectQuery;
        $this->finalHeaders = $finalHeaders;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $finalSelectedColumn = [];
        foreach($this->finalSelectQuery as $selectedColumn){
            if($selectedColumn == 'created_at' || $selectedColumn == 'updated_at'){
                $finalSelectedColumn[] = DB::raw('DATE_FORMAT(DATE_ADD('.$selectedColumn.', INTERVAL 8 hour), "%a %b %d, %Y, %l:%i %p")');
            } elseif($selectedColumn == 'status'){
                $finalSelectedColumn[] = DB::raw('CASE WHEN status = 1 THEN "Active" ELSE "Deactivated" END');
            }else {
                $finalSelectedColumn[] = $selectedColumn;
            }
        }
        $banks = Bank::query()
            ->select($finalSelectedColumn)
            ->whereIn('id', $this->banks)
            ->get();
        $banks->prepend($this->finalHeaders);
        return $banks;
    }
}
