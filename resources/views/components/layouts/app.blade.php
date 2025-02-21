<!DOCTYPE html PUBLIC "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="{{ env('APP_LANGUAGE') }}" itemscope itemtype="http://schema.org/WebPage" xmlns="http://www.w3.org/1999/xhtml"
    xml:lang="{{ env('APP_LANGUAGE') }}" data-bs-theme="auto">

<head>
    <x-layouts.meta />

    @stack('meta')

    <title>
        @if (!Route::is('index'))
            @yield('title') |
        @endif
        {{ config('app.title') }}
    </title>

    @include('layouts.vendors')

    @stack('css')

    @include('layouts.css')
</head>

<body>
    @include('layouts.body')

    @include('layouts.script')

    @stack('script')
</body>

</html>
