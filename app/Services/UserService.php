<?php

namespace App\Services;

use App\Models\User;
use App\Models\UserRole;

class UserService{

    public function store(array $data)
    {
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt('password');
        $user->status = 0;
        $user->save();

        foreach($data['role'] as $role)
        {
            $roles = new UserRole;
            $roles->user_id = $user->id;
            $roles->role_id = $role;
            $roles->save();
        }
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
