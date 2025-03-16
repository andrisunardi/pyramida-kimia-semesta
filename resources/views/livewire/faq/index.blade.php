@section('title', trans('index.faq'))
@section('icon', 'fas fa-question')

<main>
    <div class="banner banner-static">
        <div class="container">
            <div class="content row has-bg-image">
                <div class="banner-text">
                    <h1 class="page-title">@yield('title')</h1>
                </div>
                <div class="imagebg bg-image-loaded">
                    <x-components::image :src="asset('images/banner/faq.png')" :alt="trans('index.faq') . ' - ' . env('APP_TITLE')" />
                </div>
            </div>
        </div>
    </div>

    <div class="section section-contents section-pad">
        <div class="container">
            <div class="content row">

                <div class="row">

                    <div class="col-md-8">
                        <h1>Frequently Asked Questions</h1>
                        <p>Get all the answers to the most frequently asked questions (FAQs) regarding industry,
                            research, development and much, much more.</p>
                        <div class="panel-group accordion faqs" id="general" role="tablist"
                            aria-multiselectable="true">
                            <!-- each panel of faq as accordion -->
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="ques-i1">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse"
                                            data-parent="#general" href="#ques-ans-i1" aria-expanded="false">
                                            How does it works?
                                            <span class="plus-minus"><span></span></span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="ques-ans-i1" class="panel-collapse collapse" role="tabpanel"
                                    aria-labelledby="ques-i1">
                                    <div class="panel-body">
                                        <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                            richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                            dolor brunch. Food truck quinoa nesciunt laborum eiusmod.</p>
                                        <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                            richardson ad squid. Moon officia aute, non cupidatat skateboard dolor
                                            brunch. Food truck quinoa nesciunt laborum eiusmod.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- each panel of faq as accordion -->
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="ques-i2">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse"
                                            data-parent="#general" href="#ques-ans-i2" aria-expanded="false">
                                            How long my product reach?
                                            <span class="plus-minus"><span></span></span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="ques-ans-i2" class="panel-collapse collapse" role="tabpanel"
                                    aria-labelledby="ques-i2">
                                    <div class="panel-body">
                                        <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                            richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                            dolor brunch. Food truck quinoa nesciunt laborum eiusmod.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- each panel of faq as accordion -->
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="ques-i3">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse"
                                            data-parent="#general" href="#ques-ans-i3" aria-expanded="false">
                                            Should I expect to pay fees?
                                            <span class="plus-minus"><span></span></span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="ques-ans-i3" class="panel-collapse collapse" role="tabpanel"
                                    aria-labelledby="ques-i3">
                                    <div class="panel-body">
                                        <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                            richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                            dolor brunch. Food truck quinoa nesciunt laborum eiusmod.</p>
                                        <p>Anim pariatur cliche reprehenderit accusamus terry richardson squid.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- each panel of faq as accordion -->
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="ques-i4">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse"
                                            data-parent="#general" href="#ques-ans-i4" aria-expanded="false">
                                            What are typical considerations?
                                            <span class="plus-minus"><span></span></span>
                                        </a>

                                    </h4>
                                </div>
                                <div id="ques-ans-i4" class="panel-collapse collapse" role="tabpanel"
                                    aria-labelledby="ques-i4">
                                    <div class="panel-body">
                                        <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                            richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                            dolor brunch. Food truck quinoa nesciunt laborum eiusmod.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- each panel of faq as accordion -->
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="ques-i5">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse"
                                            data-parent="#general" href="#ques-ans-i5" aria-expanded="false">
                                            What kinds of companies?
                                            <span class="plus-minus"><span></span></span>
                                        </a>
                                    </h4>
                                </div>
                                <div id="ques-ans-i5" class="panel-collapse collapse" role="tabpanel"
                                    aria-labelledby="ques-i5">
                                    <div class="panel-body">
                                        <p>Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry
                                            richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard
                                            dolor brunch. Food truck quinoa nesciunt laborum eiusmod.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- end each panel of faq -->
                        </div><!-- PanelGroup #end -->

                        <hr>

                        <h2>Few More thing you should know</h2>
                        <div class="faqs-row faqs-s2">
                            <!-- Faq ques/ans -->
                            <div class="faqs">
                                <h3 class="faq-heading">What kinds of companies?</h3>
                                <p>Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet
                                    orci. Aenean dignissim pellentesque felis. </p>
                            </div>
                            <!-- Faq ques/ans -->
                            <div class="faqs">
                                <h3 class="faq-heading">What are typical considerations?</h3>
                                <p>Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet
                                    orci. Aenean dignissim pellentesque felis. </p>
                            </div>
                            <!-- Faq ques/ans -->
                            <div class="faqs">
                                <h3 class="faq-heading">Should I expect to pay fees?</h3>
                                <p>Donec nec justo eget felis facilisis fermentum. Aliquam porttitor mauris sit amet
                                    orci. Aenean dignissim pellentesque felis. </p>
                            </div>
                            <!-- Faq ques/ans #end -->
                        </div>

                    </div>

                    <!-- Sidebar -->
                    <div class="col-md-4">
                        <div class="sidebar-right">

                            <div class="wgs-box wgs-menus">
                                <div class="wgs-content">
                                    <ul class="list list-grouped">
                                        <li class="list-heading">
                                            <span>About Our Firms</span>
                                            <ul>
                                                <li><a href="about-us.html">Overview</a></li>
                                                <li><a href="history.html">Our History</a></li>
                                                <li><a href="teams.html">Board Of Directors</a></li>
                                                <li><a href="teams-alter.html">Management Team</a></li>
                                                <li><a href="investors.html">Our Investors</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="clients.html">Our Clients</a></li>
                                        <li><a href="resources.html">Resources</a></li>
                                        <li><a href="responsibility.html">Responsibility</a></li>
                                        <li><a href="testimonial.html"><span>Testimonials</span></a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="wgs-box wgs-quoteform">
                                <h3 class="wgs-heading">Quick Contact</h3>
                                <div class="wgs-content">
                                    <p>If you have any questions or would like to book a session please contact us.</p>
                                    <form id="contact-us" class="form-quote"
                                        action="https://demo.themenio.com/industrial/form/contact.php" method="post">
                                        <div class="form-results"></div>
                                        <div class="form-group">
                                            <div class="form-field">
                                                <input name="contact-name" type="text" placeholder="Name *"
                                                    class="form-control required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-field">
                                                <input name="contact-email" type="email" placeholder="Email *"
                                                    class="form-control required email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-field form-m-bttm">
                                                <input name="contact-phone" type="text" placeholder="Phone"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-field">
                                                <input name="contact-service" type="text"
                                                    placeholder="Interest of Service" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-field">
                                                <textarea name="contact-message" placeholder="Messages *" class="txtarea form-control required"></textarea>
                                            </div>
                                        </div>
                                        <input type="text" class="hidden" name="form-anti-honeypot"
                                            value="">
                                        <button type="submit" class="btn btn-alt sb-h">Submit</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Sidebar #end -->
                </div>
            </div>
        </div>
    </div>
</main>
