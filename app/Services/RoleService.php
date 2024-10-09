<?php

namespace App\Services;

use App\Models\Role;

class RoleService{

    public function store(array $data)
    {
        $role = new Role;
        $role->name = $data['name'];
        $role->description = $data['description'];
        $role->save();
    }

    public function update(array $data, $role)
    {
        $role->name = $data['name'];
        $role->description = $data['description'];
        $role->save();
    }

}
