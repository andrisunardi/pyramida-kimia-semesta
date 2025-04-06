<?php

namespace Database\Seeders;

use App\Models\Office;
use Illuminate\Database\Seeder;

class OfficeSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 8; $i++) {
            Office::create([
                'name' => "South Tangerang {$i}",
                'address' => env('CONTACT_ADDRESS'),
                'maps' => env('CONTACT_MAPS'),
                'phone' => env('CONTACT_PHONE'),
                'image' => "office-{$i}.png",
                'is_active' => true,
            ]);
        }
    }
}
