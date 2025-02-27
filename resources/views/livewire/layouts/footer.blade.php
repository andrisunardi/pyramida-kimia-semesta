<div>
    <div class="footer-widget section-pad">
        <div class="container">
            <div class="row">
                <div class="widget-row row">

                    <div class="footer-col col-md-5 col-sm-6 res-m-bttm">
                        <div class="wgs wgs-footer wgs-menu">
                            <h5 class="wgs-title">{{ trans('index.our_latest_product') }}</h5>
                            <div class="wgs-content">
                                <ul class="menu col-md-6 npl">
                                    @foreach ($products->take(12) as $key => $product)
                                        <li>
                                            <a draggable="false" href="" wire:navigate>
                                                {{ $product->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                <ul class="menu col-md-6">
                                    @foreach ($products->skip(12) as $key => $product)
                                        <li>
                                            <a draggable="false" href="" wire:navigate>
                                                {{ $product->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="footer-col col-md-2 col-sm-6 res-m-bttm">
                        <div class="wgs wgs-footer wgs-menu">
                            <h5 class="wgs-title">{{ trans('index.quick_links') }}</h5>
                            <div class="wgs-content">
                                <ul class="menu">
                                    <li>
                                        <a draggable="false" href="{{ route('index') }}" wire:navigate>
                                            {{ trans('index.home') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a draggable="false" href="{{ route('contact') }}" wire:navigate>
                                            {{ trans('index.contact') }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="footer-col col-md-2 col-sm-6 res-m-bttm">
                        <div class="wgs wgs-footer wgs-text">
                            <h5 class="wgs-title">{{ trans('index.category') }}</h5>
                            <div class="wgs-content">
                                <ul>
                                    @foreach ($productCategories as $key => $productCategory)
                                        <li wire:key="{{ $key }}">
                                            <a draggable="false" href="" wire:navigate>
                                                {{ $productCategory->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="footer-col col-md-3 col-sm-6">
                        <div class="wgs wgs-footer">
                            <h5 class="wgs-title">{{ trans('index.contact_us') }}</h5>
                            <div class="wgs-content">
                                <p>
                                    <strong>{{ env('APP_NAME') }}</strong><br>
                                    {{ env('CONTACT_ADDRESS') }}
                                </p>
                                <p>
                                    <span>{{ trans('index.phone') }}</span> :
                                    <a draggable="false" href="tel:+{{ Utils::phone(env('CONTACT_PHONE')) }}">
                                        {{ env('CONTACT_PHONE') }}
                                    </a>
                                    <br>
                                    <span>{{ trans('index.email') }}</span> :
                                    <a draggable="false" href="mailto:{{ env('CONTACT_EMAIL') }}">
                                        {{ env('CONTACT_EMAIL') }}
                                    </a>
                                </p>
                                <ul class="social">
                                    <li>
                                        <a draggable="false" href="{{ env('FACEBOOK_URL') }}" target="_blank">
                                            <em class="fa fa-facebook" aria-hidden="true"></em>
                                        </a>
                                    </li>
                                    <li>
                                        <a draggable="false" href="{{ env('TWITTER_URL') }}" target="_blank">
                                            <em class="fab fa-twitter" aria-hidden="true"></em>
                                        </a>
                                    </li>
                                    <li>
                                        <a draggable="false" href="{{ env('INSTAGRAM_URL') }}" target="_blank">
                                            <em class="fa fa-instagram" aria-hidden="true"></em>
                                        </a>
                                    </li>
                                    <li>
                                        <a draggable="false" href="{{ env('TIKTOK_URL') }}" target="_blank">
                                            <em class="fa fa-tiktok" aria-hidden="true"></em>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="site-copy col-sm-7">
                    <p>
                        &copy; {{ trans('index.copyright') }}
                        @if (env('APP_YEAR') && env('APP_YEAR') != now()->year)
                            {{ env('APP_YEAR') . ' - ' }}
                        @endif
                        {{ now()->year }} &reg;

                        <a draggable="false" href="{{ route('index') }}" target="_blank">
                            <strong>{{ env('APP_NAME') }}</strong>&#8480;
                        </a>
                        {{ trans('index.all_rights_reserved') }}.
                    </p>
                </div>

                <div class="site-by col-sm-5 al-right">
                    <p>
                        {{ trans('index.created_and_designed_by') }}
                        <a draggable="false" href="https://www.diw.co.id" target="_blank">
                            <img draggable="false" src="{{ asset('images/icon-diw.co.id.png') }}" alt="Icon DIW.co.id"
                                title="{{ trans('index.created_and_designed_by') }} DIW.co.id">
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
