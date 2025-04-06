@section('title', trans('index.about'))
@section('icon', 'fas fa-building')

<main>
    @livewire('banner')

    <div class="section section-contents section-pad bg-light">
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
                        <x-components::image :src="asset('images/about/office.png')" :alt="trans('index.about') . ' - ' . trans('index.office') . ' - ' . env('APP_TITLE')" />
                    </div>
                    <br />
                    <div>
                        <x-components::image :src="asset('images/about/warehouse.png')" :alt="trans('index.about') . ' - ' . trans('index.warehouse') . ' - ' . env('APP_TITLE')" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section section-contents section-pad">
        <div class="container">
            <div class="content row">
                <div class="row">
                    <div class="col-md-8">
                        <h1>{{ trans('index.about') }} {{ env('APP_NAME') }}</h1>
                        <p>
                            {{ env('APP_DESCRIPTION') }}
                        </p>

                        <div class="gaps"></div>

                        <hr>
                        <h2>{{ trans('index.vision_and_mission') }}</h2>
                        <p class="lead">
                            @if (App::isLocale('en'))
                                At PT. Pyramida Kimia Semesta, our vision is to become a trusted leader in the chemical
                                and petrochemical industry, delivering innovative and sustainable solutions. Our mission
                                is to serve our customers with integrity, reliability, and excellence by providing
                                high-quality products, expert support, and efficient distribution across local and
                                international markets.
                            @endif
                            @if (App::isLocale('id'))
                                Di PT. Pyramida Kimia Semesta, visi kami adalah menjadi pemimpin tepercaya dalam
                                industri kimia dan petrokimia, yang memberikan solusi inovatif dan berkelanjutan. Misi
                                kami adalah melayani pelanggan dengan integritas, keandalan, dan keunggulan dengan
                                menyediakan produk berkualitas tinggi, dukungan ahli, dan distribusi yang efisien di
                                seluruh pasar lokal dan internasional.
                            @endif
                            @if (App::isLocale('zh'))
                                在 PT. Pyramida Kimia
                                Semesta，我们的愿景是成为化工和石化行业值得信赖的领导者，提供创新和可持续的解决方案。我们的使命是通过提供高质量的产品、专家支持和在本地和国际市场上的高效分销，以诚信、可靠和卓越的服务为客户提供服务。
                            @endif
                        </p>

                        <div class="gaps"></div>

                        <h4>{{ trans('index.our_vision') }}</h4>
                        <p>
                            @if (App::isLocale('en'))
                                To be a leading and trusted partner in the chemical and petrochemical industry,
                                delivering innovative, reliable, and sustainable solutions that support industrial
                                growth across Indonesia and beyond.
                            @endif
                            @if (App::isLocale('id'))
                                Menjadi mitra terdepan dan tepercaya dalam industri kimia dan petrokimia, memberikan
                                solusi inovatif, andal, dan berkelanjutan yang mendukung pertumbuhan industri di seluruh
                                Indonesia dan sekitarnya.
                            @endif
                            @if (App::isLocale('zh'))
                                成为化工和石化行业领先且值得信赖的合作伙伴，提供创新、可靠和可持续的解决方案，支持印度尼西亚及其他地区的工业增长。
                            @endif
                        </p>

                        <h4>{{ trans('index.our_mission') }}</h4>
                        <p>
                            @if (App::isLocale('en'))
                                To provide high-quality chemical and petrochemical products with excellent service,
                                supported by experienced teams and efficient logistics, in order to meet the needs of
                                both domestic and international customers while upholding integrity, safety, and
                                customer satisfaction.
                            @endif
                            @if (App::isLocale('id'))
                                Menyediakan produk kimia dan petrokimia berkualitas tinggi dengan layanan yang sangat
                                baik, didukung oleh tim yang berpengalaman dan logistik yang efisien, untuk memenuhi
                                kebutuhan pelanggan domestik dan internasional dengan tetap menjunjung tinggi
                                integritas, keselamatan, dan kepuasan pelanggan.
                            @endif
                            @if (App::isLocale('zh'))
                                以经验丰富的团队和高效的物流为支撑，提供高品质的化工和石化产品和优质的服务，满足国内外客户的需求，坚持诚信、安全和客户满意度。
                            @endif
                        </p>

                        <div class="gaps"></div>
                        <div class="clear"></div>

                        <hr>
                        <h2>{{ trans('index.our_team') }}</h2>
                        <p>
                            @if (App::isLocale('en'))
                                At PT. Pyramida Kimia Semesta, our strength lies in our people. With a dedicated team of
                                experienced professionals across administration, logistics, sales, and technical
                                support, we work together to deliver reliable solutions and exceptional service to our
                                clients throughout Indonesia and beyond.
                            @endif
                            @if (App::isLocale('id'))
                                Di PT. Pyramida Kimia Semesta, kekuatan kami terletak pada sumber daya manusia kami.
                                Dengan tim profesional yang berdedikasi dan berpengalaman di bidang administrasi,
                                logistik, penjualan, dan dukungan teknis, kami bekerja sama untuk memberikan solusi yang
                                andal dan layanan yang luar biasa kepada klien kami di seluruh Indonesia dan sekitarnya.
                            @endif
                            @if (App::isLocale('zh'))
                                在 PT. Pyramida Kimia
                                Semesta，我们的优势在于我们的员工。我们拥有一支由经验丰富的专业人员组成的专业团队，涵盖行政、物流、销售和技术支持等各个领域，我们齐心协力，为印度尼西亚及其他地区的客户提供可靠的解决方案和卓越的服务。
                            @endif
                        </p>

                        <div class="team-member-row row mgtop">
                            @foreach ($teams as $key => $team)
                                <div class="col-md-4 col-sm-6 col-xs-6 {{ $loop->iteration % 2 == 0 ? 'even' : 'odd' }}"
                                    wire:key="{{ $key }}">
                                    <div class="team-member">
                                        <div class="team-photo">
                                            <x-components::image :href="route('team.view', [
                                                'slug' => $team->slug,
                                            ])" :src="$team->assetImage()"
                                                :alt="$team->altImage()" />
                                        </div>
                                        <div class="team-info">
                                            <h4 class="name">
                                                <x-components::link :href="route('team.view', [
                                                    'slug' => $team->slug,
                                                ])" :text="$team->name" />
                                            </h4>
                                            <p class="sub-title">{{ $team->job }}</p>
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
