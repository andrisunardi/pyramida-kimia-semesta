<div class="banner banner-static">
    <div class="container">
        <div class="content row has-bg-image">
            <div class="banner-text">
                <h1 class="page-title">{{ $title }}</h1>
            </div>
            <div class="imagebg bg-image-loaded" style="background-image: url({{ $image }})">
                <x-components::image :src="$image" :alt="$title . ' - ' . env('APP_TITLE')" />
            </div>
        </div>
    </div>
</div>
