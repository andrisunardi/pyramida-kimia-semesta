<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 6; $i++) {
            Partner::create([
                'name' => "Partner {$i}",
                'name_id' => "Partner {$i}",
                'name_zh' => "Partner {$i}",
                'description' => 'PT. Pyramida Kimia Semesta was established in Tangerang Serpong, is one part of the PANCASAKTI GROUP which is engaged in the distribution of chemicals and trading of CHEMICAL RAW MATERIALS and PETROCHEMICALS.',
                'description_id' => 'PT. Pyramida kimia semesta didirikan di Tangerang serpong, merupakan salah satu bagian dari PANCASAKTI GROUP yang bergerak dibidang distribusi kimia dan perdagangan BAHAN BAKU KIMIA serta PETROKIMIA.',
                'description_zh' => 'PT. Pyramida Kimia Semesta 成立于丹格朗塞尔彭，隶属于 PANCASAKTI 集团，该集团从事化学品分销以及化学原料和石化产品贸易。',
                'image' => "partner-{$i}.png",
                'is_active' => true,
            ]);
        }
    }
}
