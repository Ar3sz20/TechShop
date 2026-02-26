<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_products_page_loads(): void
    {
        $response = $this->get('/products');

        $response->assertStatus(200);
    }

    public function test_products_page_lists_products(): void
    {
        Product::factory()->create([
            'name' => 'Teszt Laptop',
            'price' => 250000,
            'category' => 'gaming',
        ]);

        $response = $this->get('/products');

        $response->assertStatus(200);
        $response->assertSee('Teszt Laptop');
    }

    public function test_products_page_filters_by_price_range(): void
    {
        Product::factory()->create([
            'name' => 'Olcso Termek',
            'price' => 100,
        ]);

        Product::factory()->create([
            'name' => 'Draga Termek',
            'price' => 1000,
        ]);

        $response = $this->get('/products?min_price=500&max_price=1500');

        $response->assertStatus(200);
        $response->assertSee('Draga Termek');
        $response->assertDontSee('Olcso Termek');
    }
}
