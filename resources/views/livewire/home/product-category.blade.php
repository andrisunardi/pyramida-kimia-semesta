<div class="section section-services section-pad">
    <div class="container">
        <div class="content row">
            <div class="feature-row feature-service-row row">
                @foreach ($productCategories as $key => $productCategory)
                    <div class="col-md-4 col-sm-6 {{ $loop->iteration % 2 == 0 ? 'even' : 'odd' }} {{ $loop->first ? 'first' : '' }}"
                        wire:key="{{ $key }}">
                        <div class="feature boxed">
                            <a href="solution-single.html">
                                <div class="fbox-photo">
                                    <x-components::image :src="$productCategory->assetImage()" :alt="$productCategory->altImage()" />
                                </div>
                            </a>
                            <div class="fbox-content">
                                <h3>
                                    <x-components::link :href="route('product.category', ['slug' => $productCategory->slug])" :text="$productCategory->translate_name" />
                                </h3>
                                <div>
                                    <strong>
                                        {{ trans('index.total') }}
                                        {{ $productCategory->products_count }}
                                        {{ trans('index.product') }}
                                    </strong>
                                </div>
                                <p>{{ $productCategory->translate_description }}</p>
                                <div>
                                    <x-components::link :class="'btn-link'" :href="route('product.category', ['slug' => $productCategory->slug])" :text="trans('index.view') . ' ' . trans('index.product')" />
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
