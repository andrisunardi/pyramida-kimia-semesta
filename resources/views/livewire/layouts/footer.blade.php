<div>
    <div class="call-action bg-primary">
        <div class="cta-block">
            <div class="container">
                <div class="content row">
                    <div class="cta-sameline">
                        @if (App::isLocale('en'))
                            <h3>Looking for a Reliable Chemical Distribution Solution for Your Business ?</h3>
                            <p>Contact us today for free consultation or more information.</p>
                        @endif

                        @if (App::isLocale('id'))
                            <h3>Mencari Solusi Distribusi Bahan Kimia yang Andal untuk Bisnis Anda?</h3>
                            <p>Hubungi kami hari ini untuk konsultasi gratis atau informasi lebih lanjut.</p>
                        @endif

                        @if (App::isLocale('zh'))
                            <h3>正在为您的企业寻找可靠的化学品分销解决方案吗？</h3>
                            <p>立即联系我们，获得免费咨询或更多信息。</p>
                        @endif

                        <x-components::link :class="'btn btn-outline'" :href="route('contact')" :text="trans('index.get_in_touch')" />
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                                        <li wire:key="{{ $key }}">
                                            <x-components::link :href="route('product.view', [
                                                'slug' => $product->slug,
                                            ])" :text="$product->translate_name" />
                                        </li>
                                    @endforeach
                                </ul>
                                <ul class="menu col-md-6">
                                    @foreach ($products->skip(12) as $key => $product)
                                        <li wire:key="{{ $key }}">
                                            <x-components::link :href="route('product.view', [
                                                'slug' => $product->slug,
                                            ])" :text="$product->translate_name" />
                                        </li>
                                    @endforeach
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
                                            <x-components::link :href="route('product.category', [
                                                'slug' => $productCategory->slug,
                                            ])" :text="$productCategory->translate_name" />
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
                                        <x-components::link :href="route('index')" :text="trans('index.home')" />
                                    </li>
                                    <li>
                                        <x-components::link :href="route('about')" :text="trans('index.about')" />
                                    </li>
                                    <li>
                                        <x-components::link :href="route('product.index')" :text="trans('index.product')" />
                                    </li>
                                    <li>
                                        <x-components::link :href="route('gallery')" :text="trans('index.gallery')" />
                                    </li>
                                    <li>
                                        <x-components::link :href="route('faq')" :text="trans('index.faq')" />
                                    </li>
                                    <li>
                                        <x-components::link :href="route('contact')" :text="trans('index.contact')" />
                                    </li>
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
                                    <x-components::link.external-link :href="env('CONTACT_MAPS')" :text="env('CONTACT_ADDRESS')"
                                        :icon="''" />
                                </p>
                                <p>
                                    <span>{{ trans('index.phone') }}</span> :
                                    <x-components::link.phone :value="env('CONTACT_PHONE')" :icon="''" />
                                    <br>
                                    <span>{{ trans('index.email') }}</span> :
                                    <x-components::link.email :value="env('CONTACT_EMAIL')" :icon="''" />
                                </p>
                                <ul class="social">
                                    <li>
                                        <x-components::link.external-link :href="env('FACEBOOK_URL')" :icon="'fa fa-facebook'" />
                                    </li>
                                    <li>
                                        <x-components::link.external-link :href="env('TWITTER_URL')" :icon="'fa fa-twitter'" />
                                    </li>
                                    <li>
                                        <x-components::link.external-link :href="env('INSTAGRAM_URL')" :icon="'fa fa-instagram'" />
                                    </li>
                                    <li>
                                        <x-components::link.external-link :href="env('TIKTOK_URL')" :icon="'fa fa-tiktok'" />
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
