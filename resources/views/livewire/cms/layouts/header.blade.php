<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top border-bottom">
        <div class="container-fluid">
            <div class="me-0 me-lg-2">
                <button type="button" data-bs-target="#sidebar" data-bs-toggle="collapse" class="btn btn-lg">
                    <x-components::icon :value="'fas fa-list'" />
                </button>
            </div>

            <a draggable="false" class="navbar-brand" href="{{ route('cms.index') }}" wire:navigate>
                <img draggable="false" class="d-inline-block align-text-top" height="30"
                    src="{{ asset('images/favicon.png') }}" alt="{{ trans('index.logo') }} - {{ env('APP_TITLE') }}">
                <span class="d-none d-sm-inline">{{ env('APP_NAME') }}</span>
                <span class="d-inline d-sm-none">Pyramida</span>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu"
                aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                    @livewire('c-m-s.layouts.server-time')

                    @livewire('c-m-s.layouts.theme')

                    @livewire('c-m-s.layouts.language')

                </ul>
            </div>
        </div>
    </nav>
</header>
