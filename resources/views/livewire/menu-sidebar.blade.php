<div class="wgs-box wgs-menus">
    <div class="wgs-content">
        <ul class="list list-grouped">
            <li class="list-heading">
                <span>{{ trans('index.about') }} {{ trans('index.company') }}</span>
                <ul>
                    <li class="{{ Route::is('about') ? 'current' : null }}">
                        <x-components::link :href="route('about')" :text="trans('index.about')" />
                    </li>
                    <li class="{{ Route::is('resource') ? 'current' : null }}">
                        <x-components::link :href="route('resource')" :text="trans('index.resource')" />
                    </li>
                </ul>
            </li>
            <li class="{{ Route::is('product.*') ? 'current' : null }}">
                <x-components::link :href="route('product.index')" :text="trans('index.product')" />
            </li>
            <li class="{{ Route::is('gallery') ? 'current' : null }}">
                <x-components::link :href="route('gallery')" :text="trans('index.gallery')" />
            </li>
            <li class="{{ Route::is('faq') ? 'current' : null }}">
                <x-components::link :href="route('faq')" :text="trans('index.faq')" />
            </li>
            <li class="{{ Route::is('testimony') ? 'current' : null }}">
                <x-components::link :href="route('testimony')" :text="trans('index.testimony')" />
            </li>
            <li class="{{ Route::is('contact') ? 'current' : null }}">
                <x-components::link :href="route('contact')" :text="trans('index.contact')" />
            </li>
        </ul>
    </div>
</div>
