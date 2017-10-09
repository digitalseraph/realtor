<?php

namespace Tests\Unit;

use App\Admin;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    private $admin;
    private $adminFirstName;
    private $adminLastName;
    private $adminEmail;

    public function setUp()
    {
        parent::setUp();

        $this->adminFirstName = env('TEST_ADMIN_FIRSTNAME', 'John');
        $this->adminLastName = env('TEST_ADMIN_LASTNAME', 'Smith-Admin');
        $this->adminFullName = $this->adminFirstName . ' ' . $this->adminLastName;
        $this->adminEmail = env('TEST_ADMIN_EMAIL', 'john.smith-admin@test.com');
        $this->admin = factory(Admin::class)->create([
            'name' => $this->adminFullName,
            'email' => $this->adminEmail
        ]);
    }

    public function testAdminCanBeCreated()
    {
        $name = $this->adminFullName . mt_rand(0, 1000);
        $email = $this->adminEmail . mt_rand(0, 1000);

        $admin = factory(Admin::class)->create([
            'name' => $name,
            'email' => $email
        ]);

        $this->assertEquals($name, $admin->name);
        $this->assertEquals($email, $admin->email);
    }

    public function testAdminCanLogin()
    {
        $response = $this->actingAs($this->admin, 'admin')
                         ->get('/admin/home')
                         ->assertSuccessful();
    }

    public function testGuestIsRedirectedFromAdminPages()
    {
        $response = $this->get('/admin/home')
                         ->assertStatus(302);
    }
}
