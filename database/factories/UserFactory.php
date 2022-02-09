<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory {

    protected $model = User::class;

    public function definition(): array {
        return [
            'name'    => fn() => $this->faker->name(),
            'email'    => fn() => $this->faker->email(),
            'password' => fn() => $this->faker->password(),
        ];
    }
}
