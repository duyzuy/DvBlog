<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    //
  
    public function role_user(){

        return $this->belongsToMany('App\User', 'role_user', 'role_id', 'user_id');
    }

    public function role_permission(){

        return $this->belongsToMany('App\Permission', 'permission_role', 'role_id', 'permission_id');
    }
    
}
