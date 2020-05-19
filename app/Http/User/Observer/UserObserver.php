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
        $organizationUserBelongsTo = $user->organization;
        if ($organizationUserBelongsTo->user_id === $user->id && $user->role != "ADMIN") {
            $roles = config('roles');
            $user->update(['role' => $roles['admin']]);
        }
        //TODO send notification email
    }

}
