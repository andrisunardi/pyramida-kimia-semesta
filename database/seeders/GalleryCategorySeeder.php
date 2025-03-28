<?php

namespace Database\Seeders;

use App\Models\GalleryCategory;
use Illuminate\Database\Seeder;

class GalleryCategorySeeder extends Seeder
{
    public function run(): void
    {
        GalleryCategory::create([
            'name' => 'Office',
            'name_id' => 'Kantor',
            'name_zh' => '办公室',
            'is_active' => true,
        ]);

        GalleryCategory::create([
            'name' => 'Unloading',
            'name_id' => 'Membongkar',
            'name_zh' => '卸载',
            'is_active' => true,
        ]);

        GalleryCategory::create([
            'name' => 'Warehouse',
            'name_id' => 'Gudang',
            'name_zh' => '仓库',
            'is_active' => true,
        ]);

        GalleryCategory::create([
            'name' => 'Others',
            'name_id' => 'Lainnya',
            'name_zh' => '其他的',
            'is_active' => true,
        ]);
    }
}
