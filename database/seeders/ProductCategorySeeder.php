<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    public function run(): void
    {
        ProductCategory::create(['name' => 'ACID & PEROXIDE']);
        ProductCategory::create(['name' => 'BLAKE FLUID']);
        ProductCategory::create(['name' => 'FOOD INDUSTRY']);
        ProductCategory::create(['name' => 'METAL DEGREASING']);
        ProductCategory::create(['name' => 'PIGMEN']);
        ProductCategory::create(['name' => 'RECYCLE SOLVENT']);
        ProductCategory::create(['name' => 'SOLVENT INDUSTRY']);
        ProductCategory::create(['name' => 'OTHERS']);
        ProductCategory::create(['name' => 'SECTION GAS']);
        ProductCategory::create(['name' => 'SECTION ELECTRONIC GRADE']);
        ProductCategory::create(['name' => 'WATER TREATMENT']);
    }
}
