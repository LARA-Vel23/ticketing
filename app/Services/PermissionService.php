<?php

namespace App\Services;

use App\Models\Permission;

class PermissionService{

    public function store(array $data)
    {
        $permission = new Permission;
        $permission->name = $data['name'];
        $permission->description = $data['description'];
        $permission->save();
    }

    public function update(array $data, $permission)
    {
        $permission->name = $data['name'];
        $permission->description = $data['description'];
        $permission->save();
    }

}
