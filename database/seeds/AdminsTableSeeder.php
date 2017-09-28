<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Faker Intance
        $faker = Faker\Factory::create();

        // Add the developer accounts and print this out at the end
        $loginsArray = [];

        // Default Admin
        $admin = new Admin;
        $admin->name = env('DEV_ADMIN_FIRSTNAME', $faker->firstName) . ' ' . env('DEV_ADMIN_LASTNAME', $faker->lastName);
        $admin->email = env('DEV_ADMIN_EMAIL', $faker->unique()->safeEmail);
        $admin->password = bcrypt(env('DEV_ADMIN_PASSWORD', $faker->password));
        $admin->save();
        $admin->assignRole('super_admin');
        $admin->assignRole('admin');
        $loginsArray['admin'][] = $admin;

        // Generate other admins
        $adminSeeds = (int) env('DEV_SEED_ADMINS', 1);
        factory(App\Admin::class, $adminSeeds)
            ->create()
            ->each(function ($a) {
                $a->assignRole('admin');
            });

        // Print out information
        $this->command->line('');
        $this->command->info("  - Developer Admin Accounts: ");
        foreach ($loginsArray as $scope => $users) {
            $this->command->info("    + {$scope}-level accounts:");
            foreach ($users as $user) {
                $this->command->line("       - " . $user->email);
            }
        }
        $this->command->line('');
    }
}
