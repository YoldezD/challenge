<?php

namespace Tests\Unit;

use App\Models\Brand;
use App\Models\Category;
use App\Services\BrandSupplierMatcherService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BrandTest extends TestCase
{


    /**
     * Test showMatches method of BrandController.
     *
     * @return void
     */
    public function test_show_matches()
    {
        $category = Category::factory()->create(); 
    
        $brand = Brand::factory()->create(['category_id' => $category->id]);
    
        // Créez un mock pour le service BrandSupplierMatcherService
        $mockService = $this->createMock(BrandSupplierMatcherService::class);
        
        
        $mockService->expects($this->once())
                    ->method('matchSuppliersToBrand')
                    ->with($brand)
                    ->willReturn(['supplier1', 'supplier2']); 
    
        
        $this->app->instance(BrandSupplierMatcherService::class, $mockService);
    
        // Faites une requête GET vers l'endpoint showMatches
        $response = $this->get('/matches/' . $brand->id);
    
        $response->assertViewIs('matches')
                 ->assertViewHas('suppliers', ['supplier1', 'supplier2']);
    }
    
}
