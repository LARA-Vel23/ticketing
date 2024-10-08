<?php

namespace App\Exports;

use App\Models\IP;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class IpExport implements FromCollection
{
    public $ip_addresses;
    public $finalSelectQuery;
    public $finalHeaders;

    public function __construct($ip_addresses, $finalSelectQuery, $finalHeaders) {
        $this->ip_addresses = $ip_addresses;
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
        $ip_addresses = IP::query()
            ->select($finalSelectedColumn)
            ->whereIn('id', $this->ip_addresses)
            ->get();
        $ip_addresses->prepend($this->finalHeaders);
        return $ip_addresses;
    }
}
