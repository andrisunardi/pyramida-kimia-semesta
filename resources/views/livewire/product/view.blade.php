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
                                <h3>Download PDF Datasheet</h3>
                                {{-- <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p> --}}
                                <a href="#" target="_blank" class="btn">
                                    {{ trans('index.download') }} COA
                                    <i class="fa fa-file-pdf-o"></i>
                                </a>

                                <a href="#" target="_blank" class="btn">
                                    {{ trans('index.download') }} MSDS
                                    <i class="fa fa-file-pdf-o"></i>
                                </a>
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
