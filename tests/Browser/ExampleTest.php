<?php

namespace Tests\Browser;

use App\User;
use App\Admin;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/login')
                    ->assertSee('RealtorAdmin');
        });
    }

    public function testUserCanLogin()
    {

        $user = User::find(1);

        $this->browse(function ($browser) use ($user) {
            $browser->visit('/login')
                    ->type('email', $user->email)
                    ->type('password', 'secret')
                    ->press('Login')
                    ->assertPathIs('/home')
                    ->assertSee('User Dashboard');
        });
    }

    public function testAdminCanLogin()
    {

        $admin = Admin::find(1);

        $this->browse(function ($browser) use ($admin) {
            $browser->visit('/admin/login')
                    ->type('email', $admin->email)
                    ->type('password', 'secret')
                    ->press('Sign In')
                    ->assertPathIs('/admin/home')
                    ->assertSee('Admin Dashboard');
        });
    }
}
