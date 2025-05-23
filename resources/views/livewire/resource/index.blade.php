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
                        <h3>COA (CERTIFICATE OF ANALYSIS)</h3>

                        {{-- @foreach ($productCategories as $key => $productCategory)
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
                        @endforeach --}}

                        <div class="panel-group accordion faqs" id="coa" role="tablist" aria-multiselectable="true">
                            @foreach ($productCategories as $key => $productCategory)
                                <div class="panel panel-default" wire:key="{{ $key }}">
                                    <div class="panel-heading" role="tab" id="coa-id-{{ $productCategory->id }}">
                                        <h4 class="panel-title">
                                            <a draggable="false" class="collapsed" role="button" data-toggle="collapse"
                                                data-parent="#coa" href="#coa-{{ $productCategory->id }}"
                                                aria-expanded="false">
                                                {{ $productCategory->translate_name }}
                                                <span class="plus-minus"><span></span></span>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="coa-{{ $productCategory->id }}" class="panel-collapse collapse"
                                        role="tabpanel" aria-labelledby="coa-id-{{ $productCategory->id }}">
                                        <div class="panel-body">
                                            @foreach ($productCategory->products as $key => $product)
                                                <p>
                                                    <a draggable="false" href="{{ $product->assetFileCoa() }}" download>
                                                        <em class="fa fa-file-pdf-o"></em> {{ $product->name }}
                                                    </a>
                                                </p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <hr>
                        <h3>MSDS (MATERIAL SAFETY DATA SHEET)</h3>

                        {{-- @foreach ($productCategories as $key => $productCategory)
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
                        @endforeach --}}

                        <div class="panel-group accordion faqs" id="msds" role="tablist"
                            aria-multiselectable="true">
                            @foreach ($productCategories as $key => $productCategory)
                                <div class="panel panel-default" wire:key="{{ $key }}">
                                    <div class="panel-heading" role="tab" id="msds-id-{{ $productCategory->id }}">
                                        <h4 class="panel-title">
                                            <a draggable="false" class="collapsed" role="button" data-toggle="collapse"
                                                data-parent="#msds" href="#msds-{{ $productCategory->id }}"
                                                aria-expanded="false">
                                                {{ $productCategory->translate_name }}
                                                <span class="plus-minus"><span></span></span>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="msds-{{ $productCategory->id }}" class="panel-collapse collapse"
                                        role="tabpanel" aria-labelledby="msds-id-{{ $productCategory->id }}">
                                        <div class="panel-body">
                                            @foreach ($productCategory->products as $key => $product)
                                                <p>
                                                    <a draggable="false" href="{{ $product->assetFileMsds() }}"
                                                        download>
                                                        <em class="fa fa-file-pdf-o"></em> {{ $product->name }}
                                                    </a>
                                                </p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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
