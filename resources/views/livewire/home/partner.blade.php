<div class="section section-logos section-pad-md bdr-top bg-light">
    <div class="container">
        <div class="content row">
            <h3 class="heading-section center">{{ trans('index.our_partner') }}</h3>

            <div class="gaps size-sm"></div>

            <div class="owl-carousel loop logo-carousel">
                @foreach ($partners as $key => $partner)
                    <div class="logo-item" wire:key="{{ $key }}">
                        <x-components::image :src="$partner->assetImage()" :alt="$partner->altImage()" />
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
