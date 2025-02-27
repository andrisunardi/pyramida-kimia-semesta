@livewire('layouts.header')

<main>
    @if (!Route::is('index'))
        <x-layouts.breadcrumbs />
    @endif

    @if (!trim($__env->yieldContent('code')))
        {{ $slot }}
    @else
        @livewire('layouts.error')
    @endif

</main>

@livewire('layouts.footer')
