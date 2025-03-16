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
            'name_id' => 'Welcome To Pyramida Kimia Semesta',
            'name_zh' => '欢迎来到金字塔基米亚塞梅斯塔',
            'description' => 'Importer and Stockist of Industrial and Food Chemical',
            'description_id' => 'Importir dan Distributor Bahan Kimia Industri dan Makanan',
            'description_zh' => '工业和食品化学品进口商和经销商',
            'image' => 'welcome-to-pyramida-kimia-semesta.png',
            'is_active' => true,
        ]);

        Slider::create([
            'name' => 'Pancasakti Group',
            'name_id' => 'Grup Pancasakti',
            'name_zh' => '潘卡萨克提集团',
            'description' => 'Pyramida Kimia Semesta From Pancasakti Group',
            'description_id' => 'Pyramida Kimia Semesta Dari Grup Pancasakti',
            'description_zh' => 'Pancasakti 集团的 Pyramida Kimia Semesta',
            'image' => 'pancasakti-group.png',
            'is_active' => true,
        ]);
    }
}
