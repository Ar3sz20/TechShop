<?php

namespace Tests\Feature\Models;

use App\Models\User;
use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;

    public function test_order_can_be_created()
    {
        $user = User::factory()->create();

        $order = Order::create([
            'user_id' => $user->id,
            'address' => '456 Test Ave',
            'total_price' => 250.00,
            'items' => [
                ['product_id' => 1, 'quantity' => 2],
                ['product_id' => 2, 'quantity' => 1],
            ],
        ]);

        $this->assertDatabaseHas('orders', [
            'user_id' => $user->id,
            'address' => '456 Test Ave',
            'total_price' => 250.00,
        ]);
    }

    public function test_order_belongs_to_user()
    {
        $user = User::factory()->create();

        $order = Order::create([
            'user_id' => $user->id,
            'address' => '789 User Blvd',
            'total_price' => 50.00,
            'items' => [],
        ]);

        $this->assertInstanceOf(User::class, $order->user);
        $this->assertEquals($user->id, $order->user->id);
    }

    public function test_order_items_are_cast_to_array()
    {
        $user = User::factory()->create();
        $itemsArray = [['product_id' => 1, 'quantity' => 2]];

        $order = Order::create([
            'user_id' => $user->id,
            'address' => '123 Array St',
            'total_price' => 99.99,
            'items' => $itemsArray,
        ]);

        $freshOrder = Order::find($order->id);

        $this->assertIsArray($freshOrder->items);
        $this->assertEquals($itemsArray, $freshOrder->items);
    }
}
