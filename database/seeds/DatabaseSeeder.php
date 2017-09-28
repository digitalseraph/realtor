<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesAndPermissionsSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(PropertyTypesTableSeeder::class);
        $this->call(PropertiesTableSeeder::class);
        $this->call(PropertyImagesTableSeeder::class);
    }
}
