<?php

namespace App\Http\Components\Auth;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Throwable;

final class RegisterComponent extends AuthComponent
{
    /**
     * @var User|null
     */
    public ?User $user;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public array $rules = [
        'user.name' => ['required', 'string', 'max:255'],
        'user.email' => ['required', 'string', 'email', 'unique:users,email', 'min:6', 'max:255'],
        'user.password' => ['required', 'min:6', 'max:255']
    ];

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

    /**
     * Render method.
     *
     * @return View
     */
    public function render(): View
    {
        return view('components.auth.register');
    }

    /**
     * Create a new user in system.
     *
     * @throws Throwable
     */
    public function createNewUser()
    {
        $this->validate();

        try {
            $this->user->saveOrFail();

            Auth::login($this->user, true);

            return redirect()->to('/');
        } catch (Throwable $e) {
        }
    }
}
