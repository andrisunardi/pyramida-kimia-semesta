<header class="site-header header-s1 is-sticky">

    @livewire('layouts.topbar')

    <div class="navbar navbar-primary">
        <div class="container">
            <a draggable="false" class="navbar-brand" href="{{ route('index') }}" wire:navigate>
                <img draggable="false" class="logo logo-dark" alt="" src="{{ asset('images/logo/logo.png') }}"
                    srcset="{{ asset('images/logo/logo.png') }} 2x">
                <img draggable="false" class="logo logo-light" alt="" src="{{ asset('images/logo/logo.png') }}"
                    srcset="{{ asset('images/logo/logo.png') }} 2x">
            </a>

            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mainnav"
                    aria-expanded="false">
                    <span class="sr-only">{{ trans('index.menu') }}</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="quote-btn">
                    <a draggable="false" class="btn" href="{{ route('enquire') }}" wire:navigate>
                        {{ trans('index.enquire') }}
                    </a>
                </div>
            </div>

            <nav class="navbar-collapse collapse" id="mainnav">
                <ul class="nav navbar-nav">
                    <li>
                        <x-components::link :href="route('index')" :text="trans('index.home')" :icon="'fas fa-home'" />
                    </li>
                    <li class="dropdown">
                        <x-components::link :href="route('about')" :text="trans('index.about')" :icon="'fas fa-building'" />
                        <ul class="dropdown-menu">
                            <li>
                                <x-components::link :href="route('history')" :text="trans('index.history')" :icon="'fas fa-scroll'" />
                            </li>
                            <li>
                                <x-components::link :href="route('resource')" :text="trans('index.resource')" :icon="'fas fa-book'" />
                            </li>
                            <li>
                                <x-components::link :href="route('team.index')" :text="trans('index.team')" :icon="'fas fa-user-circle'" />
                            </li>
                            <li>
                                <x-components::link :href="route('partner')" :text="trans('index.partner')" :icon="'fas fa-users'" />
                            </li>
                            <li>
                                <x-components::link :href="route('testimony')" :text="trans('index.testimony')" :icon="'fas fa-comments'" />
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <x-components::link :href="route('product.index')" :text="trans('index.product')" :icon="'fas fa-flask'" />
                        <ul class="dropdown-menu">
                            @foreach ($productCategories as $key => $productCategory)
                                <li class="dropdown" wire:key="{{ $key }}">
                                    <x-components::link :href="route('product.category', [
                                        'slug' => $productCategory->slug,
                                    ])" :text="$productCategory->translate_name" />

                                    <ul class="dropdown-menu" style="width:400px">
                                        @foreach ($productCategory->products as $key => $product)
                                            <li wire:key="{{ $key }}">
                                                <x-components::link :href="route('product.view', [
                                                    'slug' => $product->slug,
                                                ])" :text="$product->translate_name" />
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li>
                        <x-components::link :href="route('gallery')" :text="trans('index.gallery')" :icon="'fas fa-images'" />
                    </li>
                    <li>
                        <x-components::link :href="route('faq')" :text="trans('index.faq')" :icon="'fas fa-question'" />
                    </li>
                    <li>
                        <x-components::link :href="route('career')" :text="trans('index.career')" :icon="'fas fa-briefcase'" />
                    </li>
                    <li>
                        <x-components::link :href="route('article.index')" :text="trans('index.article')" :icon="'fas fa-newspaper'" />
                    </li>
                    <li>
                        <x-components::link :href="route('contact')" :text="trans('index.contact')" :icon="'fas fa-phone'" />
                    </li>
                    <li class="quote-btn">
                        <x-components::link :class="'btn'" :href="route('enquire')" :text="trans('index.enquire')" />
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
