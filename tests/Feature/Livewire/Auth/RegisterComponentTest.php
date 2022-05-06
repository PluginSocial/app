<?php

namespace Tests\Feature\Livewire\Auth;

use App\Http\Components\Auth\RegisterComponent;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class RegisterComponentTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(RegisterComponent::class);

        $component->assertStatus(200);
    }
}
