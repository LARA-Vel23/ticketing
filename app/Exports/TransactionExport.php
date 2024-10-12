<?php

namespace App\Exports;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class TransactionExport implements FromCollection
{
    public $transactions;
    public $finalSelectQuery;
    public $finalHeaders;

    public function __construct($transactions, $finalSelectQuery, $finalHeaders) {
        $this->transactions = $transactions;
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
        $transactions = Transaction::query()
            ->select($finalSelectedColumn)
            ->whereIn('id', $this->transactions)
            ->get();
        $transactions->prepend($this->finalHeaders);
        return $transactions;
    }
}
