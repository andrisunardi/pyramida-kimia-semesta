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
                    <h1>Our Products Range</h1>
                    <p>Cepsum dolor sit amet consectetur to adipiscing elit, sed dot eiusmod tempor incididunt labore et
                        dolore magna aliqua. Veniam quis nostrud exercitation ullamco laboris.</p>
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
                                            ])" :text="trans('index.view') . ' ' . trans('index.product')" />
                                        </span>
                                    </div>
                                </div>
                                <div class="photo-caption">
                                    <a href="product-single.html">
                                        <h4>{{ $productCategory->translate_name }}</h4>
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
