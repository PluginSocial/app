<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  User  $user
     *
     * @return void
     */
    public function creating(User $user): void
    {
        $this->encryptPassword($user);
    }

    /**
     * Encrypting the password before the data is saved in the database.
     *
     * @param  User  $user
     *
     * @return void
     */
    private function encryptPassword(User $user)
    {
        $user->password = bcrypt($user->password);
    }
}
