<?php

namespace App\Services;

use App\Models\IP;

class IPService{

    public function store(array $data)
    {
        $ip = new IP;
        $ip->value = $data['value'];
        $ip->user_id = $data['user'];
        $ip->save();
    }

    public function update(array $data, $ip)
    {
        $ip->value = $data['value'];
        $ip->user_id = $data['user'];
        $ip->save();
    }

}
