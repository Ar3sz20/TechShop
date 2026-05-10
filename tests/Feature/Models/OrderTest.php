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
            'item_id' => '1,2',
            'item_quantity' => '2,1',
        ]);

        $this->assertDatabaseHas('orders', [
            'user_id' => $user->id,
            'address' => '456 Test Ave',
            'total_price' => 250.00,
            'item_id' => '1,2',
            'item_quantity' => '2,1',
        ]);
    }

    public function test_order_belongs_to_user()
    {
        $user = User::factory()->create();

        $order = Order::create([
            'user_id' => $user->id,
            'address' => '789 User Blvd',
            'total_price' => 50.00,
            'item_id' => '1',
            'item_quantity' => '1',
        ]);

        $this->assertInstanceOf(User::class, $order->user);
        $this->assertEquals($user->id, $order->user->id);
    }

    public function test_order_stores_item_id_and_quantity()
    {
        $user = User::factory()->create();

        $order = Order::create([
            'user_id' => $user->id,
            'address' => '123 Array St',
            'total_price' => 99.99,
            'item_id' => '7,12',
            'item_quantity' => '3,1',
        ]);

        $freshOrder = Order::find($order->id);

        $this->assertSame('7,12', $freshOrder->item_id);
        $this->assertSame('3,1', $freshOrder->item_quantity);
    }
}
