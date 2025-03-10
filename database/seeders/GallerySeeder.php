<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        Gallery::create([
            'name' => 'Welcome To Pyramida Kimia Semesta',
            'description' => 'Importir & Stockist Of Industrial and Food Chemical',
            'image' => 'welcome-to-pyramida-kimia-semesta.png',
            'is_active' => true,
        ]);

        Gallery::create([
            'name' => 'Pancasakti Group',
            'description' => 'Pyramida Kimia Semesta From Pancasakti Group',
            'image' => 'pancasakti-group.png',
            'is_active' => true,
        ]);
    }
}
