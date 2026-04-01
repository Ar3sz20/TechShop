<?php

namespace Tests\Feature\Models;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_product_can_be_created()
    {
        $product = Product::factory()->create([
            'name' => 'Test Laptop',
            'price' => 999.99,
            'description' => 'A great laptop',
            'image' => 'laptop.jpg',
            'quantity' => 10,
            'category' => 'Electronics',
            'brandname' => 'TechMaster',
            'type' => 'Laptop',
        ]);

        $this->assertDatabaseHas('products', [
            'name' => 'Test Laptop',
            'price' => 999.99,
            'quantity' => 10,
        ]);
    }

    public function test_product_can_be_soft_deleted()
    {
        $product = Product::factory()->create();

        $product->delete();

        $this->assertSoftDeleted('products', [
            'id' => $product->id,
        ]);
    }
}
