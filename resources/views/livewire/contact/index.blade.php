@section('title', trans('index.contact'))
@section('icon', 'fas fa-phone')

<main>
    <div class="section section-contents section-contact section-pad">
        <div class="container">
            <div class="content row">

                <h1>Contact Us</h1>
                <div class="contact-content row">
                    <div class="drop-message col-md-7 res-m-bttm">
                        <p>Want to work with us or need more details about consectetur adipiscing elit, sed do eiusmod
                            tempor incididunt ut labore et dolor.</p>
                        <form id="contact-us" class="form-message"
                            action="https://demo.themenio.com/industrial/form/contact.php" method="post">
                            <div class="form-results"></div>
                            <div class="form-group row">
                                <div class="form-field col-md-6 form-m-bttm">
                                    <input name="contact-name" type="text" placeholder="Name *"
                                        class="form-control required">
                                </div>
                                <div class="form-field col-md-6">
                                    <input name="contact-email" type="email" placeholder="Email *"
                                        class="form-control required email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="form-field col-md-6 form-m-bttm">
                                    <input name="contact-phone" type="text" placeholder="Phone" class="form-control">
                                </div>
                                <div class="form-field col-md-6">
                                    <input name="contact-service" type="text" placeholder="Interest of Service"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="form-field col-md-12">
                                    <textarea name="contact-message" placeholder="Messages *" class="txtarea form-control required"></textarea>
                                </div>
                            </div>
                            <input type="text" class="hidden" name="form-anti-honeypot" value="">
                            <div class="g-recaptcha" data-sitekey="6LdNwz0UAAAAAED8ZFtVoXnFKRniFMBh14NReqaZ"></div>
                            <div class="gaps"></div>
                            <button type="submit" class="btn solid-btn sb-h">Submit</button>
                        </form>
                    </div>
                    <div class="contact-details col-md-4 col-md-offset-1">
                        <ul class="contact-list">
                            <li><em class="fa fa-map" aria-hidden="true"></em>
                                <span>1234 Sed ut perspiciatis Road, <br>At vero eos, D58 8975, London.</span>
                            </li>
                            <li><em class="fa fa-phone" aria-hidden="true"></em>
                                <span>Toll Free : (123) 4567 8910<br>
                                    Telephone : (123) 1234 5678</span>
                            </li>
                            <li><em class="fa fa-envelope" aria-hidden="true"></em>
                                <span>Email : <a href="#">info@sitename.com</a></span>
                            </li>
                            <li>
                                <em class="fa fa-clock-o" aria-hidden="true"></em><span>Sat - Thu: 8AM - 7PM </span>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="map-holder map-contact">
        <div id="gmap"></div>
    </div>
</main>
