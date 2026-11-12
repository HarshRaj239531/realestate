<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NavbarViewTest extends TestCase
{
    use RefreshDatabase;

    public function test_navbar_renders_correctly(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('RealEstate');
        $response->assertSee('Home');
        $response->assertSee('Property');
        $response->assertSee('Gallery');
        $response->assertSee('Post Property');
        $response->assertSee('About Us');
        $response->assertSee('Contact');
        $response->assertSee('navBlueStripe');
        $response->assertDontSee('+ Register');
    }
}
