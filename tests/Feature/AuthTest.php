<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_login_page_load(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }
    public function test_register_page_load(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }
}
