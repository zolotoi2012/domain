<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'brand' => $this->faker->word(),
            'ean' => $this->faker->ean13(),
            'price' => $this->faker->numberBetween(5, 1000),
            'image' => $this->faker->imageUrl(),
            'description' => $this->faker->text(),
            'is_sale' => $this->faker->boolean(),
            'color' => $this->faker->colorName(),
            'size' => $this->faker->randomElement(['XS', 'S', 'M', 'L', 'XL']),
            'is_active' => $this->faker->boolean(),
            'discount' => $this->faker->numberBetween(0, 100),
            'model' => $this->faker->word(),
            'weight' => $this->faker->randomFloat(),
            'currency' => $this->faker->currencyCode(),
            'amount_per_package' => $this->faker->randomFloat(),
            'short_description' => $this->faker->text(),
            'country_of_origin' => $this->faker->country(),
            'expiration_date' => $this->faker->date(),
        ];
    }
}
