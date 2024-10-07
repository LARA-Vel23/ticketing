<?php

namespace App\Exports;

use App\Models\Role;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class RoleExport implements FromCollection
{
    public $roles;
    public $finalSelectQuery;
    public $finalHeaders;

    public function __construct($roles, $finalSelectQuery, $finalHeaders) {
        $this->roles = $roles;
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
        $roles = Role::query()
            ->select($finalSelectedColumn)
            ->whereIn('id', $this->roles)
            ->get();
        $roles->prepend($this->finalHeaders);
        return $roles;
    }
}

