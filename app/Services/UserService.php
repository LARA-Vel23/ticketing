<?php

namespace App\Services;

use App\Mail\AdminRegistered;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserService{

    public function store(array $data)
    {
        $password = Str::random(10);
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($password);
        $user->status = 0;
        $user->save();

        foreach($data['role'] as $role)
        {
            $roles = new UserRole;
            $roles->user_id = $user->id;
            $roles->role_id = $role;
            $roles->save();
        }

        Mail::to($user->email)->send(new AdminRegistered($user, $password));
    }

    public function update(array $data, $user)
    {
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->status = $data['status'];
        $user->save();

        UserRole::where('user_id', $user->id)->delete();

        foreach($data['role'] as $role)
        {
            $roles = new UserRole;
            $roles->user_id = $user->id;
            $roles->role_id = $role;
            $roles->save();
        }
    }

}
