@section('title', trans('index.career'))
@section('icon', 'fas fa-briefcase')

<main>
    @livewire('banner')

    <div class="section section-contents section-pad">
        <div class="container">
            <div class="content row">
                <div class="row">
                    <div class="col-md-8 res-m-bttm">
                        <h2>
                            @if (App::isLocale('en'))
                                Together, We're Changing the World
                            @endif
                            @if (App::isLocale('id'))
                                Bersama, Kita Mengubah Dunia
                            @endif
                            @if (App::isLocale('zh'))
                                携手改变世界
                            @endif
                        </h2>
                        <p>
                            @if (App::isLocale('en'))
                                Join a team that drives innovation in the chemical and petrochemical industry. At PT.
                                Pyramida Kimia Semesta, we believe that our people are our greatest asset. With over 20
                                years of experience and a strong presence across Indonesia, we are always looking for
                                passionate, skilled, and dedicated individuals to grow with us. Whether you’re just
                                starting your career or looking to take the next step, explore opportunities to be part
                                of a company that supports industries shaping the future—like solar energy,
                                semiconductors, and advanced battery technologies.
                            @endif
                            @if (App::isLocale('id'))
                                Bergabunglah dengan tim yang mendorong inovasi dalam industri kimia dan petrokimia. Di
                                PT. Pyramida Kimia Semesta, kami percaya bahwa karyawan kami adalah aset terbesar kami.
                                Dengan pengalaman lebih dari 20 tahun dan kehadiran yang kuat di seluruh Indonesia, kami
                                selalu mencari individu yang bersemangat, terampil, dan berdedikasi untuk tumbuh bersama
                                kami. Baik Anda baru memulai karier atau ingin melangkah ke tahap berikutnya, jelajahi
                                peluang untuk menjadi bagian dari perusahaan yang mendukung industri yang membentuk masa
                                depan—seperti energi surya, semikonduktor, dan teknologi baterai canggih.
                            @endif
                            @if (App::isLocale('zh'))
                                加入一支推动化学和石化行业创新的团队。在 PT. Pyramida Kimia Semesta，我们相信员工是我们最大的财富。凭借 20
                                多年的经验和在印度尼西亚的强大影响力，我们一直在寻找充满热情、技术娴熟、敬业的人才与我们一起成长。无论您是刚刚开始职业生涯还是希望迈出下一步，都可以探索加入一家支持塑造未来的行业的公司的机会，例如太阳能、半导体和先进的电池技术。
                            @endif
                        </p>
                        <p>
                            <a href="#" class="btn">Find Opportunities</a>
                        </p>
                    </div>

                    <div class="col-md-4">
                        <div class="box-s4">
                            <p>Creating new solutions that will make a real difference in the world</p>
                            <p><a href="#" class="btn btn-light">Learn More</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section section-contents section-pad bg-light">
        <div class="container">
            <div class="content row">
                <h3 class="center font-w-300">
                    @if (App::isLocale('en'))
                        Currently Opening Position
                    @endif
                    @if (App::isLocale('id'))
                        Saat Ini Membuka Posisi
                    @endif
                    @if (App::isLocale('zh'))
                        目前空缺职位
                    @endif
                </h3>
                <div class="gaps"></div>
                <div class="row">
                    @foreach ($careers as $key => $career)
                        <div class="col-md-6 {{ !$loop->last ? 'res-m-bttm-sm' : null }}">
                            <div class="box-s1 box-flat-thin">
                                <h4>{{ $career->translate_name }}</h4>
                                <p>{!! $career->translate_description !!}</p>
                                <p class="small">
                                    <em class="fa fa-map-marker"></em>
                                    {{ $career->translate_location }}
                                </p>
                                <p>
                                    <x-components::link.external-link :class="'btn btn-sm btn-outline'" :href="$career->link"
                                        :text="trans('index.apply_online')" />
                                </p>
                            </div>
                            <div class="gaps"></div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="section section-contents section-pad">
        <div class="container">
            <div class="content row">
                <div class="row">
                    <div class="col-sm-4 res-s-bttm-lg">
                        <p><img src="image/photo-sm-career-a.jpg" alt=""></p>
                        <h4>Students Programs</h4>
                        <p>We are committed to building the unde omnis iste natus error sit voluptatem accusantium
                            dolore mque laudantium, totam rem aperiam sunt explicabo.</p>
                    </div>
                    <div class="col-sm-4 res-s-bttm-lg">
                        <p><img src="image/photo-sm-career-b.jpg" alt=""></p>
                        <h4>Divercity &amp; Inclusion</h4>
                        <p>We are committed to building the unde omnis iste natus error sit voluptatem accusantium
                            dolore mque laudantium, totam rem aperiam sunt explicabo.</p>
                    </div>
                    <div class="col-sm-4">
                        <p><img src="image/photo-sm-career-c.jpg" alt=""></p>
                        <h4>Learning &amp; Development</h4>
                        <p>We are committed to building the unde omnis iste natus error sit voluptatem accusantium
                            dolore mque laudantium, totam rem aperiam sunt explicabo.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
