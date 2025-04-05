<?php

namespace Database\Seeders;

use App\Models\History;
use Illuminate\Database\Seeder;

class HistorySeeder extends Seeder
{
    public function run(): void
    {
        History::create([
            'year' => 2010,
            'name' => 'Start of the Journey',
            'name_id' => 'Awal Perjalanan',
            'name_zh' => '旅程开始',
            'description' => 'PT. Pyramida Kimia Semesta was founded in Serpong, Tangerang, as part of the PANCASAKTI GROUP, focusing on the distribution and trade of chemical raw materials and petrochemicals.',
            'description_id' => 'PT. Pyramida Kimia Semesta didirikan di Serpong, Tangerang, sebagai bagian dari PANCASAKTI GROUP, yang berfokus pada distribusi dan perdagangan bahan baku kimia dan petrokimia.',
            'description_zh' => 'PT. Pyramida Kimia Semesta 成立于坦格朗塞尔彭，是 PANCASAKTI 集团的一部分，专注于化学原料和石化产品的分销和贸易。',
            'is_active' => true,
        ]);

        History::create([
            'year' => 2012,
            'name' => 'Entering Export Market',
            'name_id' => 'Memasuki Pasar Ekspor',
            'name_zh' => '进入出口市场',
            'description' => 'The company began serving export-oriented customers, including bonded zones (Kawasan Berikat), and started exporting petrochemical and basic chemical products to international markets.',
            'description_id' => 'Perusahaan mulai melayani pelanggan berorientasi ekspor, termasuk kawasan berikat, dan mulai mengekspor produk petrokimia dan kimia dasar ke pasar internasional.',
            'description_zh' => '该公司开始服务于包括保税区（Kawasan Berikat）在内的出口型客户，并开始向国际市场出口石化和基础化工产品。',
            'is_active' => true,
        ]);

        History::create([
            'year' => 2015,
            'name' => 'Expansion into Specialty Chemicals',
            'name_id' => 'Ekspansi ke Bahan Kimia Khusus',
            'name_zh' => '进军特种化学品领域',
            'description' => 'Expanded its offerings to include specialty chemicals for industries such as solar panels, semiconductors, lithium batteries, and industrial waste treatment.',
            'description_id' => 'Memperluas penawarannya untuk mencakup bahan kimia khusus untuk industri seperti panel surya, semikonduktor, baterai lithium, dan pengolahan limbah industri.',
            'description_zh' => '扩大其产品范围，包括太阳能电池板、半导体、锂电池和工业废物处理等行业的特种化学品。',
            'is_active' => true,
        ]);

        History::create([
            'year' => 2017,
            'name' => 'Nationwide Distribution',
            'name_id' => 'Distribusi Nasional',
            'name_zh' => '全国分布',
            'description' => 'Developed a strong logistics and marketing network, serving clients across Sumatra, Batam, Semarang, Surabaya, Kalimantan, and Sulawesi.',
            'description_id' => 'Mengembangkan jaringan logistik dan pemasaran yang kuat, melayani klien di seluruh Sumatera, Batam, Semarang, Surabaya, Kalimantan, dan Sulawesi.',
            'description_zh' => '开发了强大的物流和营销网络，为苏门答腊岛、巴淡岛、三宝垄、泗水、加里曼丹和苏拉威西岛的客户提供服务。',
            'is_active' => true,
        ]);

        History::create([
            'year' => 2023,
            'name' => 'Over 20 Years of Group Experience',
            'name_id' => 'Lebih dari 20 Tahun Pengalaman Grup',
            'name_zh' => '超过 20 年的集团经验',
            'description' => 'With more than two decades of collective experience under the PANCASAKTI GROUP, PT. Pyramida Kimia Semesta continues to deliver excellent service to customers nationwide and globally.',
            'description_id' => 'Dengan lebih dari dua dekade pengalaman kolektif di bawah PANCASAKTI GROUP, PT. Pyramida Kimia Semesta terus memberikan layanan terbaik kepada pelanggan di seluruh negeri dan global.',
            'description_zh' => 'PT. Pyramida Kimia Semesta 拥有 PANCASAKTI GROUP 二十多年的集体经验，持续为全国乃至全球的客户提供优质服务。',
            'is_active' => true,
        ]);
    }
}
