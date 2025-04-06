@section('title', trans('index.partner'))
@section('icon', 'fas fa-users')

<main>
    @livewire('banner')

    <div class="section section-contents section-pad">
        <div class="container">
            <div class="content row">
                <div class="row">
                    <div class="col-md-8">
                        <h1>
                            @if (App::isLocale('en'))
                                Investors Centre
                            @endif
                            @if (App::isLocale('id'))
                                Pusat Investor
                            @endif
                            @if (App::isLocale('zh'))
                                投资者中心
                            @endif
                        </h1>
                        @foreach ($partners as $key => $partner)
                            <div class="client-logo row space-top-md">
                                <div class="col-sm-4 col-xs-6 res-m-bttm-xs">
                                    <x-components::image :href="$partner->link" :src="$partner->assetImage()" :alt="$partner->altImage()" />
                                </div>
                                <div class="col-sm-8 col-xs-12">
                                    <strong>{{ $partner->translate_name }}</strong>
                                    <p>{!! $partner->translate_description !!}</p>
                                    <x-components::link.external-link :icon="''" :href="$partner->link"
                                        :text="Str::after($partner->link, '://')" />
                                </div>
                            </div>
                        @endforeach

                        <div class="gaps"></div>
                        <hr>

                        <h4>
                            @if (App::isLocale('en'))
                                Investor Fact Sheet
                            @endif
                            @if (App::isLocale('id'))
                                Lembar Fakta Investor
                            @endif
                            @if (App::isLocale('zh'))
                                投资者概况
                            @endif
                        </h4>
                        <p>
                            @if (App::isLocale('en'))
                                Discover key insights into PT. Pyramida Kimia Semesta's business performance, market
                                reach, and strategic direction. Our investor fact sheet provides a concise overview of
                                our operations, export capabilities, core industries served, and long-term growth
                                potential within the chemical and petrochemical sectors.
                            @endif
                            @if (App::isLocale('id'))
                                Temukan wawasan utama tentang kinerja bisnis, jangkauan pasar, dan arah strategis PT.
                                Pyramida Kimia Semesta. Lembar fakta investor kami memberikan gambaran singkat tentang
                                operasi kami, kemampuan ekspor, industri inti yang dilayani, dan potensi pertumbuhan
                                jangka panjang dalam sektor kimia dan petrokimia.
                            @endif
                            @if (App::isLocale('zh'))
                                了解 PT. Pyramida Kimia Semesta
                                的业务表现、市场覆盖范围和战略方向的关键见解。我们的投资者情况说明书简要概述了我们的运营、出口能力、服务的核心行业以及化学和石化行业的长期增长潜力。
                            @endif
                        </p>
                        <p>
                            <x-components::link :class="'btn btn-md'" :href="route('resource')" :text="trans('index.download')"
                                :download="true" />
                        </p>

                        <hr>

                        <h4>
                            @if (App::isLocale('en'))
                                Latest Presentation
                            @endif
                            @if (App::isLocale('id'))
                                Presentasi Terbaru
                            @endif
                            @if (App::isLocale('zh'))
                                最新演讲
                            @endif
                        </h4>
                        <p>
                            @if (App::isLocale('en'))
                                Explore our most recent corporate presentation to gain insights into PT. Pyramida Kimia
                                Semesta’s business strategy, industry focus, and growth initiatives. Stay updated on how
                                we’re driving innovation and expanding our presence in the chemical and petrochemical
                                markets.
                            @endif
                            @if (App::isLocale('id'))
                                Jelajahi presentasi perusahaan terbaru kami untuk mendapatkan wawasan tentang strategi
                                bisnis, fokus industri, dan inisiatif pertumbuhan PT. Pyramida Kimia Semesta. Tetap
                                dapatkan informasi terkini tentang cara kami mendorong inovasi dan memperluas kehadiran
                                kami di pasar kimia dan petrokimia.
                            @endif
                            @if (App::isLocale('zh'))
                                查看我们最新的公司介绍，深入了解 PT. Pyramida Kimia Semesta 的业务战略、行业重点和增长计划。了解我们如何推动创新并扩大我们在化学和石化市场的影响力。
                            @endif
                        </p>
                        <p>
                            <x-components::link :class="'btn btn-md'" :href="route('resource')" :text="trans('index.download')"
                                :download="true" />
                        </p>

                        <hr>

                        <h4>
                            @if (App::isLocale('en'))
                                Analyst Coverage
                            @endif
                            @if (App::isLocale('id'))
                                Cakupan Analis
                            @endif
                            @if (App::isLocale('zh'))
                                分析师报道
                            @endif
                        </h4>
                        <p>
                            @if (App::isLocale('en'))
                                PT. Pyramida Kimia Semesta is closely monitored by industry analysts who provide
                                independent insights into our market performance, strategic developments, and growth
                                outlook within the chemical and petrochemical sectors.
                            @endif
                            @if (App::isLocale('id'))
                                PT. Pyramida Kimia Semesta diawasi secara ketat oleh analis industri yang memberikan
                                wawasan independen tentang kinerja pasar, perkembangan strategis, dan prospek
                                pertumbuhan dalam sektor kimia dan petrokimia.
                            @endif
                            @if (App::isLocale('zh'))
                                PT. Pyramida Kimia Semesta 受到行业分析师的密切关注，他们为我们在化工和石化领域的市场表现、战略发展和增长前景提供独立见解。
                            @endif
                        </p>
                        <p>
                            <x-components::link :class="'btn btn-md'" :href="route('resource')" :text="trans('index.download')"
                                :download="true" />
                        </p>
                    </div>

                    <div class="col-md-4">
                        @livewire('sidebar-right')
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
