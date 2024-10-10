<?php

namespace App\Services;

use App\Models\Currency;

class CurrencyService{

    public function store(array $data)
    {
        $currency = new Currency;
        $currency->country_id = $data['country'];
        $currency->sign = $data['sign'];
        $currency->name = $data['name'];
        $currency->code = $data['code'];
        $currency->save();
    }

    public function update(array $data, $currency)
    {
        $currency->country_id = $data['country'];
        $currency->sign = $data['sign'];
        $currency->name = $data['name'];
        $currency->code = $data['code'];
        $currency->save();
    }

}
