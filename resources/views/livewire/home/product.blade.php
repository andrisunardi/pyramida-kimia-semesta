<div class="section section-projects recent-project section-pad">
    <div class="container">
        <div class="content row">

            <h4 class="heading-sm-lead">{{ trans('index.our_product') }}</h4>
            <h2 class="heading-section with-line">{{ env('APP_NAME') }}</h2>

            <div class="feature-row feature-project-row mgfix">
                <div class="owl-carousel loop has-carousel" data-items="4" data-navs="true">
                    @foreach ($products as $key => $product)
                        <div class="{{ $loop->iteration % 2 == 0 ? 'even' : 'odd' }}" wire:key="{{ $key }}">
                            <div class="feature feature-project boxed">
                                <a draggable="false" href="{{ route('product.view', ['slug' => $product->slug]) }}"
                                    wire:navigate>
                                    <div class="fbox-photo">
                                        <x-components::image :src="$product->assetImage()" :alt="$product->altImage()" />
                                    </div>
                                </a>
                                <div class="fbox-content">
                                    <h3>
                                        <x-components::link :href="route('product.view', ['slug' => $product->slug])" :text="$product->translate_name" />
                                    </h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
