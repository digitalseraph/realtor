<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    private $user;
    private $userFirstName;
    private $userLastName;
    private $userEmail;

    public function setUp()
    {
        parent::setUp();

        $this->userFirstName = env('TEST_USER_FIRSTNAME', 'John');
        $this->userLastName = env('TEST_USER_LASTNAME', 'Smith');
        $this->userFullName = $this->userFirstName . ' ' . $this->userLastName;
        $this->userEmail = env('TEST_USER_EMAIL', 'john.smith@test.com');
        $this->user = factory(User::class)->create([
            'name' => $name,
            'email' => $email
        ]);
    }

    public function testUserCanBeCreated()
    {
        $name = $this->userFullName . mt_rand(0, 1000);
        $email = $this->userEmail . mt_rand(0, 1000);

        $user = factory(User::class)->create([
            'name' => $name,
            'email' => $email
        ]);

        $this->assertEquals($name, $user->name);
        $this->assertEquals($email, $user->email);
    }

    public function testGuestIsRedirectedFromUserPages()
    {
        $response = $this->get('/home')
                         ->assertStatus(302);
    }
}
