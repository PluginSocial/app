<?php

use App\Http\Components\Auth\RegisterComponent;

Route::get('auth/register')->name('auth.register')->uses(RegisterComponent::class);
