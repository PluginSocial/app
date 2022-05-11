<?php

namespace App\Http\Components\Auth;

use Auth;
use Illuminate\Contracts\View\View;

final class LoginComponent extends AuthComponent
{
    public string $email = '';

    public string $password = '';

    public bool $remember = false;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public array $rules = [
        'email' => ['required', 'email', 'exists:users,email'],
        'password' => ['required'],
        'remember' => ['boolean']
    ];

    /**
     * Render method.
     *
     * @return View
     */
    public function render(): View
    {
        return view('components.auth.login');
    }

    public function login()
    {
        $this->validate();

        $credentials = [
            'email' => $this->email,
            'password' => $this->password
        ];

        if (Auth::attempt($credentials, $this->remember)) {
            return redirect()->route('dashboard');
        }

        session()->flash('message', __('Invalid credentials, please check and try again'));
    }
}
