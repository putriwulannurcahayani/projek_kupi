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
    public function test_auten(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    // public function test_logout(): void
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }

    // public function test_register(): void
    // {
    //     $response = $this->get('/');

    //     $response->assertStatus(200);
    // }


}