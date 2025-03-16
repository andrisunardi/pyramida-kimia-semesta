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

    <div class="call-action cta-mini bg-secondary">
        <div class="cta-block">
            <div class="container">
                <div class="content row">
                    <div class="cta-sameline">
                        <h3>
                            @if (App::isLocale('en'))
                                Distribution & trading of chemical raw materials and petrochemicals.
                            @endif

                            @if (App::isLocale('id'))
                                Distribusi & perdagangan bahan baku kimia dan petrokimia.
                            @endif

                            @if (App::isLocale('zh'))
                                化工原料及石化产品的分销及贸易。
                            @endif
                        </h3>
                        <span class="cta-num">
                            {{ trans('index.call') }}
                            <strong>
                                <x-components::link.phone :value="env('CONTACT_PHONE')" :icon="''" />
                            </strong>
                        </span>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @livewire('home.home-product-category-component')

    <div class="section-pad bg-light">
        <div class="container">
            <div class="content row">
                <div class="wide-sm center">
                    <h1>
                        @if (App::isLocale('en'))
                            Importer and Stockist Of Industrial and Food Chemical
                        @endif

                        @if (App::isLocale('id'))
                            Importir dan Stockist Bahan Kimia Industri dan Makanan
                        @endif

                        @if (App::isLocale('zh'))
                            工业和食品化学品进口商和经销商
                        @endif
                    </h1>
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
            </div>
        </div>
    </div>

    <div class="call-action cta-small">
        <div class="cta-block">
            <div class="container">
                <div class="content row">
                    <div class="cta-sameline">
                        <h3>
                            @if (App::isLocale('en'))
                                View all our products at {{ env('APP_NAME') }}
                            @endif

                            @if (App::isLocale('id'))
                                Lihat semua produk kami di Pyramida Kimia Semesta
                            @endif

                            @if (App::isLocale('zh'))
                                在 Pyramida Kimia Semesta 查看我们所有的产品
                            @endif
                        </h3>

                        <x-components::link :class="'btn btn-light'" :href="route('product.index')" :text="trans('index.our_product')" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    @livewire('home.home-product-component')

    @livewire('home.home-testimony-component')

    @livewire('home.home-article-component')

    @livewire('home.home-partner-component')
</main>
