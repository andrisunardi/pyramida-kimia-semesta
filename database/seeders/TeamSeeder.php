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
                'description' => 'Our Admin team plays a vital role in ensuring smooth day-to-day operations across the company. From managing documentation and schedules to supporting logistics and internal coordination, they are the backbone that keeps everything running efficiently behind the scenes.',
                'description_id' => 'Tim Admin kami memainkan peran penting dalam memastikan kelancaran operasional harian di seluruh perusahaan. Mulai dari mengelola dokumentasi dan jadwal hingga mendukung logistik dan koordinasi internal, mereka adalah tulang punggung yang memastikan semuanya berjalan efisien di balik layar.',
                'description_zh' => '我们的行政团队在确保公司日常运营顺利进行方面发挥着至关重要的作用。从管理文档和日程安排到支持物流和内部协调，他们是幕后一切高效运转的中坚力量。',
                'image' => "team-{$i}.png",
                'slug' => "team-{$i}",
                'is_active' => true,
            ]);
        }
    }
}
