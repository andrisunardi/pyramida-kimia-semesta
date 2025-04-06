@section('title', $productCategory->translate_name)
@section('icon', 'fas fa-flask')

<main>
    @livewire('banner', [
        'title' => $productCategory->translate_name,
        'image' => asset('images/banner/product.png'),
    ])

    <div class="section section-contents section-products section-pad">
        <div class="container">
            <div class="content row">
                <div class="wide-md center">
                    <h1>{{ trans('index.our_product') }}</h1>
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
                        @foreach ($productCategory->products as $key => $product)
                            <li wire:key="{{ $key }}">
                                <div class="photo">
                                    <x-components::image :src="$product->assetImage()" :alt="$product->altImage()" />

                                    <div class="photo-link">
                                        <span class="links">
                                            <x-components::link :class="'btn more-link'" :href="route('product.view', [
                                                'slug' => $product->slug,
                                            ])" :text="trans('index.view') . ' ' . trans('index.product')" />
                                        </span>
                                    </div>
                                </div>

                                <div class="photo-caption">
                                    <a draggable="false" href="{{ route('product.view', ['slug' => $product->slug]) }}"
                                        wire:navigate>
                                        <h4>{{ Str::limit($product->translate_name, 30) }}</h4>
                                        <h5>{{ Str::limit($product->translate_description, 30) }}</h5>
                                    </a>
                                    <br />
                                    <div>
                                        <span>
                                            <x-components::link :class="'btn'" :href="route('product.view', [
                                                'slug' => $product->slug,
                                            ])" :text="trans('index.view')" />
                                        </span>
                                        @if ($product->checkFileCoa())
                                            <span>
                                                <x-components::link.external-link :class="'btn btn-alt'" :href="$product->assetFileCoa()"
                                                    :text="'COA'" />
                                            </span>
                                        @endif
                                        @if ($product->checkFileMsds())
                                            <span>
                                                <x-components::link.external-link :class="'btn btn-alt'" :href="$product->assetFileMsds()"
                                                    :text="'MSDS'" />
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>
