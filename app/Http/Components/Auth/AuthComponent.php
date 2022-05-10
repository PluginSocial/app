<?php

namespace App\Http\Components\Auth;

use App\Models\User;
use Livewire\Component;

abstract class AuthComponent extends Component
{
    /**
     * @var User|null
     */
    public ?User $user;

    /**
     * Mount method.
     *
     * @param  User  $user
     *
     * @return void
     */
    public function mount(User $user): void
    {
        $this->user = $user;
    }
}
