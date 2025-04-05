@section('title', trans('index.contact'))
@section('icon', 'fas fa-phone')

<main>
    @livewire('banner')

    <div class="section section-contents section-contact section-pad">
        <div class="container">
            <div class="content row">
                <h1>{{ trans('index.contact_us') }}</h1>
                <div class="contact-content row">
                    <div class="drop-message col-md-7 res-m-bttm">
                        <p>
                            @if (App::isLocale('en'))
                                Feel free to reach out to us for any inquiries, support, or additional information. Our
                                team is always ready to assist you and provide the help you need. We look forward to
                                hearing from you!
                            @endif
                            @if (App::isLocale('id'))
                                Jangan ragu untuk menghubungi kami untuk pertanyaan, dukungan, atau informasi tambahan.
                                Tim kami selalu siap membantu Anda dan memberikan bantuan yang Anda butuhkan. Kami
                                menunggu kabar dari Anda!
                            @endif
                            @if (App::isLocale('zh'))
                                如有任何疑问、需要支持或需要更多信息，请随时联系我们。我们的团队随时准备为您提供帮助。我们期待您的来电！
                            @endif
                        </p>

                        <form id="contact-us" class="form-message" wire:submit.prevent="submit" role="form"
                            autocomplete="off">

                            <x-components::form.alert />

                            <div class="form-group row">
                                <div class="form-field col-md-6 form-m-bttm">
                                    <input wire:model="form.name" id="name" name="name" type="text"
                                        placeholder="{{ trans('index.your_name') }} *" class="form-control"
                                        maxlength="50" required>
                                </div>
                                <div class="form-field col-md-6">
                                    <input wire:model="form.company" id="company" name="company" type="text"
                                        placeholder="{{ trans('index.your_company') }} *" class="form-control"
                                        maxlength="50" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="form-field col-md-6 form-m-bttm">
                                    <input wire:model="form.email" id="email" name="email" type="email"
                                        placeholder="{{ trans('index.your_email') }} *" class="form-control"
                                        maxlength="50" required>
                                </div>
                                <div class="form-field col-md-6">
                                    <input wire:model="form.phone" id="phone" name="phone" type="text"
                                        placeholder="{{ trans('index.your_phone') }} *" class="form-control"
                                        maxlength="15" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="form-field col-md-12">
                                    <input wire:model="form.subject" id="subject" name="subject" type="text"
                                        placeholder="{{ trans('index.write_subject') }} *" class="form-control"
                                        maxlength="100" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="form-field col-md-12">
                                    <textarea wire:model="form.message" id="message" name="message" type="text"
                                        placeholder="{{ trans('index.write_message') }} *" class="txtarea form-control" maxlength="1000" required>
                                    </textarea>
                                </div>
                            </div>

                            <button type="submit" class="btn solid-btn sb-h" wire:click="submit">
                                {{ trans('index.submit') }}
                            </button>
                        </form>
                    </div>

                    <div class="contact-details col-md-4 col-md-offset-1">
                        <ul class="contact-list">
                            <li>
                                <em class="fa fa-map-marked-alt" aria-hidden="true"></em>
                                <span>
                                    <a draggable="false" href="{{ env('CONTACT_MAPS') }}" target="_blank">
                                        {{ env('CONTACT_ADDRESS') }}
                                    </a>
                                </span>
                            </li>
                            <li>
                                <em class="fa fa-phone" aria-hidden="true"></em>
                                <span>
                                    <a draggable="false" href="tel:+{{ Utils::phone(env('CONTACT_PHONE')) }}">
                                        {{ env('CONTACT_PHONE') }}
                                    </a>
                                </span>
                            </li>
                            <li>
                                <em class="fa fa-envelope" aria-hidden="true"></em>
                                <span>
                                    <a draggable="false" href="mailto:{{ env('CONTACT_EMAIL') }}">
                                        {{ env('CONTACT_EMAIL') }}
                                    </a>
                                </span>
                            </li>
                            <li>
                                <em class="fa fa-facebook" aria-hidden="true"></em>
                                <span>
                                    <a draggable="false" href="{{ env('FACEBOOK_URL') }}" target="_blank">
                                        {{ env('FACEBOOK_NAME') }}
                                    </a>
                                </span>
                            </li>
                            <li>
                                <em class="fa fa-twitter" aria-hidden="true"></em>
                                <span>
                                    <a draggable="false" href="{{ env('TWITTER_URL') }}" target="_blank">
                                        {{ env('TWITTER_USERNAME') }}
                                    </a>
                                </span>
                            </li>
                            <li>
                                <em class="fa fa-instagram" aria-hidden="true"></em>
                                <span>
                                    <a draggable="false" href="{{ env('INSTAGRAM_URL') }}" target="_blank">
                                        {{ env('INSTAGRAM_USERNAME') }}
                                    </a>
                                </span>
                            </li>
                            <li>
                                <em class="fa fa-tiktok" aria-hidden="true"></em>
                                <span>
                                    <a draggable="false" href="{{ env('TIKTOK_URL') }}" target="_blank">
                                        {{ env('TIKTOK_USERNAME') }}
                                    </a>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="map-holder map-contact">
        <div id="gmap">
            <iframe src="{{ env('CONTACT_IFRAME') }}" frameborder="0" width="100%" height="500"
                allowfullscreen>
            </iframe>
        </div>
    </div>
</main>
