<?php

namespace App\Exports;

use App\Models\Currency;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class CurrencyExport implements FromCollection
{
    public $currency;
    public $finalSelectQuery;
    public $finalHeaders;

    public function __construct($currency, $finalSelectQuery, $finalHeaders) {
        $this->currency = $currency;
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
        $currency = Currency::query()
            ->select($finalSelectedColumn)
            ->whereIn('id', $this->currency)
            ->get();
        $currency->prepend($this->finalHeaders);
        return $currency;
    }
}
