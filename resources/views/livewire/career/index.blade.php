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
                            @endif
                            @if (App::isLocale('id'))
                            @endif
                            @if (App::isLocale('zh'))
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
