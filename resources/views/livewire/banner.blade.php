<div class="banner banner-static">
    <div class="container">
        <div class="content row has-bg-image">
            <div class="banner-text">
                @if (!Route::is('article.*') && !Route::is('contact'))
                    <h1 class="page-title"
                        @if (Route::is('career') || Route::is('faq')) style="color: #fff; -webkit-text-stroke: 1px #000;" @endif>
                        {{ $title }}</h1>
                @endif
            </div>
            <div class="imagebg bg-image-loaded" style="background-image: url({{ $image }})">
                <x-components::image :src="$image" :alt="$title . ' - ' . env('APP_TITLE')" />
            </div>
        </div>
    </div>
</div>
