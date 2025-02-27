<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    public function run(): void
    {
        Slider::create([
            'name' => 'Welcome To Pyramida Kimia Semesta',
            'description' => 'Trusted supplier of raw chemicals for the solar panel, semiconductor, lithium battery, and industrial waste treatment industries. Serving export markets with over 20 years of experience.',
            'image' => 'welcome-to-pyramida-kimia-semesta.png',
            'is_active' => true,
        ]);

        Slider::create([
            'name' => 'Pancasakti Group',
            'description' => 'Pyramida Kimia Semesta From Pancasakti Group',
            'image' => 'pancasakti-group.png',
            'is_active' => true,
        ]);
    }
}
