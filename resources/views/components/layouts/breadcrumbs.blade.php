@if (Route::is('cms.*'))
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4 py-2">
            {{ Breadcrumbs::render() }}
        </ol>
    </nav>
@else
    <section class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>@yield('title')</h2>
                <ol>
                    {{ Breadcrumbs::render() }}
                </ol>
            </div>
        </div>
    </section>
@endif
