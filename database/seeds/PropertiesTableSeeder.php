<?php

use Illuminate\Database\Seeder;

class PropertiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $amount = (int) env('DEV_SEED_PROPERTIES', 10);
        factory(App\Models\Property::class, $amount)->create();
    }
}
