<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_user_can_register_and_their_name_is_shown_on_the_products_page(): void
    {
        $response = $this->post(route('register.store'), [
            'name' => 'Annisa',
            'email' => 'annisa@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertRedirect(route('products.index'));
        $this->assertAuthenticated();
        $this->get(route('products.index'))->assertSee('Annisa');
    }

    public function test_home_and_capitalized_login_url_provide_access_to_the_login_page(): void
    {
        $this->get('/')->assertRedirect(route('login'));
        $this->get('/Login')->assertRedirect(route('login'));
        $this->get(route('login'))->assertOk()->assertSee('Masuk');
    }

    public function test_guest_is_redirected_to_login_before_accessing_products(): void
    {
        $this->get(route('products.index'))
            ->assertRedirect(route('login'));
    }

    public function test_registration_rejects_an_email_that_is_already_registered(): void
    {
        User::factory()->create(['email' => 'annisa@example.com']);

        $this->from(route('register'))->post(route('register.store'), [
            'name' => 'Annisa',
            'email' => 'annisa@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ])->assertRedirect(route('register'))
            ->assertSessionHasErrors([
                'email' => 'The email has already been taken.',
            ]);
    }

    public function test_a_user_can_log_in_and_log_out(): void
    {
        $user = User::factory()->create([
            'email' => 'annisa@example.com',
            'password' => 'password123',
        ]);

        $this->post(route('login.store'), [
            'email' => 'annisa@example.com',
            'password' => 'password123',
        ])->assertRedirect(route('products.index'));

        $this->assertAuthenticatedAs($user);

        $this->post(route('logout'))
            ->assertRedirect(route('login'));

        $this->assertGuest();
    }
}
