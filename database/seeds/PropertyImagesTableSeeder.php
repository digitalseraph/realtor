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
        factory(App\Models\PropertyImage::class, 200)->create();
    }
}
