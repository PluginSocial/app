<?php

use App\Http\Components\{Auth\LoginComponent, Auth\PasswordForgot, Auth\RegisterComponent};

Route::get('auth/register')->name('auth.register')->uses(RegisterComponent::class);
Route::get('auth/login')->name('auth.login')->uses(LoginComponent::class);
Route::get('auth/password/forgot')->name('auth.password-forgot')->uses(PasswordForgot::class);
