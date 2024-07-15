<?php

namespace Database\Factories;
use App\Models\Supplier;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
{
    protected $model = Supplier::class;

    /**
     * Define the model's default state.
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'),
            'address' => $this->faker->address,
            'phone' => $this->faker->phoneNumber,
            'logo' => $this->faker->imageUrl(),
        ];
    }

}
