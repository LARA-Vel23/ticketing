<?php

namespace App\Exports\Merchant;

use App\Models\Transaction;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class TransactionExport implements FromCollection
{
    public $transaction;
    public $finalSelectQuery;
    public $finalHeaders;

    public function __construct($transaction, $finalSelectQuery, $finalHeaders) {
        $this->transaction = $transaction;
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
        $transaction = Transaction::query()
            ->select($finalSelectedColumn)
            ->whereIn('id', $this->transaction)
            ->get();
        $transaction->prepend($this->finalHeaders);
        return $transaction;
    }
}
