<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;

class UserControllerTest extends TestCase {

    use DatabaseMigrations, WithFaker;

    public function testLoginValidationRequired() {
        $this
            ->sendLoginRequest()
            ->assertStatus(422)
            ->assertJsonStructure([
                'errors' => [
                    'email',
                    'password',
                ],
            ]);
    }

    public function testLoginValidationDetails() {
        $this
            ->sendLoginRequest([
                'email' => 'a b',
            ])
            ->assertStatus(422)
            ->assertJsonStructure([
                'errors' => [
                    'email',
                ],
            ]);
    }

    public function testLoginUnauthorized() {
        $user = User::factory()->make();

        $this
            ->sendLoginRequest([
                'email'    => $user->email,
                'password' => $user->password,
            ])
            ->assertStatus(401);
    }

    public function testLoginSuccess() {
        $password = $this->faker->password();

        $user = User::factory()->create(compact('password'));

        $this
            ->sendLoginRequest([
                'email'    => $user->email,
                'password' => $password,
            ])
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'token',
                ],
            ]);
    }

    private function sendLoginRequest(array $data = []): TestResponse {
        return $this->json('POST', route('api.users.login'), $data);
    }

}
