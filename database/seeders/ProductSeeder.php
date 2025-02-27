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
        $name = "ACETIC ACID GLACIAL - JEPANG";

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'description' => "Description {$name}",
            'image' => Str::slug($name) . '.png',
            'image_coa' => Str::slug($name) . '-coa.png',
            'image_msds' => Str::slug($name) . '-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 1;
        $name = "ACETIC ACID GLACIAL - LOKAL";

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'description' => "Description {$name}",
            'image' => Str::slug($name) . '.png',
            'image_coa' => Str::slug($name) . '-coa.png',
            'image_msds' => Str::slug($name) . '-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 1;
        $name = "BORIC ACID";

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'description' => "Description {$name}",
            'image' => Str::slug($name) . '.png',
            'image_coa' => Str::slug($name) . '-coa.png',
            'image_msds' => Str::slug($name) . '-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 1;
        $name = "CAUSTIC SODA CAIR 48%";

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'description' => "Description {$name}",
            'image' => Str::slug($name) . '.png',
            'image_coa' => Str::slug($name) . '-coa.png',
            'image_msds' => Str::slug($name) . '-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 1;
        $name = "CAUSTIC SODA FLAKES - ARAB SAUDI";

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'description' => "Description {$name}",
            'image' => Str::slug($name) . '.png',
            'image_coa' => Str::slug($name) . '-coa.png',
            'image_msds' => Str::slug($name) . '-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 1;
        $name = "CAUSTIC SODA FLAKES - CINA";

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'description' => "Description {$name}",
            'image' => Str::slug($name) . '.png',
            'image_coa' => Str::slug($name) . '-coa.png',
            'image_msds' => Str::slug($name) . '-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 1;
        $name = "CAUSTIC SODA FLAKES - INDIA";

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'description' => "Description {$name}",
            'image' => Str::slug($name) . '.png',
            'image_coa' => Str::slug($name) . '-coa.png',
            'image_msds' => Str::slug($name) . '-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 1;
        $name = "FORMIC ACID - CHINA";

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'description' => "Description {$name}",
            'image' => Str::slug($name) . '.png',
            'image_coa' => Str::slug($name) . '-coa.png',
            'image_msds' => Str::slug($name) . '-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 1;
        $name = "HYDRO CHLORIC ACID (HCL) 20% - LOKAL";

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'description' => "Description {$name}",
            'image' => Str::slug($name) . '.png',
            'image_coa' => Str::slug($name) . '-coa.png',
            'image_msds' => Str::slug($name) . '-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 1;
        $name = "HYDRO CHLORIC ACID (HCL) 32% - LOKAL";

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'description' => "Description {$name}",
            'image' => Str::slug($name) . '.png',
            'image_coa' => Str::slug($name) . '-coa.png',
            'image_msds' => Str::slug($name) . '-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 1;
        $name = "HYDROGEN PEROXIDE 50% FOODGRADE - THAILAND";

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'description' => "Description {$name}",
            'image' => Str::slug($name) . '.png',
            'image_coa' => Str::slug($name) . '-coa.png',
            'image_msds' => Str::slug($name) . '-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 1;
        $name = "HYDROGEN PEROXIDE 35% FOODGRADE - THAILAND";

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'description' => "Description {$name}",
            'image' => Str::slug($name) . '.png',
            'image_coa' => Str::slug($name) . '-coa.png',
            'image_msds' => Str::slug($name) . '-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 1;
        $name = "HYDROGEN PEROXIDE 50% TEKNIS - THAILAND";

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'description' => "Description {$name}",
            'image' => Str::slug($name) . '.png',
            'image_coa' => Str::slug($name) . '-coa.png',
            'image_msds' => Str::slug($name) . '-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 1;
        $name = "HYDROGEN PEROXIDE 50% TEKNIS - KOREA";

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'description' => "Description {$name}",
            'image' => Str::slug($name) . '.png',
            'image_coa' => Str::slug($name) . '-coa.png',
            'image_msds' => Str::slug($name) . '-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 1;
        $name = "NITRIC ACID";

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'description' => "Description {$name}",
            'image' => Str::slug($name) . '.png',
            'image_coa' => Str::slug($name) . '-coa.png',
            'image_msds' => Str::slug($name) . '-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 1;
        $name = "PHOSPORIC ACID";

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'description' => "Description {$name}",
            'image' => Str::slug($name) . '.png',
            'image_coa' => Str::slug($name) . '-coa.png',
            'image_msds' => Str::slug($name) . '-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);

        $productCategoryId = 1;
        $name = "SULFURIC ACID";

        Product::create([
            'product_category_id' => $productCategoryId,
            'name' => $name,
            'description' => "Description {$name}",
            'image' => Str::slug($name) . '.png',
            'image_coa' => Str::slug($name) . '-coa.png',
            'image_msds' => Str::slug($name) . '-msds.png',
            'slug' => Str::slug($name),
            'is_active' => true,
        ]);
    }
}
