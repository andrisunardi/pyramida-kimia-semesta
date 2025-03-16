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
                'name_id' => "Kantor {$i}",
                'name_zh' => "办公室 {$i}",
                'description' => "Office {$i}",
                'description_id' => "Kantor {$i}",
                'description_zh' => "办公室 {$i}",
                'image' => "office-{$i}.png",
                'is_active' => true,
            ]);
        }

        for ($i = 1; $i <= 4; $i++) {
            Gallery::create([
                'gallery_category_id' => 2,
                'name' => "Unloading {$i}",
                'name_id' => "Membongkar {$i}",
                'name_zh' => "卸载 {$i}",
                'description' => "Unloading {$i}",
                'description_id' => "Membongkar {$i}",
                'description_zh' => "卸载 {$i}",
                'image' => "unloading-{$i}.png",
                'is_active' => true,
            ]);
        }

        for ($i = 1; $i <= 6; $i++) {
            Gallery::create([
                'gallery_category_id' => 3,
                'name' => "Warehouse {$i}",
                'name_id' => "Gudang {$i}",
                'name_zh' => "仓库 {$i}",
                'description' => "Warehouse {$i}",
                'description_id' => "Gudang {$i}",
                'description_zh' => "仓库 {$i}",
                'image' => "warehouse-{$i}.png",
                'is_active' => true,
            ]);
        }

        for ($i = 1; $i <= 14; $i++) {
            Gallery::create([
                'gallery_category_id' => 2,
                'name' => "Others {$i}",
                'name_id' => "Lainnya {$i}",
                'name_zh' => "其他的 {$i}",
                'description' => "Others {$i}",
                'description_id' => "Lainnya {$i}",
                'description_zh' => "其他的 {$i}",
                'image' => "others-{$i}.png",
                'is_active' => true,
            ]);
        }
    }
}
