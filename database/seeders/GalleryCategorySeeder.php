<?php

namespace Database\Seeders;

use App\Models\GalleryCategory;
use Illuminate\Database\Seeder;

class GalleryCategorySeeder extends Seeder
{
    public function run(): void
    {
        GalleryCategory::create(['name' => 'Office']);
        GalleryCategory::create(['name' => 'Unloading']);
        GalleryCategory::create(['name' => 'Warehouse']);
        GalleryCategory::create(['name' => 'Others']);
    }
}
