<div class="wgs-box wgs-quoteform">
    <h3 class="wgs-heading">{{ trans('index.quick_contact') }}</h3>
    <div class="wgs-content">
        <p>
            @if (App::isLocale('en'))
                If you have any questions or would like to book a session please contact us.
            @endif

            @if (App::isLocale('id'))
                Jika Anda memiliki pertanyaan atau ingin memesan sesi, silakan hubungi kami.
            @endif

            @if (App::isLocale('zh'))
                如果您有任何疑问或想要预约，请联系我们。
            @endif
        </p>

        <form id="contact-us" class="form-quote" action="https://demo.themenio.com/industrial/form/contact.php"
            method="post">
            <div class="form-results"></div>
            <div class="form-group">
                <div class="form-field">
                    <input name="contact-name" type="text" placeholder="Name *" class="form-control required">
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
                    <input name="contact-phone" type="text" placeholder="Phone" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="form-field">
                    <input name="contact-service" type="text" placeholder="Interest of Service" class="form-control">
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
