<aside id="sidebar"
    class="collapse collapse-horizontal {{ !$isMobile ? "show" : null }} col-sm-4 col-md-4 col-lg-3 col-xl-2 vh-100 p-0 m-0 overflow-auto">
    <ul class="list-group mt-5 pt-3">
        <li>
            @livewire('c-m-s.layouts.search-menu')
        </li>

        <li>
            <a draggable="false" wire:navigate
                class="list-group-item list-group-item-action d-flex justify-content-between align-items-center {{ Route::is('cms.index') ? 'active' : null }}"
                href="{{ route('cms.index') }}">
                <span>
                    <span class="fas fa-home fa-fw me-1"></span>
                    <span>{{ trans('index.home') }}</span>
                </span>
            </a>
        </li>
    </ul>
</aside>
