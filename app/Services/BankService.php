<?php

namespace App\Services;

use App\Models\Bank;

class BankService{

    public function store(array $data)
    {
        $bank = new Bank;
        $bank->name = $data['name'];
        $bank->account_name = $data['account_name'];
        $bank->account_number = $data['account_number'];
        $bank->bank_ifsc = $data['bank_ifsc'];
        $bank->bank_swift = $data['bank_swift'];
        $bank->bank_branch = $data['bank_branch'];
        $bank->bank_branch_code = $data['bank_branch_code'];
        $bank->status = 0;
        $bank->save();
    }

    public function update(array $data, $bank)
    {
        $bank->name = $data['name'];
        $bank->account_name = $data['account_name'];
        $bank->account_number = $data['account_number'];
        $bank->bank_ifsc = $data['bank_ifsc'];
        $bank->bank_swift = $data['bank_swift'];
        $bank->bank_branch = $data['bank_branch'];
        $bank->bank_branch_code = $data['bank_branch_code'];
        $bank->status = $data['status'];
        $bank->save();
    }

}
