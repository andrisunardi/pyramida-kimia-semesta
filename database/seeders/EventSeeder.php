<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        Event::create([
            'name' => 'Event 1',
            'name_id' => 'Acara 1',
            'name_zh' => '事件 1',
            'description' => 'Description 1',
            'description_id' => 'Deskripsi 1',
            'description_zh' => '描述 1',
            'image' => 'event-1.png',
            'video' => 'event-1.mp4',
            'is_active' => true,
        ]);

        Event::create([
            'name' => 'Event 2',
            'name_id' => 'Acara 2',
            'name_zh' => '事件 2',
            'description' => 'Description 2',
            'description_id' => 'Deskripsi 2',
            'description_zh' => '描述 2',
            'image' => 'event-2.png',
            'video' => 'event-2.mp4',
            'is_active' => true,
        ]);

        Event::create([
            'name' => 'Event 3',
            'name_id' => 'Acara 3',
            'name_zh' => '事件 3',
            'description' => 'Description 3',
            'description_id' => 'Deskripsi 3',
            'description_zh' => '描述 3',
            'image' => 'event-3.png',
            'video' => 'event-3.mp4',
            'is_active' => true,
        ]);
    }
}
