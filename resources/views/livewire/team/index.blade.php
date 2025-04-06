@section('title', trans('index.team'))
@section('icon', 'fas fa-user-circle')

<main>
    @livewire('banner')

    <div class="section section-contents section-pad">
        <div class="container">
            <div class="content row">
                <div class="row">
                    <div class="col-md-8">
                        <h1 class="center-sm">
                            {{ trans('index.our_team') }}
                        </h1>
                        <p class="center-sm">
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
                                <div class="col-md-4 col-sm-6 col-xs-6 {{ $loop->iteration % 2 == 0 ? 'even' : 'odd' }}">
                                    <div class="team-member">
                                        <div class="team-photo">
                                            <x-components::image :src="$team->assetImage()" :alt="$team->altImage()" />
                                        </div>
                                        <div class="team-info">
                                            <h4 class="name">{{ $team->name }}</h4>
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
