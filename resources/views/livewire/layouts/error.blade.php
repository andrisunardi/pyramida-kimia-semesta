<main>
    <div class="section section-contents error-page">
        <div class="container">
            <div class="row">
                <div class="404-content col-md-6 col-md-offset-3">
                    <h1>@yield('code')</h1>
                    <h2>@yield('message')</h2>
                    <p>@yield('description')</p>
                    <p>
                        <a draggable="false" href="{{ route('index') }}">
                            <em class="fa fa-angle-left"></em>
                            {{ trans('index.back_to_home') }}
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</main>
