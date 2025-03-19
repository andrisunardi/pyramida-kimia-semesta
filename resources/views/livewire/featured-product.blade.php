<div class="wgs-box boxed">
    <h3 class="wgs-heading">{{ trans('index.featured_product') }}</h3>
    <div class="wgs-content">
        <p>
            <x-components::image :src="$product->assetImage()" :alt="$product->altImage()" />
        </p>

        <strong>{{ $product->translate_name }}</strong>
        <p>{{ $product->translate_description }}</p>

        <p>
            <x-components::link :class="'btn btn-full'" :href="route('product.view', [
                'slug' => $product->slug,
            ])" :text="trans('index.view') . ' ' . trans('index.product')" />
        </p>
    </div>
</div>
