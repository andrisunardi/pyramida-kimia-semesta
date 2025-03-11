<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            Gallery::create([
                'gallery_category_id' => 1,
                'name' => "Office {$i}",
                'description' => "Office {$i}",
                'image' => "office-{$i}.png",
                'is_active' => true,
            ]);
        }

        for ($i = 1; $i <= 4; $i++) {
            Gallery::create([
                'gallery_category_id' => 2,
                'name' => "Unloading {$i}",
                'description' => "Unloading {$i}",
                'image' => "unloading-{$i}.png",
                'is_active' => true,
            ]);
        }

        for ($i = 1; $i <= 6; $i++) {
            Gallery::create([
                'gallery_category_id' => 3,
                'name' => "Warehouse {$i}",
                'description' => "Warehouse {$i}",
                'image' => "warehouse-{$i}.png",
                'is_active' => true,
            ]);
        }

        for ($i = 1; $i <= 14; $i++) {
            Gallery::create([
                'gallery_category_id' => 2,
                'name' => "Others {$i}",
                'description' => "Others {$i}",
                'image' => "others-{$i}.png",
                'is_active' => true,
            ]);
        }
    }
}
