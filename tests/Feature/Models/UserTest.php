<?php

namespace Tests\Feature\Models;

use App\Models\User;
use App\Models\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_be_created()
    {
        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'role' => 1,
        ]);

        $this->assertDatabaseHas('users', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);
        
        $this->assertEquals(1, $user->role);
    }

    public function test_user_has_many_orders()
    {
        $user = User::factory()->create();
        
        $order = Order::create([
            'user_id' => $user->id,
            'address' => '123 Fake Street',
            'total_price' => 199.99,
            'items' => [['product_id' => 1, 'quantity' => 1]],
        ]);

        $this->assertTrue($user->orders->contains($order));
        $this->assertEquals(1, $user->orders()->count());
    }
}
