<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    public function run(): void
    {
        ProductCategory::create([
            'name' => 'ACID & PEROXIDE',
            'name_id' => 'ASAM & PEROKSIDA',
            'name_zh' => '酸和过氧化物',
            'description' => 'ACID & PEROXIDE',
            'description_id' => 'ASAM & PEROKSIDA',
            'description_zh' => '酸和过氧化物',
            'image' => 'acid-peroxide.png',
            'slug' => 'acid-peroxide',
            'is_active' => true,
        ]);

        ProductCategory::create([
            'name' => 'BLAKE FLUID',
            'name_id' => 'CAIRAN HITAM',
            'name_zh' => '布莱克液',
            'description' => 'BLAKE FLUID',
            'description_id' => 'CAIRAN HITAM',
            'description_zh' => '布莱克液',
            'image' => 'blake-fluid.png',
            'slug' => 'blake-fluid',
            'is_active' => true,
        ]);

        ProductCategory::create([
            'name' => 'FOOD INDUSTRY',
            'name_id' => 'INDUSTRI PANGAN',
            'name_zh' => '食品工业',
            'description' => 'FOOD INDUSTRY',
            'description_id' => 'INDUSTRI PANGAN',
            'description_zh' => '食品工业',
            'image' => 'food-industry.png',
            'slug' => 'food-industry',
            'is_active' => true,
        ]);

        ProductCategory::create([
            'name' => 'METAL DEGREASING',
            'name_id' => 'PENGURANGAN LOGAM',
            'name_zh' => '金属除油',
            'description' => 'METAL DEGREASING',
            'description_id' => 'PENGURANGAN LOGAM',
            'description_zh' => '金属除油',
            'image' => 'metal-degreasing.png',
            'slug' => 'metal-degreasing',
            'is_active' => true,
        ]);

        ProductCategory::create([
            'name' => 'PIGMEN',
            'name_id' => 'PIGMEN',
            'name_zh' => '猪人',
            'description' => 'PIGMEN',
            'description_id' => 'PIGMEN',
            'description_zh' => '猪人',
            'image' => 'pigmen.png',
            'slug' => 'pigmen',
            'is_active' => true,
        ]);

        ProductCategory::create([
            'name' => 'RECYCLE SOLVENT',
            'name_id' => 'DAUR ULANG PELARUT',
            'name_zh' => '回收溶剂',
            'description' => 'RECYCLE SOLVENT',
            'description_id' => 'DAUR ULANG PELARUT',
            'description_zh' => '回收溶剂',
            'image' => 'recycle-solvent.png',
            'slug' => 'recycle-solvent',
            'is_active' => true,
        ]);

        ProductCategory::create([
            'name' => 'SOLVENT INDUSTRY',
            'name_id' => 'INDUSTRI PELARUT',
            'name_zh' => '溶剂行业',
            'description' => 'SOLVENT INDUSTRY',
            'description_id' => 'INDUSTRI PELARUT',
            'description_zh' => '溶剂行业',
            'image' => 'solvent-industry.png',
            'slug' => 'solvent-industry',
            'is_active' => true,
        ]);

        ProductCategory::create([
            'name' => 'OTHERS',
            'name_id' => 'LAINNYA',
            'name_zh' => '其他的',
            'description' => 'OTHERS',
            'description_id' => 'LAINNYA',
            'description_zh' => '其他的',
            'image' => 'others.png',
            'slug' => 'others',
            'is_active' => true,
        ]);

        ProductCategory::create([
            'name' => 'SECTION GAS',
            'name_id' => 'BAGIAN GAS',
            'name_zh' => '气体部分',
            'description' => 'SECTION GAS',
            'description_id' => 'BAGIAN GAS',
            'description_zh' => '气体部分',
            'image' => 'section-gas.png',
            'slug' => 'section-gas',
            'is_active' => true,
        ]);

        ProductCategory::create([
            'name' => 'SECTION ELECTRONIC GRADE',
            'name_id' => 'BAGIAN KELAS ELEKTRONIK',
            'name_zh' => '电子级部分',
            'description' => 'SECTION ELECTRONIC GRADE',
            'description_id' => 'BAGIAN KELAS ELEKTRONIK',
            'description_zh' => '电子级部分',
            'image' => 'section-electronic-grade.png',
            'slug' => 'section-electronic-grade',
            'is_active' => true,
        ]);

        ProductCategory::create([
            'name' => 'WATER TREATMENT',
            'name_id' => 'PENGOLAHAN AIR',
            'name_zh' => '水处理',
            'description' => 'WATER TREATMENT',
            'description_id' => 'PENGOLAHAN AIR',
            'description_zh' => '水处理',
            'image' => 'water-treatment.png',
            'slug' => 'water-treatment',
            'is_active' => true,
        ]);
    }
}
