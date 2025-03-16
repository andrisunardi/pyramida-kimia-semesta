@section('title', $product->translate_name)
@section('icon', 'fas fa-flask')

<main>
    @livewire('banner', [
        'title' => $product->translate_name,
        'image' => asset('images/banner/product.png'),
    ])

    <div class="section section-contents section-products single-product section-pad">
        <div class="container">
            <div class="content row">

                <div class="products-details row">
                    <div class="col-md-8 res-m-bttm">
                        <h1>{{ $product->translate_name }}</h1>
                        <p><strong>{!! $product->category->translate_name !!}</strong></p>
                        <p>{!! $product->translate_description !!}</p>

                        <p class="gaps size-xs"></p>

                        <p>
                            <x-components::image :src="$product->assetImage()" :alt="$product->altImage()" />
                        </p>

                        <div class="feature-imagebox border download-action">
                            <div class="block">
                                <h3>Download PDF Datasheet</h3>
                                {{-- <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p> --}}
                                <a href="#" target="_blank" class="btn">
                                    {{ trans('index.download') }} COA
                                    <i class="fa fa-file-pdf-o"></i>
                                </a>

                                <a href="#" target="_blank" class="btn">
                                    {{ trans('index.download') }} MSDS
                                    <i class="fa fa-file-pdf-o"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="col-md-4">
                        <div class="sidebar-right">

                            <div class="wgs-box wgs-menus">
                                <div class="wgs-content">
                                    <ul class="list list-grouped">
                                        <li class="list-heading">
                                            <span>Hydraulic Power</span>
                                            <ul>
                                                <li><a href="product-single.html">Hydraulic Component</a></li>
                                                <li><a href="product-single.html">Pumps and Valves</a></li>
                                            </ul>
                                        </li>
                                        <li class="list-heading">
                                            <span>Cutting Tools</span>
                                            <ul>
                                                <li><a href="product-single.html">Drilling and Threading</a></li>
                                                <li><a href="product-single.html">Turning and Milling</a></li>
                                                <li><a href="product-single.html">Medial Equipments</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="wgs-box boxed">
                                <h3 class="wgs-heading">Featured Products</h3>
                                <div class="wgs-content">
                                    <p><img src="image/product-sm-c.jpg" alt=""></p>
                                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris</p>
                                    <p><a href="product-single.html" class="btn btn-full">More About Product </a></p>
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
                                        <input type="text" class="hidden" name="form-anti-honeypot" value="">
                                        <button type="submit" class="btn btn-alt sb-h">Submit</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</main>
