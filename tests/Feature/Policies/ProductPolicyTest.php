<?php

namespace Tests\Feature\Policies;

use App\Models\Product;
use App\Models\User;
use App\Policies\ProductPolicy;
use Tests\TestCase;

class ProductPolicyTest extends TestCase
{
    protected ProductPolicy $policy;

    protected function setUp(): void
    {
        parent::setUp();
        $this->policy = new ProductPolicy();
    }

    public function test_anyone_can_view_any_products()
    {
        $user = new User();
        $this->assertTrue($this->policy->viewAny($user));
    }

    public function test_anyone_can_view_a_product()
    {
        $user = new User();
        $product = new Product();
        $this->assertTrue($this->policy->view($user, $product));
    }

    public function test_admin_can_create_products()
    {
        $admin = new User(['role' => 1]);
        $this->assertTrue($this->policy->create($admin));
    }

    public function test_regular_user_cannot_create_products()
    {
        $user = new User(['role' => 0]);
        $this->assertFalse($this->policy->create($user));
    }

    public function test_admin_can_update_products()
    {
        $admin = new User(['role' => 1]);
        $product = new Product();
        $this->assertTrue($this->policy->update($admin, $product));
    }

    public function test_regular_user_cannot_update_products()
    {
        $user = new User(['role' => 0]);
        $product = new Product();
        $this->assertFalse($this->policy->update($user, $product));
    }

    public function test_admin_can_delete_products()
    {
        $admin = new User(['role' => 1]);
        $product = new Product();
        $this->assertTrue($this->policy->delete($admin, $product));
    }

    public function test_regular_user_cannot_delete_products()
    {
        $user = new User(['role' => 0]);
        $product = new Product();
        $this->assertFalse($this->policy->delete($user, $product));
    }
}
