<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        Faq::create([
            'question' => 'What is PT. Pyramida Kimia Semesta?',
            'question_id' => 'Apa itu PT. Pyramida Kimia Semesta?',
            'question_zh' => '什么是 PT. Pyramida Kimia Semesta?',
            'answer' => 'PT. Pyramida Kimia Semesta is a chemical raw materials and petrochemical distribution and trading company, part of the Pancasakti Group.',
            'answer_id' => 'PT. Pyramida Kimia Semesta adalah perusahaan distribusi dan perdagangan bahan baku kimia serta petrokimia yang merupakan bagian dari Pancasakti Group.',
            'answer_zh' => 'PT. Pyramida Kimia Semesta 是一家化学原料和石油化学分销与贸易公司，属于 Pancasakti Group。',
            'is_active' => true,
        ]);

        Faq::create([
            'question' => 'Where is PT. Pyramida Kimia Semesta located?',
            'question_id' => 'Di mana lokasi PT. Pyramida Kimia Semesta?',
            'question_zh' => 'PT. Pyramida Kimia Semesta 位于哪里?',
            'answer' => 'PT. Pyramida Kimia Semesta is located in Tangerang, Serpong, Indonesia.',
            'answer_id' => 'PT. Pyramida Kimia Semesta berlokasi di Tangerang, Serpong, Indonesia.',
            'answer_zh' => 'PT. Pyramida Kimia Semesta 位于印度尼西亚的坦格兰、塞尔宝。',
            'is_active' => true,
        ]);

        Faq::create([
            'question' => 'What services does PT. Pyramida Kimia Semesta offer?',
            'question_id' => 'Apa saja layanan yang ditawarkan oleh PT. Pyramida Kimia Semesta?',
            'question_zh' => 'PT. Pyramida Kimia Semesta 提供什么服务?',
            'answer' => 'We serve export-oriented customers (Bonded Zone) and export petrochemical and other basic chemicals from Indonesia to other countries.',
            'answer_id' => 'Kami melayani pelanggan yang berorientasi ekspor (Kawasan Berikat) serta ekspor petrokimia dan bahan kimia dasar lainnya dari Indonesia ke negara lain.',
            'answer_zh' => '我们服务以出口为主的客户 (线结区)，并将石油化学和其他基本化学品从印度尼西亚出口到其他国家。',
            'is_active' => true,
        ]);

        Faq::create([
            'question' => 'Which industries does PT. Pyramida Kimia Semesta serve?',
            'question_id' => 'Industri apa saja yang dilayani oleh PT. Pyramida Kimia Semesta?',
            'question_zh' => 'PT. Pyramida Kimia Semesta 服务哪些业界?',
            'answer' => 'We provide specialized chemicals for the solar panel, semiconductor, lithium battery, and industrial waste treatment industries.',
            'answer_id' => 'Kami menyediakan bahan kimia khusus untuk industri pembuatan panel surya, semikonduktor, baterai lithium, dan pengolahan limbah industri.',
            'answer_zh' => '我们为太阳能面板、半导体、锂电池和工业消毒处理业界提供专业化化学品。',
            'is_active' => true,
        ]);

        Faq::create([
            'question' => 'Where does PT. Pyramida Kimia Semesta operate?',
            'question_id' => 'Di mana saja jangkauan pemasaran PT. Pyramida Kimia Semesta?',
            'question_zh' => 'PT. Pyramida Kimia Semesta 在哪些地区运营?',
            'answer' => 'We serve customers in Sumatra, Batam, Semarang, Surabaya, Kalimantan, and Sulawesi.',
            'answer_id' => 'Kami melayani pelanggan di berbagai wilayah seperti Sumatra, Batam, Semarang, Surabaya, Kalimantan, dan Sulawesi.',
            'answer_zh' => '我们服务的客户包括苏马加、巴他姆、塞曼兰、苏拉巴亚、加勒满丹和苏尼西。',
            'is_active' => true,
        ]);

        Faq::create([
            'question' => 'How long has PT. Pyramida Kimia Semesta been in the industry?',
            'question_id' => 'Berapa lama pengalaman PT. Pyramida Kimia Semesta di industri ini?',
            'question_zh' => 'PT. Pyramida Kimia Semesta 在这个行业中有多久经验?我们在化学分销和贸易行业中抽象于 20 年以上的经验。',
            'answer' => 'We have over 20 years of experience in the chemical distribution and trading industry.',
            'answer_id' => 'Kami memiliki lebih dari 20 tahun pengalaman di industri distribusi dan perdagangan bahan kimia.',
            'answer_zh' => '我们在化学分销和贸易行业中抽象于 20 年以上的经验。',
            'is_active' => true,
        ]);
    }
}
