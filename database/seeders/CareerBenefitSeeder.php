<?php

namespace Database\Seeders;

use App\Models\CareerBenefit;
use Illuminate\Database\Seeder;

class CareerBenefitSeeder extends Seeder
{
    public function run(): void
    {
        CareerBenefit::create([
            'name' => 'Professional Growth',
            'name_id' => 'Pertumbuhan Profesional',
            'name_zh' => '专业成长',
            'description' => 'Work alongside industry experts and gain valuable experience in the dynamic fields of chemical distribution, petrochemicals, and export services.',
            'description_id' => 'Bekerja bersama para pakar industri dan dapatkan pengalaman berharga dalam bidang dinamis distribusi kimia, petrokimia, dan layanan ekspor.',
            'description_zh' => '与行业专家一起工作并在化学品分销、石化产品和出口服务等动态领域获得宝贵经验。',
            'image' => 'professional-growth.png',
            'is_active' => true,
        ]);

        CareerBenefit::create([
            'name' => 'Nationwide Impact',
            'name_id' => 'Dampak Nasional',
            'name_zh' => '全国性影响',
            'description' => 'Be part of a company with a strong presence across Indonesia, contributing to projects that serve major industries from Sumatra to Sulawesi.',
            'description_id' => 'Jadilah bagian dari perusahaan yang memiliki kehadiran kuat di seluruh Indonesia, berkontribusi pada proyek yang melayani industri besar dari Sumatera hingga Sulawesi.',
            'description_zh' => '成为一家在印度尼西亚拥有强大影响力的公司的一员，为从苏门答腊到苏拉威西岛的主要产业项目做出贡献。',
            'image' => 'nationwide-impact.png',
            'is_active' => true,
        ]);

        CareerBenefit::create([
            'name' => 'Innovative Environment',
            'name_id' => 'Lingkungan Inovatif',
            'name_zh' => '创新环境',
            'description' => 'Engage in meaningful work supporting cutting-edge sectors like solar panel manufacturing, semiconductors, and lithium battery production.',
            'description_id' => 'Terlibat dalam pekerjaan yang bermakna yang mendukung sektor mutakhir seperti manufaktur panel surya, semikonduktor, dan produksi baterai lithium.',
            'description_zh' => '参与支持太阳能电池板制造、半导体和锂电池生产等尖端行业的有意义的工作。',
            'image' => 'innovative-environment.png',
            'is_active' => true,
        ]);
    }
}
