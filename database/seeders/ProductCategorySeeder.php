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
        ]);

        ProductCategory::create([
            'name' => 'BLAKE FLUID',
            'name_id' => 'CAIRAN HITAM',
            'name_zh' => '布莱克液',
        ]);

        ProductCategory::create([
            'name' => 'FOOD INDUSTRY',
            'name_id' => 'INDUSTRI PANGAN',
            'name_zh' => '食品工业',
        ]);

        ProductCategory::create([
            'name' => 'METAL DEGREASING',
            'name_id' => 'PENGURANGAN LOGAM',
            'name_zh' => '金属除油',
        ]);

        ProductCategory::create([
            'name' => 'PIGMEN',
            'name_id' => 'PIGMEN',
            'name_zh' => '猪人',
        ]);

        ProductCategory::create([
            'name' => 'RECYCLE SOLVENT',
            'name_id' => 'DAUR ULANG PELARUT',
            'name_zh' => '回收溶剂',
        ]);

        ProductCategory::create([
            'name' => 'SOLVENT INDUSTRY',
            'name_id' => 'INDUSTRI PELARUT',
            'name_zh' => '溶剂行业',
        ]);

        ProductCategory::create([
            'name' => 'OTHERS',
            'name_id' => 'LAINNYA',
            'name_zh' => '其他的',
        ]);

        ProductCategory::create([
            'name' => 'SECTION GAS',
            'name_id' => 'BAGIAN GAS',
            'name_zh' => '气体部分',
        ]);

        ProductCategory::create([
            'name' => 'SECTION ELECTRONIC GRADE',
            'name_id' => 'BAGIAN KELAS ELEKTRONIK',
            'name_zh' => '电子级部分',
        ]);

        ProductCategory::create([
            'name' => 'WATER TREATMENT',
            'name_id' => 'PENGOLAHAN AIR',
            'name_zh' => '水处理',
        ]);
    }
}
