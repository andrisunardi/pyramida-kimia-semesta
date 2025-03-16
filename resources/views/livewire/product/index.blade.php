@section('title', trans('index.product'))
@section('icon', 'fas fa-flask')

<main>
    <div class="banner banner-static">
        <div class="container">
            <div class="content row has-bg-image">
                <div class="banner-text">
                    <h1 class="page-title">@yield('title')</h1>
                </div>
                <div class="imagebg bg-image-loaded">
                    <x-components::image :src="asset('images/banner/product.png')" :alt="trans('index.product') . ' - ' . env('APP_TITLE')" />
                </div>

            </div>
        </div>
    </div>

    <div class="section section-contents section-products section-pad">
        <div class="container">
            <div class="content row">
                <div class="wide-md center">
                    <h1>{{ trans('index.our_product_category') }}</h1>
                    <p>
                        @if (App::isLocale('en'))
                            PT. Pyramida Kimia Semesta provides various chemical products divided into several main
                            categories to support the needs of domestic and foreign industries.
                        @endif

                        @if (App::isLocale('id'))
                            PT. Pyramida Kimia Semesta menyediakan berbagai produk kimia yang terbagi dalam beberapa
                            kategori utama untuk mendukung kebutuhan industri di dalam maupun luar negeri.
                        @endif

                        @if (App::isLocale('zh'))
                            PT. Pyramida Kimia Semesta 提供各种化学产品，分为几个主要类别，以满足国内外工业的需求。
                        @endif
                    </p>
                </div>
                <div class="gallery gallery-products with-caption hover-fade center mgfix">
                    <ul class="photos-list col-x3">
                        @foreach ($productCategories as $key => $productCategory)
                            <li wire:key="{{ $key }}">
                                <div class="photo">
                                    <x-components::image :src="$productCategory->assetImage()" :alt="$productCategory->altImage()" />
                                    <div class="photo-link">
                                        <span class="links">
                                            <x-components::link :class="'btn more-link'" :href="route('product.category', [
                                                'slug' => $productCategory->slug,
                                            ])" :text="trans('index.view') .
                                                ' ' .
                                                trans('index.all') .
                                                ' ' .
                                                trans('index.product')" />
                                        </span>
                                    </div>
                                </div>
                                <div class="photo-caption">
                                    <a draggable="false"
                                        href="{{ route('product.category', ['slug' => $productCategory->slug]) }}"
                                        wire:navigate>
                                        <h4>{{ $productCategory->translate_name }}</h4>
                                        <h5>{{ $productCategory->products_count }} {{ trans('index.product') }}</h5>
                                    </a>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="section section-contents section-products section-pad">
        <div class="container">
            <div class="content row">
                <div class="products-listing row">
                    <div class="col-md-8 res-m-bttm">

                        <h1>{{ trans('index.all') }} {{ trans('index.product') }} {{ env('APP_NAME') }}</h1>
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

                        <div class="clear"></div>
                        <div class="clear"></div>

                        <div class="gallery-lists gallery-product-list alignl filter-menu">
                            <ul class="list">
                                <li class="active" data-filter="all">{{ trans('index.all') }}</li>
                                @foreach ($productCategories as $key => $productCategory)
                                    <li data-filter="{{ $productCategory->id }}" wire:key="{{ $key }}">
                                        {{ $productCategory->translate_name }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="gallery gallery-filter gallery-products with-caption hover-fade">
                            <ul class="photos-list col-x2">
                                @foreach ($products as $key => $product)
                                    <li class="filtr-item" data-category="{{ $product->product_category_id }}"
                                        wire:key="{{ $key }}">
                                        <div class="photo">
                                            <x-components::image :src="$product->assetImage()" :alt="$product->altImage()" />

                                            <div class="photo-link">
                                                <span class="links">
                                                    <x-components::link.external-link :class="'btn more-link'"
                                                        :href="$product->assetImage()" :text="trans('index.view') . ' ' . trans('index.product')" />
                                                </span>
                                            </div>
                                        </div>

                                        <div class="photo-caption">
                                            <a draggable="false" href="{{ $product->assetImage() }}" wire:navigate>
                                                <h4>{{ $product->translate_name }}</h4>
                                            </a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <div class="col-md-4">
                        <div class="sidebar-right">

                            <div class="wgs-box wgs-menus">
                                <div class="wgs-content">
                                    <ul class="list list-grouped">
                                        <li class="list-heading">
                                            <span>Hydraulic Power</span>
                                            <ul>
                                                <li><a href="product-single.html">Hydraulic Component</a></li>
                                                <li><a href="product-single.html">Pumps and Valves</a></li>
                                            </ul>
                                        </li>
                                        <li class="list-heading">
                                            <span>Cutting Tools</span>
                                            <ul>
                                                <li><a href="product-single.html">Drilling and Threading</a></li>
                                                <li><a href="product-single.html">Turning and Milling</a></li>
                                                <li><a href="product-single.html">Medial Equipments</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="wgs-box wgs-quoteform">
                                <h3 class="wgs-heading">Quick Contact</h3>
                                <div class="wgs-content">
                                    <p>If you have any questions or would like to book a session please contact us.</p>
                                    <form id="contact-us" class="form-quote"
                                        action="https://demo.themenio.com/industrial/form/contact.php" method="post">
                                        <div class="form-results"></div>
                                        <div class="form-group">
                                            <div class="form-field">
                                                <input name="contact-name" type="text" placeholder="Name *"
                                                    class="form-control required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-field">
                                                <input name="contact-email" type="email" placeholder="Email *"
                                                    class="form-control required email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-field form-m-bttm">
                                                <input name="contact-phone" type="text" placeholder="Phone"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-field">
                                                <input name="contact-service" type="text"
                                                    placeholder="Interest of Service" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-field">
                                                <textarea name="contact-message" placeholder="Messages *" class="txtarea form-control required"></textarea>
                                            </div>
                                        </div>
                                        <input type="text" class="hidden" name="form-anti-honeypot" value="">
                                        <button type="submit" class="btn btn-alt sb-h">Submit</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Sidebar #end -->
                </div>

            </div>
        </div>
    </div>
</main>
