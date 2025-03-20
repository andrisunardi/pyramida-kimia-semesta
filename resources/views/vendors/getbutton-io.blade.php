@push('css')
@endpush

@push('script')
    <script type="text/javascript">
        (function () {
            var options = {
                whatsapp: "{{ env("CONTACT_WHATSAPP") }}",
                facebook: "{{ env("FACEBOOK_PAGE") }}",
                instagram: "{{ env("INSTAGRAM_USERNAME") }}",
                email: "{{ env("CONTACT_EMAIL") }}",
                call: "{{ Utils::phone(env("CONTACT_PHONE")) }}",
                sms: "{{ Utils::phone(env("CONTACT_PHONE")) }}",
                link: "{{ env("APP_URL") }}",
                greeting_message: "{{ trans("index.welcome_to") }} {{ env("APP_TITLE") }}",
                disable_branding: "yes",
                company_logo_url: "{{ env("APP_URL") }}/images/favicon.png",
                call_to_action: "{{ trans("index.contact_us_if_you_have_any_questions") }}",
                button_color: "#{{ env("APP_COLOR") }}",
                position: "left",
                order: "whatsapp,instagram"
            };
            var proto = document.location.protocol, host = "getbutton.io", url = proto + "//static." + host;
            var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
            s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
            var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
        })();
    </script>
@endpush
