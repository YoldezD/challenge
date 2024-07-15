<?php

namespace Database\Factories;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'category_id' => function () {
                return category::factory()->create()->id;
            },
            'supplier_id' => function () {
                return supplier::factory()->create()->id;
            },
            'colors' => json_encode([$this->faker->colorName]),
            'visibility' => $this->faker->boolean,
            'price' => $this->faker->randomFloat(2, 10, 100),
            'main_picture' => $this->faker->imageUrl(),
        ];
    }
}
