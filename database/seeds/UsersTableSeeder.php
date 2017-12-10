<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Faker Intance
        $faker = \Faker\Factory::create();

        // Add the developer accounts and print this out at the end
        $loginsArray = [];

        // Default User
        $user = new User;
        $user->first_name = env('DEV_USER_FIRSTNAME', $faker->firstName);
        $user->last_name = env('DEV_USER_LASTNAME', $faker->lastName);
        $user->username = env('DEV_USER_USERNAME', $faker->userName);
        $user->email = env('DEV_USER_EMAIL', $faker->unique()->safeEmail);
        $user->password = bcrypt(env('DEV_USER_PASSWORD', $faker->password));
        $user->save();
        $loginsArray['user'][] = $user;
        // Assign roles
        $user->assignRole('user');

        // Generate other users
        $userSeeds = (int) env('DEV_SEED_USERS', 1);
        factory(App\User::class, $userSeeds)
            ->create()
            ->each(function ($u) {
                $u->assignRole('user');
            });


        // Print out information
        $this->command->line('');
        $this->command->info("  - Developer User Accounts: ");
        foreach ($loginsArray as $scope => $users) {
            $this->command->info("    + {$scope}-level accounts:");
            foreach ($users as $user) {
                $this->command->line("       - " . $user->email);
            }
        }
        $this->command->line('');
    }
}
