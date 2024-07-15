<?php

namespace Tests\Unit;

use App\Events\SupplierProductAdded;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;
use Tests\TestCase;
use Illuminate\Support\Facades\Factory;
use Illuminate\Support\Facades\Event; // Import Event facade
use Illuminate\Support\Facades\Artisan;
use App\Models\Supplier;
class ProductTest extends TestCase

{
    use RefreshDatabase;

    /** @test */
    public function it_stores_a_product()
    {
       
        $this->seed();

       
        $supplier = Supplier::factory()->create();
        
        
        $data = [
            'name' => 'Test Product',
            'category_id' => 1,
            'supplier_id' => 1,
            
        ];

     
        $response = $this->postJson('/products', $data);

        // Assert response
        if ($response->getStatusCode() === 500) {
            $this->fail('Server error occurred: ' . $response->getContent());
        }

        $response->assertStatus(Response::HTTP_OK) 
                 ->assertJsonStructure(['product']);

       
        $this->assertDatabaseHas('products', [
            'name' => 'Test Product',
            'category_id' => 1,
          
        ]);

       
        \Event::assertDispatched(SupplierProductAdded::class);
    }
}
