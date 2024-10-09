<?php

namespace App\Services;

use App\Mail\MerchantRegistered;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class MerchantService{

    public function store(array $data)
    {
        $password = Str::random(10);
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($password);
        $user->is_admin = 0;
        $user->status = 0;
        $user->save();

        Mail::to($user->email)->send(new MerchantRegistered($user, $password));
    }

    public function update(array $data, $user)
    {
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->status = $data['status'];
        $user->save();
    }

}
