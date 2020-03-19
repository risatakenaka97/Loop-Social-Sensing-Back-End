<?php

namespace App\Http\User\Observer;

use App\Http\User\Model\User;

class UserObserver {

    public function creating(User $user)
    {
        $user->password = app('hash')->make($user->password);
    }

    public function created(User $user)
    {
        //TODO send notification email
    }

}
