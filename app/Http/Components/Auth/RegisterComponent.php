<?php

namespace App\Http\Components\Auth;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Throwable;

class RegisterComponent extends Component
{
    public ?User $user;

    public array $rules = [
        'user.name' => ['required', 'string', 'max:255'],
        'user.email' => ['required', 'string', 'email', 'unique:users,email', 'min:6', 'max:255'],
        'user.password' => ['required', 'min:6', 'max:255']
    ];

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render(): View
    {
        return view('components.auth.register-component');
    }

    /**
     * @throws Throwable
     */
    public function createNewUser()
    {
        $this->validate();

        try {
            $this->user->saveOrFail();

            return redirect()->to('/');
        } catch (Throwable $e) {
        }
    }
}
