<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    public function run(): void
    {
        ProductCategory::create(['name' => 'ACID & PEROXIDE', 'is_active' => true]);
        ProductCategory::create(['name' => 'BLAKE FLUID', 'is_active' => true]);
        ProductCategory::create(['name' => 'FOOD INDUSTRY', 'is_active' => true]);
        ProductCategory::create(['name' => 'METAL DEGREASING', 'is_active' => true]);
        ProductCategory::create(['name' => 'PIGMEN', 'is_active' => true]);
        ProductCategory::create(['name' => 'RECYCLE SOLVENT', 'is_active' => true]);
        ProductCategory::create(['name' => 'SOLVENT INDUSTRY', 'is_active' => true]);
        ProductCategory::create(['name' => 'OTHERS', 'is_active' => true]);
        ProductCategory::create(['name' => 'SECTION GAS', 'is_active' => true]);
        ProductCategory::create(['name' => 'SECTION ELECTRONIC GRADE', 'is_active' => true]);
        ProductCategory::create(['name' => 'WATER TREATMENT', 'is_active' => true]);
    }
}
