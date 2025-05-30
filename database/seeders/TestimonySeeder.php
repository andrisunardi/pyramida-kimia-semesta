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
            'message_id' => 'PT. Pyramida Kimia Semesta telah menjadi mitra yang luar biasa, menyediakan bahan baku kimia berkualitas tinggi yang secara konsisten memenuhi standar industri kami. Layanan dan keahlian mereka yang andal menjadikan mereka pemasok tepercaya untuk kebutuhan manufaktur kami.',
            'message_zh' => 'PT. Pyramida Kimia Semesta 一直是我们优秀的合作伙伴，提供始终符合我们行业标准的高品质化学原料。他们可靠的服务和专业知识使其成为我们值得信赖的生产制造供应商。',
            'is_active' => true,
        ]);

        Testimony::create([
            'name' => 'Sarah Tan',
            'company' => 'Green Energy Solutions',
            'message' => "We've been working with PT. Pyramida Kimia Semesta for years, and their commitment to quality and timely delivery has been exceptional. Their expertise in chemical distribution has greatly supported our solar panel production.",
            'message_id' => 'Kami telah bekerja sama dengan PT. Pyramida Kimia Semesta selama bertahun-tahun, dan komitmen mereka terhadap kualitas dan pengiriman tepat waktu sangat luar biasa. Keahlian mereka dalam distribusi bahan kimia telah sangat mendukung produksi panel surya kami.',
            'message_zh' => '我们与 PT. Pyramida Kimia Semesta 合作多年，他们对质量和准时交付的承诺非常出色。他们在化学品分销方面的专业知识为我们的太阳能电池板生产提供了极大的支持。',
            'is_active' => true,
        ]);

        Testimony::create([
            'name' => 'Michael Lee',
            'company' => 'Advanced Lithium Technologies',
            'message' => 'PT. Pyramida Kimia Semesta provides top-grade raw materials for our battery manufacturing process. Their professional service and industry knowledge make them a reliable partner in our supply chain.',
            'message_id' => 'PT. Pyramida Kimia Semesta menyediakan bahan baku bermutu tinggi untuk proses produksi baterai kami. Layanan profesional dan pengetahuan industri mereka menjadikan mereka mitra yang dapat diandalkan dalam rantai pasokan kami.',
            'message_zh' => 'PT. Pyramida Kimia Semesta 为我们的电池制造流程提供顶级原材料。他们的专业服务和行业知识使其成为我们供应链中值得信赖的合作伙伴。',
            'is_active' => true,
        ]);
    }
}
