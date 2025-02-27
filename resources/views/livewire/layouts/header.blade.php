<header class="site-header header-s1 is-sticky">

    @livewire('layouts.topbar')

    <div class="navbar navbar-primary">
        <div class="container">
            <a class="navbar-brand" href="index.html">
                <img class="logo logo-dark" alt="" src="{{ asset('images/logo/logo.png') }}"
                    srcset="image/logo2x.png 2x">
                <img class="logo logo-light" alt="" src="{{ asset('images/logo/logo.png') }}"
                    srcset="image/logo-light2x.png 2x">
            </a>

            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mainnav"
                    aria-expanded="false">
                    <span class="sr-only">Menu</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="quote-btn"><a class="btn" href="get-a-quote.html">Enquire Today</a></div>
            </div>

            <nav class="navbar-collapse collapse" id="mainnav">
                <ul class="nav navbar-nav">
                    <li class="dropdown megamenu megamenu-short"><a href="index.html">Home</a>
                        <ul class="dropdown-menu dropdown-megamenu">
                            <li class="dropdown megamenu-container">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <ul>
                                            <li><a href="index-2.html">Home - Default</a></li>
                                            <li><a href="index-energy.html">Home - Energy &amp; Power</a></li>
                                            <li><a href="index-oil.html">Home - Oil &amp; Gas</a></li>
                                            <li><a href="index-mining.html">Home - Mining</a></li>
                                            <li><a href="index-welding.html">Home - Welding</a></li>
                                            <li><a href="index-civil.html">Home - Civil</a></li>
                                            <li><a href="index-static.html">Home - Static Image</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-6">
                                        <ul>
                                            <li class="megamenu-header">New Home Pages <span
                                                    class="label label-danger">Hot</span></li>
                                            <li><a href="index-simple.html">Home - Simple</a></li>
                                            <li><a href="index-fullscreen.html">Home - Fullscreen</a></li>
                                            <li><a href="index-construction.html">Home - Construction</a></li>
                                            <li><a href="index-bitcoin.html">Home - Bitcoin Mining</a></li>
                                            <li><a href="index-onepage-industry.html">One Page - Industry</a></li>
                                            <li><a href="index-onepage-bitcoin.html">One Page - Bitcoin Mining</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#">Pages</a>
                        <ul class="dropdown-menu">
                            <li class="dropdown"><a href="#">About Pages</a>
                                <ul class="dropdown-menu">
                                    <li><a href="about-us.html">About Us</a></li>
                                    <li><a href="about-us-alter.html">About - Alter</a></li>
                                    <li><a href="teams.html">Teams</a></li>
                                    <li><a href="teams-alter.html">Teams- Alter</a></li>
                                    <li><a href="history.html">History</a></li>
                                    <li><a href="clients.html">Clients</a></li>
                                    <li><a href="testimonial.html">Testimonial</a></li>
                                    <li><a href="testimonial-alter.html">Testimonial - Alter <span
                                                class="label label-danger">New</span></a></li>
                                    <li><a href="careers.html">Career / Jobs <span
                                                class="label label-danger">New</span></a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Service/Solution Pages</a>
                                <ul class="dropdown-menu">
                                    <li><a href="solutions.html">Solutions List</a></li>
                                    <li><a href="solutions-alter.html">Solutions List - Alter</a></li>
                                    <li><a href="solutions-extend.html">Solutions List - Extend</a></li>
                                    <li><a href="solution-single.html">Solution Single</a></li>
                                    <li><a href="solution-single-alter.html">Solution Single - Alter</a></li>
                                    <li><a href="solution-single-extend.html">Solution Single - Extend</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Project Pages</a>
                                <ul class="dropdown-menu">
                                    <li><a href="projects.html">Projects List</a></li>
                                    <li><a href="projects-alter.html">Projects List - Alter</a></li>
                                    <li><a href="projects-extend.html">Projects List - Extend <span
                                                class="label label-danger">New</span></a></li>
                                    <li><a href="project-single.html">Project Details</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Product Pages</a>
                                <ul class="dropdown-menu">
                                    <li><a href="products.html">Products List</a></li>
                                    <li><a href="products-alter.html">Products List - Alter</a></li>
                                    <li><a href="product-single.html">Product Details</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Case Studies Pages <span
                                        class="label label-danger">New</span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="case-study-lists.html">Case Study - Lists</a></li>
                                    <li><a href="case-study-detials.html">Case Study - Details</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Pricing Pages <span
                                        class="label label-danger">New</span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="pricing.html">Pricing - Classic</a></li>
                                    <li><a href="pricing-alter.html">Pricing - Alter</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Bitcoing Pages <span
                                        class="label label-warning">New</span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="bitcoin.html">Bitcoin - What/Why</a></li>
                                    <li><a href="bitcoin-datacenter.html">Bitcoin - Datacenter</a></li>
                                    <li><a href="bitcoin-signup.html">Bitcoin - Signup</a></li>
                                    <li><a href="bitcoin-pricing.html">Bitcoin - Pricing</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Miscellaneous Pages</a>
                                <ul class="dropdown-menu">
                                    <li><a href="carousel.html">Carousel Slide <span
                                                class="label label-danger">New</span></a></li>
                                    <li><a href="resources.html">Resources</a></li>
                                    <li><a href="responsibility.html">Responsibility</a></li>
                                    <li><a href="investors.html">Investors</a></li>
                                    <li><a href="faqs.html">FAQ's</a></li>
                                    <li><a href="error-404.html">Error 404</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">Contact Pages</a>
                                <ul class="dropdown-menu">
                                    <li><a href="contact.html">Contact Us</a></li>
                                    <li><a href="contact-extend.html">Contact Us - Extend <span
                                                class="label label-danger">New</span></a></li>
                                    <li><a href="get-a-quote.html">Get a Quote</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#">News/Blog Pages</a>
                                <ul class="dropdown-menu">
                                    <li><a href="news.html">News/Blog List</a></li>
                                    <li><a href="news-details.html">News Details/Single Post</a></li>
                                </ul>
                            </li>
                            <li><a href="megamenu.html">Megamenu Example <span
                                        class="label label-danger">New</span></a></li>
                            <li><a href="gallery.html">Gallery Page</a></li>
                            <li><a href="typography.html">Typography</a></li>
                        </ul>
                    </li>
                    <li><a href="about-us.html">About</a></li>
                    <li class="dropdown">
                        <a href="solutions.html">Solutions</a>
                        <ul class="dropdown-menu">
                            <li><a href="solution-single.html">Agricultural Engineering</a></li>
                            <li><a href="solution-single-alter.html">Chemical Research Engineering</a></li>
                            <li><a href="solution-single-extend.html">Material Science and Engineering</a></li>
                            <li><a href="solution-single.html">Mechanical Engineering</a></li>
                            <li><a href="solution-single-alter.html">Oil and Gas</a></li>
                            <li><a href="solution-single-extend.html">Power and Energy</a></li>
                        </ul>
                    </li>
                    <li><a href="products.html">Products</a></li>
                    <li><a href="projects.html">Projects</a></li>
                    <li><a href="resources.html">Resources</a></li>
                    <li class="quote-btn"><a class="btn" href="get-a-quote.html">Enquire Today</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>
