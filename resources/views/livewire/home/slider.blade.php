<div id="slider" class="banner banner-slider carousel slide carousel-fade banner-large">
    <div class="carousel-inner">

        @foreach ($sliders as $key => $slider)
            <div class="item {{ $loop->first ? 'active' : null }}" wire:key="{{ $key }}">
                <div class="fill" style="background-image:url({{ $slider->assetImage() }});">
                    <div class="banner-content">
                        <div class="container">
                            <div class="row">
                                <div class="banner-text al-left pos-left light dark-delete">
                                    <div class="animated fadeInRight">
                                        <h2 class="ucap outline">{{ $slider->translate_name }}</h2>
                                        <p class="outline">{{ $slider->translate_description }}</p>
                                        <div class="banner-cta">
                                            <x-components::link :class="'btn'" :href="route('about')" :text="trans('index.learn_more')" />

                                            <x-components::link :class="'btn btn-alt btn-outline'" :href="route('contact')" :text="trans('index.contact_us')" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <a draggable="false" class="left carousel-control" href="#slider" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a draggable="false" class="right carousel-control" href="#slider" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
