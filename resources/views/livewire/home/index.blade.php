@section('title', trans('index.home'))
@section('icon', 'fas fa-home')

<main>
    @livewire('home.home-slider-component')

    <div class="section section-content section-pad">
        <div class="container">
            <div class="content row">
                <div class="row">
                    <div class="col-md-5 col-sm-6 res-s-bttm">
                        <p class="heading-sm-lead">
                            @if (App::isLocale('en'))
                                Welcome To Our Website
                            @endif

                            @if (App::isLocale('id'))
                                Selamat Datang di Situs Web Kami
                            @endif

                            @if (App::isLocale('zh'))
                                欢迎访问我们的网站
                            @endif
                        </p>
                        <h1 class="heading-lg">{{ env('APP_NAME') }}</h1>
                        <p>
                            @if (App::isLocale('en'))
                                PT. Pyramida Kimia Semesta was established in Tangerang Serpong, is one part of the
                                PANCASAKTI GROUP which is engaged in the distribution of chemicals and trading of
                                CHEMICAL RAW MATERIALS and PETROCHEMICALS
                            @endif

                            @if (App::isLocale('id'))
                                PT. Pyramida kimia semesta didirikan di Tangerang serpong, merupakan salah satu bagian
                                dari PANCASAKTI GROUP yang bergerak dibidang distribusi kimia dan perdagangan BAHAN BAKU
                                KIMIA serta PETROKIMIA
                            @endif

                            @if (App::isLocale('zh'))
                                PT. Pyramida Kimia Semesta 成立于丹格朗塞尔蓬，隶属于 PANCASAKTI 集团，该集团从事化学品分销以及化学原料和石化产品贸易。
                            @endif
                        </p>
                    </div>

                    <div class="col-md-6 col-md-offset-1 col-sm-6">
                        <x-components::image :src="asset('images/about/office.png')" :alt="trans('index.about') . ' - ' . trans('index.office') . ' - ' . env('APP_TITLE')" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    @livewire('home.home-product-category-component')
</main>
