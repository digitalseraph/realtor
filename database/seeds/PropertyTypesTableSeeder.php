<?php

use Illuminate\Database\Seeder;

class PropertyTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $amount = (int) env('DEV_SEED_PROPERTY_TYPES', 10);
        factory(App\Models\PropertyType::class, $amount)->create();
    }
}
