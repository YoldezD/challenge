<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\Product;
use App\Models\Brand;
use App\Models\User;
use App\Models\SearchHistory;
use Faker\Factory as Faker;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         // Seed categories
         Category::factory()->count(5)->create();
        // Seed suppliers
        Supplier::factory()->count(10)->create()->each(function ($supplier) {
            // Get supplier ID
            $supplierId = $supplier->id;
           
            // Attach random categories to each supplier
            $categories = Category::inRandomOrder()->limit(2)->pluck('id')->toArray();

            foreach ($categories as $categoryId) {
                // Ensure supplier ID is properly set in pivot table
                $supplier->categories()->attach($categoryId);

                // Seed products for each supplier
                Product::factory()->count(3)->create([
                    'supplier_id' => $supplierId,
                    'category_id' => $categoryId,
                ]);
            }
        });

 
         // Seed brands
         Brand::factory()->count(3)->create()->each(function ($brand) {
             $category = Category::inRandomOrder()->first();
             $brand->category_id = $category->id;
             $brand->save();
         });

         $brands = Brand::all();
         $faker = Faker::create();

         // Iterate through each brand
         foreach ($brands as $brand) {
             // Generate a random number of search histories (adjust as needed)
             $numHistories = rand(5, 10);
 
             // Seed search histories for the brand
             for ($i = 0; $i < $numHistories; $i++) {
                 SearchHistory::create([
                     'brand_id' => $brand->id,
                     'search_query' => $faker->words(rand(1, 3), true),
                     'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
                    
                 ]);
             }
         }
         // Seed a test user
         User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
         ]);
    }
}
