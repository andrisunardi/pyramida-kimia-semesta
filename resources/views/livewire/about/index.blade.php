@section('title', trans('index.about'))
@section('icon', 'fas fa-building')

<main>
    <div class="banner banner-static">
        <div class="container">
            <div class="content row has-bg-image">
                <div class="banner-text">
                    <h1 class="page-title">@yield('title')</h1>
                </div>
                <div class="imagebg bg-image-loaded">
                    <x-components::image :src="asset('images/banner/about.png')" :alt="trans('index.about') . ' - ' . env('APP_TITLE')" />
                </div>
            </div>
        </div>
    </div>

    <div class="section section-contents section-pad">
        <div class="container">
            <div class="content row">
                <h1>{{ trans('index.about') }} {{ env('APP_NAME') }}</h1>
                <div class="col-sm-7 npl res-m-bttm">
                    <p class="lead">{{ trans('index.company_profile') }} {{ env('APP_NAME') }}</p>
                    <p>
                        @if (App::isLocale('en'))
                            PT. Pyramida Kimia Semesta was established in Tangerang Serpong, is one part of the
                            PANCASAKTI GROUP which is engaged in the distribution of chemicals and trading of CHEMICAL
                            RAW MATERIALS and PETROCHEMICALS, currently PT. Pyramida Kimia Semesta was established to
                            serve our export-oriented Customers (BONDED ZONES) and serve the EXPORT of Petrochemicals
                            and other basic chemicals from Indonesia to other countries. We also serve various special
                            chemicals especially for the SOLAR PANEL, SEMICONDUCTOR, LITHIUM BATTERY and INDUSTRY WASTE
                            PROCESSING Industries.
                        @endif

                        @if (App::isLocale('id'))
                            PT. Pyramida kimia semesta didirikan di Tangerang serpong, merupakan salah satu bagian dari
                            PANCASAKTI GROUP yang bergerak dibidang distribusi kimia dan perdagangan BAHAN BAKU KIMIA
                            serta PETROKIMIA, saat ini PT. Pyramida Kimia Semesta didirikan untuk melayani Customer kami
                            yang berorientasi export (KAWASAN BERIKAT) dan melayani EXPORT Petrokimia dan kimia dasar
                            lainnya dari Indonesia ke negara lain. Kami juga melayani berbagai kimia khusus terutama
                            untuk Industri Pembuatan SOLAR PANEL, SEMICONDUCTOR, BATERAI LITHIUM dan PENGOLAHAN LIMBAH
                            INDUSTRY.
                        @endif

                        @if (App::isLocale('zh'))
                            PT. Pyramida Kimia Semesta 成立于丹格朗塞尔彭，是 PANCASAKTI 集团的一部分，该集团从事化学品分销和化学原料及石化产品的贸易，目前为 PT。
                            Pyramida Kimia Semesta
                            成立的目的是为我们的出口型客户（保税区）提供服务，并为印度尼西亚向其他国家出口石化产品和其他基础化学品提供服务。我们还提供各种特种化学品，特别是针对太阳能电池板、半导体、锂电池和工业废物处理行业。
                        @endif
                    </p>
                    <p>
                        @if (App::isLocale('en'))
                            With Long Experience and our experienced staff, PT. Pyramida Kimia Semesta strives to
                            provide maximum and best service for all our customers from Sumatra, Batam, Semarang,
                            Surabaya to Kalimantan and Sulawesi. We have a marketing, logistics and shipping network
                            that has been experienced for more than 20 years in this chemical industry.
                        @endif

                        @if (App::isLocale('id'))
                            Dengan Pengalaman yang Panjang dan staff kami yang berpengalaman, PT. Pyramida Kimia Semesta
                            berusaha memberikan pelayanan yg maksimal dan terbaik untuk semua customer kami dari
                            Sumatra, Batam, Semarang, Surabaya hingga Kalimantan dan Sulawesi. Kami memiliki jaringan
                            pemasaran, logistic dan pengiriman yang telah berpengalaman lebih dari 20 tahun di industry
                            kimia ini.
                        @endif

                        @if (App::isLocale('zh'))
                            凭借我们丰富的经验和经验丰富的员工, PT。 Pyramida Kimia Semesta
                            致力于为苏门答腊、巴淡岛、三宝垄、泗水、加里曼丹和苏拉威西岛的所有客户提供最优质服务。我们拥有在化工行业拥有20多年经验的营销、物流和配送网络。
                        @endif
                    </p>
                </div>
                <div class="col-sm-5 npr">
                    <div>
                        <img draggable="false" src="{{ asset('images/about/office.png') }}"
                            alt="{{ trans('index.about') }} - {{ trans('index.office') }} - {{ env('APP_TITLE') }}">
                    </div>
                    <div>
                        <img draggable="false" src="{{ asset('images/about/office.png') }}"
                            alt="{{ trans('index.about') }} - {{ trans('index.office') }} - {{ env('APP_TITLE') }}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
