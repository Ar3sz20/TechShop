<?php

namespace Tests\Feature;

use Tests\TestCase;

class LogoutTest extends TestCase
{
    public function test_logout_redirects_to_home(): void
    {
        $response = $this->post('/logout');

        $response->assertRedirect('/');
    }
}
