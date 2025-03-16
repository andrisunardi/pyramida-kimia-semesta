<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $productCategoryId = 1;
        $name = 'ACETIC ACID GLACIAL - JEPANG';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 1;
        $name = 'ACETIC ACID GLACIAL - LOKAL';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 1;
        $name = 'BORIC ACID';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 1;
        $name = 'CAUSTIC SODA CAIR 48%';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 1;
        $name = 'CAUSTIC SODA FLAKES - ARAB SAUDI';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 1;
        $name = 'CAUSTIC SODA FLAKES - CINA';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 1;
        $name = 'CAUSTIC SODA FLAKES - INDIA';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 1;
        $name = 'FORMIC ACID - CHINA';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 1;
        $name = 'HYDRO CHLORIC ACID (HCL) 20% - LOKAL';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 1;
        $name = 'HYDRO CHLORIC ACID (HCL) 32% - LOKAL';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 1;
        $name = 'HYDROGEN PEROXIDE 50% FOODGRADE - THAILAND';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 1;
        $name = 'HYDROGEN PEROXIDE 35% FOODGRADE - THAILAND';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 1;
        $name = 'HYDROGEN PEROXIDE 50% TEKNIS - THAILAND';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 1;
        $name = 'HYDROGEN PEROXIDE 50% TEKNIS - KOREA';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 1;
        $name = 'NITRIC ACID';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 1;
        $name = 'PHOSPORIC ACID';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 1;
        $name = 'SULFURIC ACID';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 2;
        $name = 'DI ETHYLENE GLYCOL (DEG) - LOKAL';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 2;
        $name = 'MONO ETHYLENE GLYCOL (MEG) - LOKAL';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 2;
        $name = 'TRI ETHYLENE GLYCOL (TEG) - SINGAPORE';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 3;
        $name = '3-METHOXY 3-METHYL 1-BUTANOL';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 3;
        $name = 'CITRIC ACID MONOHYDRATE- CHINA';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 3;
        $name = 'GLYCERIN - LOKAL';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 3;
        $name = 'PROPYLENE GLYCOL (PG) – KOREA';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 3;
        $name = 'SOYABEAN LECITHINE';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 3;
        $name = 'TAPIOKA STARCH';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 4;
        $name = 'PROCHLOROETHYLENE (PCE) - KDK';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 4;
        $name = 'TRICHLOROETHYLENE (TCE) - CHINA';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 4;
        $name = 'TRICHLOROETHYLENE (TCE) - KDK';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 5;
        $name = 'BLACK';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 5;
        $name = 'BLUE';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 5;
        $name = 'GREEN';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 5;
        $name = 'RED';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 5;
        $name = 'YELLOW';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 6;
        $name = 'METHOXY PROPYL ACETATE (PMA)';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 6;
        $name = 'SOLVENT P 334 - CNBM 330 (MEK + Aceton)';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 6;
        $name = 'SOLVENT P 500 - CNBM 500 (PM + PMA)';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 6;
        $name = 'SOLVENT P 510 - CNBM 510 (Aceton + PM + PMA)';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 6;
        $name = 'SOLVENT P 555 - CNBM 350 (Idem BA)';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 6;
        $name = 'SOLVENT P 777 - CNBM 530 (idem BC)';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 7;
        $name = 'BUTYL ACETATE (BA)';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 7;
        $name = 'BUTYL CELLOCOVE (BC)';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 7;
        $name = 'CYCLOHEXANONE - CHINA';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 7;
        $name = 'DEMINERAL WATER';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 7;
        $name = 'DHIMETHYL FORMAMIDE (DMF)';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 7;
        $name = 'DISINFECTANT';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 7;
        $name = 'ETHANOL FOOD - LOKAL';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 7;
        $name = 'ETHYL ACETATE (EA)';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 7;
        $name = 'ETHYL ACETATE (EA) - LOKAL';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 7;
        $name = 'FARAFINIC 60 - LOKAL';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 7;
        $name = 'FARAFINIC 95 - LOKAL';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 7;
        $name = 'HYDROPLUS - LOKAL';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 7;
        $name = 'ISO PROPYL ALKOHOL (IPA)';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 7;
        $name = 'KONDESAT - LOKAL';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 7;
        $name = 'LAWAROMATIC WHITE SPIRIT (LAWS) / SMT 5 - LOKAL';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 7;
        $name = 'METHANOL (99.9%) - DRUM LOKAL';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 7;
        $name = 'METHANOL (99.9%) - TANGKI LOKAL';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 7;
        $name = 'N - HEXANE 48%';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 7;
        $name = 'PHENOL CRYSTAL (JEPANG & KOREA)';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 7;
        $name = 'PHENOL LIQUID (INDIA)';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 7;
        $name = 'SPECIAL BOILING POINT - LOKAL';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 7;
        $name = 'WHITE OIL - EX INDIA';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 7;
        $name = 'XYLENE - SHELL';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 8;
        $name = 'FLEXIBAG';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 8;
        $name = 'FLEXITANK';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 8;
        $name = 'JUMBO BAG';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 9;
        $name = 'SILANE';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 9;
        $name = 'LIQUID NITROGEN';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 9;
        $name = 'LIQUID OXIGEN';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 9;
        $name = 'BORON GAS';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 9;
        $name = 'ARGON GAS';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 9;
        $name = 'HELIUM GAS';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 10;
        $name = 'HYDROFLOURIC ACID EL GRADE';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 10;
        $name = 'CAUSTIC LIQUID EL GRADE';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 10;
        $name = 'HYDROGEN PEROXIDE EL GRADE';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 11;
        $name = 'POLYACRYLAMIDE';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 11;
        $name = 'POLY ALUMUNIUM CHLORIDE';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 11;
        $name = 'CALCIUM DICHLORIDE';

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'name_id' => $name,
            'name_zh' => $name,
            'description' => "Description {$name}",
            'description_id' => "Description {$name}",
            'description_zh' => "Description {$name}",
            'image' => Str::slug($name).'.png',
            'image_coa' => Str::slug($name).'-coa.png',
            'image_msds' => Str::slug($name).'-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);
    }
}
