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

                        <p>
                            <x-components::image :src="$product->assetImage()" :alt="$product->altImage()" />
                        </p>

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
                                        {{ trans('index.download') }} COA
                                        <i class="fa fa-file-pdf-o"></i>
                                    </a>
                                @endif

                                @if ($product->checkFileMsds())
                                    <a draggable="false" href="{{ $product->assetFileMsds() }}" class="btn" download>
                                        {{ trans('index.download') }} MSDS
                                        <i class="fa fa-file-pdf-o"></i>
                                    </a>
                                @endif
                            </div>
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
