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
            HistorySeeder::class,
            TeamSeeder::class,
            PartnerSeeder::class,
            TestimonySeeder::class,
            FaqSeeder::class,

            CareerSeeder::class,
            CareerBenefitSeeder::class,

            GalleryCategorySeeder::class,
            GallerySeeder::class,

            ProductCategorySeeder::class,
            ProductSeeder::class,

            ArticleSeeder::class,

            ContactSeeder::class,
        ]);
    }
}
