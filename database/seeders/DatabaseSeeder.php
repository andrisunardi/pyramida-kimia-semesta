<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            SliderSeeder::class,

            ProductCategorySeeder::class,
            ProductSeeder::class,

            GalleryCategorySeeder::class,
            GallerySeeder::class,
        ]);
    }
}
