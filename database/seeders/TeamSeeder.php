<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 6; $i++) {
            Team::create([
                'name' => "User {$i}",
                'job' => 'Admin',
                'image' => "team-{$i}.png",
                'is_active' => true,
            ]);
        }
    }
}
