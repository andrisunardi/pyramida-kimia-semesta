@section('title', trans('index.history'))
@section('icon', 'fas fa-scroll')

<main>
    @livewire('banner')

    <div class="section section-contents section-pad">
        <div class="container">
            <div class="content row">
                <div class="row">
                    <div class="col-md-8">
                        <h1>{{ trans('index.our_history') }}</h1>
                        <p>
                            @if (App::isLocale('en'))
                                Since its establishment in Serpong, Tangerang, PT. Pyramida Kimia Semesta has grown as a
                                vital part of the Pancasakti Group, specializing in the distribution of chemical raw
                                materials and petrochemicals. With a strong focus on serving bonded zone exports and
                                international markets, the company also supplies specialty chemicals for solar panel
                                manufacturing, semiconductors, lithium batteries, and industrial waste treatment. Backed
                                by decades of experience and a dedicated team, PT. Pyramida Kimia Semesta continues to
                                deliver excellence to customers across Sumatra, Batam, Semarang, Surabaya, Kalimantan,
                                and Sulawesi through its well-established marketing and logistics network.
                            @endif

                            @if (App::isLocale('id'))
                                Sejak didirikan di Serpong, Tangerang, PT. Pyramida Kimia Semesta telah berkembang
                                menjadi bagian penting dari Pancasakti Group, yang mengkhususkan diri dalam distribusi
                                bahan baku kimia dan petrokimia. Dengan fokus yang kuat dalam melayani ekspor kawasan
                                berikat dan pasar internasional, perusahaan ini juga memasok bahan kimia khusus untuk
                                pembuatan panel surya, semikonduktor, baterai lithium, dan pengolahan limbah industri.
                                Didukung oleh pengalaman puluhan tahun dan tim yang berdedikasi, PT. Pyramida Kimia
                                Semesta terus memberikan keunggulan kepada pelanggan di seluruh Sumatera, Batam,
                                Semarang, Surabaya, Kalimantan, dan Sulawesi melalui jaringan pemasaran dan logistiknya
                                yang mapan.
                            @endif

                            @if (App::isLocale('zh'))
                                自在坦格朗塞尔彭成立以来，PT. Pyramida Kimia Semesta 已成长为 Pancasakti
                                集团的重要组成部分，专门从事化学原料和石化产品的分销。该公司专注于服务保税区出口和国际市场，还为太阳能电池板制造、半导体、锂电池和工业废物处理提供特种化学品。凭借数十年的经验和一支敬业的团队，PT.
                                Pyramida Kimia Semesta 继续通过其完善的营销和物流网络为苏门答腊、巴淡岛、三宝垄、泗水、加里曼丹和苏拉威西岛的客户提供卓越服务。
                            @endif
                        </p>

                        <div class="timelines">
                            @foreach ($histories as $key => $history)
                                <div class="timeline" wire:key="{{ $key }}">
                                    <div class="tl-year">{{ $history->year }}</div>
                                    <div class="tl-content">
                                        <h3 class="tl-title">{{ $history->translate_name }}</h3>
                                        <div class="tl-text">
                                            <p>{!! $history->translate_description !!}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-md-4">
                        @livewire('sidebar-right')
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
