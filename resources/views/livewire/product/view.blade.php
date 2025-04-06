@section('title', $product->translate_name)
@section('icon', 'fas fa-flask')

<main>
    @livewire('banner', [
        'title' => $product->translate_name,
        'image' => asset('images/banner/product.png'),
    ])

    <div class="section section-contents section-products single-product section-pad">
        <div class="container">
            <div class="content row">
                <div class="products-details row">
                    <div class="col-md-8 res-m-bttm">
                        <h1>{{ $product->translate_name }}</h1>
                        <p><strong>{!! $product->category->translate_name !!}</strong></p>
                        <p>{!! $product->translate_description !!}</p>
                        <p class="gaps size-xs"></p>
                        <p><x-components::image :src="$product->assetImage()" :alt="$product->altImage()" /></p>

                        <div class="feature-imagebox border download-action">
                            <div class="block">
                                <h3>
                                    @if (App::isLocale('en'))
                                        Download PDF Datasheet
                                    @endif
                                    @if (App::isLocale('id'))
                                        Unduh Lembar Data PDF
                                    @endif
                                    @if (App::isLocale('zh'))
                                        下载 PDF 数据表
                                    @endif
                                </h3>
                                <p>
                                    @if (App::isLocale('en'))
                                        Access essential documents such as Product Datasheets, Certificates of Analysis
                                        (COA), and Material Safety Data Sheets (MSDS) in PDF format. Click below to
                                        download and stay informed about the quality, safety, and specifications of our
                                        chemical products.
                                    @endif
                                    @if (App::isLocale('id'))
                                        Akses dokumen penting seperti Lembar Data Produk, Sertifikat Analisis (COA), dan
                                        Lembar Data Keselamatan Material (MSDS) dalam format PDF. Klik di bawah ini
                                        untuk mengunduh dan tetap mendapatkan informasi tentang kualitas, keamanan, dan
                                        spesifikasi produk kimia kami.
                                    @endif
                                    @if (App::isLocale('zh'))
                                        以 PDF 格式获取产品数据表、分析证书 (COA) 和材料安全数据表 (MSDS) 等重要文件。点击下方下载并随时了解我们化学产品的质量、安全性和规格。
                                    @endif
                                </p>

                                @if ($product->checkFileCoa())
                                    <a draggable="false" href="{{ $product->assetFileCoa() }}" class="btn" download>
                                        COA <i class="fa fa-download"></i>
                                    </a>
                                @endif

                                @if ($product->checkFileMsds())
                                    <a draggable="false" href="{{ $product->assetFileMsds() }}" class="btn" download>
                                        MSDS <i class="fa fa-download"></i>
                                    </a>
                                @endif
                            </div>
                        </div>

                        <h1>{{ trans('index.other_product') }} {{ env('APP_NAME') }}</h1>
                        <p>
                            @if (App::isLocale('en'))
                                PT. Pyramida Kimia Semesta provides a variety of chemical and petrochemical raw
                                materials, including specialty chemicals for the solar panel, semiconductor, lithium
                                battery, and waste processing industries, with a service reach to the export market and
                                bonded zones.
                            @endif

                            @if (App::isLocale('id'))
                                PT. Pyramida Kimia Semesta menyediakan berbagai bahan baku kimia dan petrokimia,
                                termasuk kimia khusus untuk industri solar panel, semikonduktor, baterai lithium, serta
                                pengolahan limbah, dengan jangkauan layanan hingga pasar ekspor dan kawasan berikat.
                            @endif

                            @if (App::isLocale('zh'))
                                PT. Pyramida Kimia Semesta 提供各种化学和石化原料，包括用于太阳能电池板、半导体、锂电池和废物处理行业的特种化学品，其服务范围延伸至出口市场和保税区。
                            @endif
                        </p>

                        <div class="gallery gallery-filter gallery-products with-caption hover-fade">
                            <ul class="photos-list col-x2">
                                @foreach ($otherProducts as $key => $otherProduct)
                                    <li class="filtr-item" data-category="{{ $otherProduct->product_category_id }}"
                                        wire:key="{{ $key }}">
                                        <div class="photo">
                                            <x-components::image :src="$otherProduct->assetImage()" :alt="$otherProduct->altImage()" />

                                            <div class="photo-link">
                                                <span class="links">
                                                    <x-components::link :class="'btn more-link'" :href="route('product.view', [
                                                        'slug' => $otherProduct->slug,
                                                    ])"
                                                        :text="trans('index.view') . ' ' . trans('index.product')" />
                                                </span>
                                            </div>
                                        </div>

                                        <div class="photo-caption">
                                            <a draggable="false" href="{{ $otherProduct->assetImage() }}" wire:navigate>
                                                <h4>{{ $otherProduct->translate_name }}</h4>
                                                <h5>{{ $otherProduct->category->translate_name }}</h5>
                                            </a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
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
