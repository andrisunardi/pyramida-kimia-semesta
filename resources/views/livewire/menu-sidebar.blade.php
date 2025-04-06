<div class="wgs-box wgs-menus">
    <div class="wgs-content">
        <ul class="list list-grouped">
            <li class="list-heading">
                <span>{{ trans('index.about') }} {{ trans('index.company') }}</span>
                <ul>
                    <li class="{{ Route::is('about') ? 'current' : null }}">
                        <x-components::link :href="route('about')" :text="trans('index.about')" />
                    </li>
                    <li class="{{ Route::is('history') ? 'current' : null }}">
                        <x-components::link :href="route('history')" :text="trans('index.history')" />
                    </li>
                    <li class="{{ Route::is('resource') ? 'current' : null }}">
                        <x-components::link :href="route('resource')" :text="trans('index.resource')" />
                    </li>
                    <li class="{{ Route::is('team.*') ? 'current' : null }}">
                        <x-components::link :href="route('team.index')" :text="trans('index.team')" />
                    </li>
                    <li class="{{ Route::is('partner') ? 'current' : null }}">
                        <x-components::link :href="route('partner')" :text="trans('index.partner')" />
                    </li>
                    <li class="{{ Route::is('testimony') ? 'current' : null }}">
                        <x-components::link :href="route('testimony')" :text="trans('index.testimony')" />
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
            <li class="{{ Route::is('career') ? 'current' : null }}">
                <x-components::link :href="route('career')" :text="trans('index.career')" />
            </li>
            <li class="{{ Route::is('article.*') ? 'current' : null }}">
                <x-components::link :href="route('article.index')" :text="trans('index.article')" />
            </li>
            <li class="{{ Route::is('contact') ? 'current' : null }}">
                <x-components::link :href="route('contact')" :text="trans('index.contact')" />
            </li>
            <li class="{{ Route::is('enquire') ? 'current' : null }}">
                <x-components::link :href="route('enquire')" :text="trans('index.enquire')" />
            </li>
        </ul>
    </div>
</div>
