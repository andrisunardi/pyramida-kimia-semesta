<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            PermissionSeeder::class,
            UserSeeder::class,

            SliderSeeder::class,
            TestimonySeeder::class,

            GalleryCategorySeeder::class,
            GallerySeeder::class,

            ProductCategorySeeder::class,
            ProductSeeder::class,

            ArticleSeeder::class,
            PartnerSeeder::class,
            FaqSeeder::class,
            HistorySeeder::class,
            CareerSeeder::class,
            ContactSeeder::class,
        ]);
    }
}
