<?php

namespace App\Services;

use App\Models\Transaction;

class TransactionService{

    public function store(array $data)
    {
        $transaction = new Transaction;
        $transaction->merchant_id = $data['merchant_id'];
        $transaction->country_id = $data['country_id'];
        $transaction->bank_id = $data['bank_id'];
        $transaction->admin_id = $data['admin_id'];
        $transaction->bank = $data['bank'];
        $transaction->account_name = $data['account_name'];
        $transaction->account_number = $data['account_number'];
        $transaction->bank_ifsc = $data['bank_ifsc'];
        $transaction->bank_swift = $data['bank_swift'];
        $transaction->bank_branch = $data['bank_branch'];
        $transaction->bank_branch_code = $data['bank_branch_code'];
        $transaction->bank_reference = $data['bank_reference'];
        $transaction->reference = $data['reference'];
        $transaction->type = $data['type'];
        $transaction->status = 0;
        $transaction->amount = $data['amount'];
        $transaction->remarks = $data['remarks'];
        $transaction->notify = $data['notify'];
        $transaction->save();
    }

    public function update(array $data, $transaction)
    {
        $transaction->merchant_id = $data['merchant_id'];
        $transaction->country_id = $data['country_id'];
        $transaction->bank_id = $data['bank_id'];
        $transaction->admin_id = $data['admin_id'];
        $transaction->bank = $data['bank'];
        $transaction->account_name = $data['account_name'];
        $transaction->account_number = $data['account_number'];
        $transaction->bank_ifsc = $data['bank_ifsc'];
        $transaction->bank_swift = $data['bank_swift'];
        $transaction->bank_branch = $data['bank_branch'];
        $transaction->bank_branch_code = $data['bank_branch_code'];
        $transaction->bank_reference = $data['bank_reference'];
        $transaction->reference = $data['reference'];
        $transaction->type = $data['type'];
        $transaction->status = $data['status'];
        $transaction->amount = $data['amount'];
        $transaction->remarks = $data['remarks'];
        $transaction->notify = $data['notify'];
        $transaction->save();
    }

}
