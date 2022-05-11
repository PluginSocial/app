<?php

namespace Tests\Feature\Livewire\Auth;

use App\Http\Components\Auth\LoginComponent;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class LoginComponentTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;

    /**
     * @var array
     */
    private array $userData;

    public function test_the_component_can_render_form_login()
    {
        Livewire::test(LoginComponent::class)
            ->assertStatus(200)
            ->assertViewIs('components.auth.login');
    }

    public function test_guest_redirect_to_login()
    {
        $this->get(route('dashboard'))->assertRedirect(route('auth.login'));
    }

    public function test_login_successful()
    {
        $newUser = User::factory()->create();

        Livewire::test(LoginComponent::class)
            ->fill(['email' => $newUser->email, 'password' => 'password'])
            ->call('login')
            ->assertRedirect(route('dashboard'));
    }

    public function test_guest_can_set_initial_data_for_login()
    {
        Livewire::test(LoginComponent::class)
            ->assertSet('email', '', true)
            ->assertSet('password', '', true)
            ->assertSet('remember', false, true);
    }

    public function test_can_login_empty_data()
    {
        Livewire::test(LoginComponent::class)
            ->call('login')
            ->assertHasErrors([
                'email',
                'password'
            ]);
    }

    public function test_new_user_is_authenticated()
    {
        $newUser = User::factory()->create();

        Livewire::test(LoginComponent::class)
            ->fill(['email' => $newUser->email, 'password' => 'password'])
            ->call('login');

        $user = User::whereEmail($newUser->email)->firstOrFail();

        $this->assertAuthenticatedAs($user, 'web');
    }
}
