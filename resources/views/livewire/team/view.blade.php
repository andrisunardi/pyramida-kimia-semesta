@section('title', $team->name)
@section('icon', 'fas fa-user-circle')

<main>
    @livewire('banner', [
        'title' => $team->name,
        'image' => asset('images/banner/team.png'),
    ])


    <div class="section section-contents section-pad">
        <div class="container">
            <div class="content row">

                <div class="row">
                    <div class="col-md-8">
                        <h1>{{ trans('index.our_team') }}</h1>
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

                        <div class="team-profile">
                            <div class="team-member row">
                                <div class="team-photo col-md-4 col-sm-5 col-xs-12">
                                    <x-components::image :href="route('team.view', [
                                        'slug' => $team->slug,
                                    ])" :src="$team->assetImage()" :alt="$team->altImage()" />
                                </div>
                                <div class="team-info col-md-8 col-sm-7 col-xs-12">
                                    <h3 class="name">{{ $team->name }}</h3>
                                    <p class="sub-title">{{ $team->job }}</p>
                                    <p>{{ $team->translate_description }}</p>
                                </div>
                            </div>
                        </div>

                        @foreach ($otherTeams as $key => $otherTeam)
                            <div class="team-profile">
                                <div class="team-member row">
                                    <div class="team-photo col-md-4 col-sm-5 col-xs-12">
                                        <x-components::image :href="route('team.view', [
                                            'slug' => $otherTeam->slug,
                                        ])" :src="$otherTeam->assetImage()" :alt="$otherTeam->altImage()" />
                                    </div>
                                    <div class="team-info col-md-8 col-sm-7 col-xs-12">
                                        <h3 class="name">
                                            <x-components::link :href="route('team.view', [
                                                'slug' => $otherTeam->slug,
                                            ])" :text="$otherTeam->name" />
                                        </h3>
                                        <p class="sub-title">{{ $otherTeam->job }}</p>
                                        <p>{{ $otherTeam->translate_description }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="col-md-4">
                        @livewire('sidebar-right')
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
