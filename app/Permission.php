<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Laratrust\Models\LaratrustPermission;

class Permission extends LaratrustPermission
{
    //
  
    public function permission_role()
    {
        return $this->belongsToMany('App\Permission', 'permission_role', 'role_id', 'permission_id');
    }

    public function permission_user()
    {
        return $this->belongsToMany('App\Permission', 'permission_user', 'user_id', 'permission_id');
    }
}
