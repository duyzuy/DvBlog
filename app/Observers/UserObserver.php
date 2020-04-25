<?php

namespace App\Observers;

use App\user;

class UserObserver
{
    /**
     * Handle the user "creating" event.
     *
     * @param  \App\user  $user
     * @return void
     */
    public function creating(user $user)
    {
        //
        $user->api_token = bin2hex(openssl_random_pseudo_bytes(30));
    }

}
