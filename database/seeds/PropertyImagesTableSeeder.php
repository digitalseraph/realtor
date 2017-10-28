<?php

use Illuminate\Database\Seeder;

class PropertyImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $amount = (int) env('DEV_SEED_PROPERTY_IMAGES', 10);
        factory(App\Models\PropertyImage::class, $amount)->create();
    }
}
