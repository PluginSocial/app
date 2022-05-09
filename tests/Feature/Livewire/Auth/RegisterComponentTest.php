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
    use RefreshDatabase;

    /**
     * @var array
     */
    private array $userData;

    public function test_the_component_can_render_form_register()
    {
        Livewire::test(RegisterComponent::class)->assertStatus(200);
    }

    public function test_guest_create_user()
    {
        Livewire::test(RegisterComponent::class)
            ->fill($this->makeUser())
            ->call('createNewUser');
    }

    /**
     * @return array
     */
    private function makeUser(): array
    {
        return $this->userData = [
            'user.name' => $this->faker->name,
            'user.email' => $this->faker->email,
            'user.password' => $this->faker->password
        ];
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

    public function test_new_user_can_password_is_encrypted()
    {
        $this->makeUser();

        Livewire::test(RegisterComponent::class)
            ->fill($this->userData)
            ->call('createNewUser');

        $this
            ->assertDatabaseCount('users', 1)
            ->assertDatabaseMissing('users', [
                'name' => $this->userData['user.name'],
                'email' => $this->userData['user.email'],
                'password' => $this->userData['user.password']
            ]);
    }

    public function test_new_user_is_authenticated()
    {
        $this->makeUser();

        Livewire::test(RegisterComponent::class)
            ->fill($this->userData)
            ->call('createNewUser');

        $user = User::whereEmail($this->userData['user.email'])->firstOrFail();

        $this->assertAuthenticatedAs($user, 'web');
    }

    public function test_create_user_redirect_to_dashboard()
    {
        $this->makeUser();

        Livewire::test(RegisterComponent::class)
            ->fill($this->userData)
            ->call('createNewUser')
            ->assertRedirect(route('dashboard'));
    }
}
