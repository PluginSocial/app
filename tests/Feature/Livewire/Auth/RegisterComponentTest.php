<?php

namespace Tests\Feature\Livewire\Auth;

use App\Http\Components\Auth\RegisterComponent;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class RegisterComponentTest extends TestCase
{
    use WithFaker;

    public function test_the_component_can_render_form_register()
    {
        Livewire::test(RegisterComponent::class)->assertStatus(200);
    }

    public function test_guest_create_user()
    {
        $userData = [
            'user.name' => $this->faker->name,
            'user.email' => $this->faker->email,
            'user.password' => $this->faker->password
        ];

        Livewire::test(RegisterComponent::class)
            ->fill($userData)
            ->call('createNewUser');
    }

    public function test_guest_can_set_initial_data_for_create_user()
    {
        Livewire::test(RegisterComponent::class)
            ->assertSet('user.name', null, true)
            ->assertSet('user.email', null, true)
            ->assertSet('user.password', null, true);
    }

    public function test_can_create_user_empty_data()
    {
        Livewire::test(RegisterComponent::class)
            ->call('createNewUser')
            ->assertHasErrors([
                'user.name',
                'user.email',
                'user.password'
            ]);
    }
}
