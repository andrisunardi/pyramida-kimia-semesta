<div class="section section-pad">
    <div class="container">
        <div id="event" class="banner banner-slider carousel slide carousel-fade banner-large">
            <div class="carousel-inner">
                @foreach ($events as $key => $event)
                    <div class="item {{ $loop->first ? 'active' : null }}" wire:key="{{ $key }}">
                        <div class="fill">
                            @if ($event->checkVideo())
                                <video src="{{ $event->assetVideo() }}" class="w-100" controls autoplay
                                    style="max-width: 100%"></video>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <a draggable="false" class="left carousel-control" href="#event" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">{{ trans('index.previous') }}</span>
            </a>
            <a draggable="false" class="right carousel-control" href="#event" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">{{ trans('index.next') }}</span>
            </a>
        </div>
    </div>
</div>
