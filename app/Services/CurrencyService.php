<?php

namespace App\Services;

use App\Models\Currency;

class CurrencyService{

    public function store(array $data)
    {
        $ip = new Currency;
        $ip->name = $data['name'];
        $ip->user_id = $data['user'];
        $ip->save();
    }

    public function update(array $data, $ip)
    {
        $ip->name = $data['name'];
        $ip->user_id = $data['user'];
        $ip->save();
    }

}
