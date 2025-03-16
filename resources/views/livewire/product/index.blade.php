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
</main>
