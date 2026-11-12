<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(DatabaseSeeder::class);
    }

    /**
     * Test all public pages return successful HTTP 200 responses.
     */
    public function test_public_pages_return_successful_responses(): void
    {
        $this->get('/')->assertStatus(200);
        $this->get('/properties')->assertStatus(200);
        $this->get('/gallery')->assertStatus(200);
        $this->get('/about')->assertStatus(200);
        $this->get('/contact')->assertStatus(200);
        $this->get('/post-property')->assertStatus(200);
        $this->get('/login')->assertStatus(200);
        $this->get('/register')->assertStatus(200);
    }

    /**
     * Test /admin redirects unauthenticated visitors to /admin/login.
     */
    public function test_admin_redirects_to_login_for_guests(): void
    {
        $response = $this->get('/admin');
        $response->assertRedirect('/admin/login');

        $this->get('/admin/login')->assertStatus(200);
    }

    /**
     * Test admin can log into the administrative control center.
     */
    public function test_admin_can_access_dashboard_and_site_images(): void
    {
        $admin = User::where('is_admin', true)->first();

        $response = $this->actingAs($admin)->get('/admin/dashboard');
        $response->assertStatus(200);

        $response = $this->actingAs($admin)->get('/admin/site-images');
        $response->assertStatus(200);
    }
}
