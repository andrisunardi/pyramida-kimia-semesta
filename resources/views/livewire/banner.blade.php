<div class="banner banner-static">
    <div class="container">
        <div class="content row has-bg-image">
            <div class="banner-text">
                <h1 class="page-title">{{ trans("index.{$page}") }}</h1>
            </div>
            <div class="imagebg bg-image-loaded" style="background-image: url({{ asset("images/banner/{$page}.png") }})">
                <x-components::image :src="asset("images/banner/{$page}.png")" :alt="trans("index.{$page}")
                    . ' - ' . env('APP_TITLE')" />
            </div>
        </div>
    </div>
</div>
