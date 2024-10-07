<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class AdminExport implements FromCollection
{
    public $users;
    public $finalSelectQuery;
    public $finalHeaders;

    public function __construct($users, $finalSelectQuery, $finalHeaders) {
        $this->users = $users;
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
        $users = User::query()
            ->select($finalSelectedColumn)
            ->whereIn('id', $this->users)
            ->get();
        $users->prepend($this->finalHeaders);
        return $users;
    }
}
