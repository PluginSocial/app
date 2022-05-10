<?php

namespace App\Http\Components\Auth;

use Auth;
use Illuminate\Contracts\View\View;

final class LoginComponent extends AuthComponent
{
    public bool $remember = true;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public array $rules = [
        'user.email' => ['required', 'email', 'exists:users,email'],
        'user.password' => ['required'],
        'remember' => ['boolean']
    ];

    /**
     * Render method.
     *
     * @return View
     */
    public function render()
    {
        return view('components.auth.login');
    }

    public function login()
    {
        $this->validate();

        $credentials = [
            'email' => $this->user->email,
            'password' => $this->user->password
        ];

        if (Auth::attempt($credentials, $this->remember)) {
            return redirect()->route('dashboard');
        }

        session()->flash('message', __('Invalid credentials, please check and try again'));
    }
}
