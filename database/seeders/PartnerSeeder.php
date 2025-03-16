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
                'image' => "partner-{$i}.png",
                'is_active' => true,
            ]);
        }
    }
}
