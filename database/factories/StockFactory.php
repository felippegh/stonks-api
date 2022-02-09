<?php

namespace Database\Factories;

use App\Models\Stock;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class StockFactory extends Factory {

    protected $model = Stock::class;

    public function definition(): array {
        return [
            'name'    => fn() => $this->faker->name(),
            'symbol'  => fn() => $this->faker->colorName(),
            'open'    => fn() => $this->faker->randomFloat(),
            'high'    => fn() => $this->faker->randomFloat(),
            'low'     => fn() => $this->faker->randomFloat(),
            'close'   => fn() => $this->faker->randomFloat(),
            'volume'  => fn() => $this->faker->randomFloat(),
        ];
    }
}
