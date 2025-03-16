<?php

namespace Database\Seeders;

use App\Models\Testimony;
use Illuminate\Database\Seeder;

class TestimonySeeder extends Seeder
{
    public function run(): void
    {
        Testimony::create([
            'name' => 'John Doe',
            'company' => 'Tech Innovators Ltd.',
            'message' => 'PT. Pyramida Kimia Semesta has been an outstanding partner, providing high-quality chemical raw materials that consistently meet our industry standards. Their reliable service and expertise make them a trusted supplier for our manufacturing needs.',
            'is_active' => true,
        ]);

        Testimony::create([
            'name' => 'Sarah Tan',
            'company' => 'Green Energy Solutions',
            'message' => "We've been working with PT. Pyramida Kimia Semesta for years, and their commitment to quality and timely delivery has been exceptional. Their expertise in chemical distribution has greatly supported our solar panel production.",
            'is_active' => true,
        ]);

        Testimony::create([
            'name' => 'Michael Lee',
            'company' => 'Advanced Lithium Technologies',
            'message' => 'PT. Pyramida Kimia Semesta provides top-grade raw materials for our battery manufacturing process. Their professional service and industry knowledge make them a reliable partner in our supply chain.',
            'is_active' => true,
        ]);
    }
}
