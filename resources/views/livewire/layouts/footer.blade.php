<div>
    <div class="footer-widget section-pad">
        <div class="container">
            <div class="row">
                <div class="widget-row row">

                    <div class="footer-col col-md-5 col-sm-6 res-m-bttm">
                        <div class="wgs wgs-footer wgs-menu">
                            <h5 class="wgs-title">Solutions</h5>
                            <div class="wgs-content">
                                <ul class="menu col-md-6 npl">
                                    <li><a href="#">Mechanical Engineering</a></li>
                                    <li><a href="#">Civil Engineering</a></li>
                                    <li><a href="#">Chemical Research</a></li>
                                    <li><a href="#">Material Science</a></li>
                                    <li><a href="#">Power and Energy</a></li>
                                    <li><a href="#">Oil and Gas</a></li>
                                </ul>
                                <ul class="menu col-md-6">
                                    <li><a href="#">Maintainance Services</a></li>
                                    <li><a href="#">Product Development</a></li>
                                    <li><a href="#">Machinery &amp; Utilities</a></li>
                                    <li><a href="#">Research &amp; Development</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="footer-col col-md-2 col-sm-6 res-m-bttm">
                        <div class="wgs wgs-footer wgs-menu">
                            <h5 class="wgs-title">Quick Links</h5>
                            <div class="wgs-content">
                                <ul class="menu">
                                    <li><a href="index-2.html">Home</a></li>
                                    <li><a href="about-us.html">About Us</a></li>
                                    <li><a href="news.html">News</a></li>
                                    <li><a href="resources.html">Resources</a></li>
                                    <li><a href="responsibility.html">Responsibility</a></li>
                                    <li><a href="contact.html">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="footer-col col-md-2 col-sm-6 res-m-bttm">
                        <div class="wgs wgs-footer wgs-text">
                            <h5 class="wgs-title">Areas Serve</h5>
                            <div class="wgs-content">
                                <ul>
                                    <li>USA</li>
                                    <li>UK</li>
                                    <li>Kuwit</li>
                                    <li>Japan</li>
                                    <li>South Africa</li>
                                    <li>Canada</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="footer-col col-md-3 col-sm-6">
                        <div class="wgs wgs-footer">
                            <h5 class="wgs-title">Contact us</h5>
                            <div class="wgs-content">
                                <p>
                                    <strong>{{ env('APP_NAME') }}</strong><br>
                                    {{ env('CONTACT_ADDRESS') }}
                                </p>
                                <p>
                                    <span>Phone</span>: {{ env('CONTACT_PHONE') }}<br>
                                    <span>Email</span>: {{ env('CONTACT_EMAIL') }}
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
