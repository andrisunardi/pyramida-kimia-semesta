<main>
    <div class="section section-contents error-page"
        style="background: url({{ asset('images/bg-404.jpg') }}) no-repeat 50% 0;">
        <div class="container">
            <div class="row">
                <div class="404-content col-md-6 col-md-offset-3">
                    <h1>@yield('code')</h1>
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
