<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Domain>
 */
class DomainFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $values = ["red", "green", "blue", "yellow"];

        return [
            "name" => $this->faker->unique()->name,
            "type_id" => $this->faker->numberBetween(1, 10),
            "category_id" => $this->faker->numberBetween(1, 10),
            "is_sale" => $this->faker->boolean(),
            "is_active" => $this->faker->boolean(),
            "is_present" => $this->faker->boolean(),
            "price" => $this->faker->unique()->randomFloat(),
            "brand_id" => $this->faker->numberBetween(1, 10),
            "currency_id" => $this->faker->numberBetween(1, 10),
            "model" => $this->faker->unique()->name,
            "size" => $this->faker->numberBetween(1, 10),
            "os" => $this->faker->unique()->company,
            "color" => $values[$this->faker->numberBetween(0, 3)],
            "serial_number" => $this->faker->unique()->name,
            "discount" => $this->faker->numberBetween(0, 100),
            "processor" => $this->faker->unique()->name,
            "camera" => $this->faker->numberBetween(1, 32),
            "guarantee" => $this->faker->numberBetween(1, 36),
        ];
    }
}
