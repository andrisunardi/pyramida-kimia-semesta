@section('title', trans('index.resource'))
@section('icon', 'fas fa-book')

<main>
    @livewire('banner')

    <div class="section section-contents section-pad">
        <div class="container">
            <div class="content row">

                <div class="row">
                    <div class="col-md-8">
                        <h1>
                            {{ trans('index.resources') }}
                            {{ trans('index.and') }}
                            {{ trans('index.reserves') }}
                        </h1>

                        <hr>
                        <h3>MSDS</h3>

                        @foreach ($productCategories as $key => $productCategory)
                            <p>
                                <strong>{{ $productCategory->translate_name }}</strong><br />
                                {{ $productCategory->translate_description }}
                            </p>
                            @foreach ($productCategory->products as $key => $product)
                                <p>
                                    <a draggable="false" href="{{ $product->assetFileMsds() }}" download>
                                        <em class="fa fa-file-pdf-o"></em> {{ $product->name }}
                                    </a>
                                </p>
                            @endforeach
                        @endforeach

                        <hr>
                        <h3>COA</h3>

                        @foreach ($productCategories as $key => $productCategory)
                            <p>
                                <strong>{{ $productCategory->translate_name }}</strong><br />
                                {{ $productCategory->translate_description }}
                            </p>
                            @foreach ($productCategory->products as $key => $product)
                                <p>
                                    <a draggable="false" href="{{ $product->assetFileCoa() }}" download>
                                        <em class="fa fa-file-pdf-o"></em> {{ $product->name }}
                                    </a>
                                </p>
                            @endforeach
                        @endforeach
                    </div>

                    <div class="col-md-4">
                        @livewire('sidebar-right')
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
