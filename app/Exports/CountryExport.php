<?php

namespace App\Exports;

use App\Models\Country;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class CountryExport implements FromCollection
{
    public $countries;
    public $finalSelectQuery;
    public $finalHeaders;

    public function __construct($countries, $finalSelectQuery, $finalHeaders) {
        $this->countries = $countries;
        $this->finalSelectQuery = $finalSelectQuery;
        $this->finalHeaders = $finalHeaders;
    }

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
        $countries = Country::query()
            ->select($finalSelectedColumn)
            ->whereIn('id', $this->countries)
            ->get();
        $countries->prepend($this->finalHeaders);
        return $countries;
    }
}
