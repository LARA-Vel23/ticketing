<?php

namespace App\Exports;

use App\Models\Permission;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class PermissionExport implements FromCollection
{
    public $permissions;
    public $finalSelectQuery;
    public $finalHeaders;

    public function __construct($permissions, $finalSelectQuery, $finalHeaders) {
        $this->permissions = $permissions;
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
            }else {
                $finalSelectedColumn[] = $selectedColumn;
            }
        }
        $permissions = Permission::query()
            ->select($finalSelectedColumn)
            ->whereIn('id', $this->permissions)
            ->get();
        $permissions->prepend($this->finalHeaders);
        return $permissions;
    }
}
