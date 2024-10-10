<?php

namespace App\Services;

use App\Models\Country;

class CountryService{

    public function store(array $data)
    {
        $country = new Country;
        $country->name = $data['name'];
        $country->timezone = $data['timezone'];
        $country->save();
    }

    public function update(array $data, $country)
    {
        $country->name = $data['name'];
        $country->timezone = $data['timezone'];
        $country->save();
    }

}
