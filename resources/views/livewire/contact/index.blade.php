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
                                    <label for="name">{{ trans('index.name') }} *</label>
                                    <input wire:model="form.name" id="name" name="name" type="text"
                                        placeholder="{{ trans('index.your_name') }} *" class="form-control"
                                        maxlength="50" required>
                                </div>

                                <div class="form-field col-md-6">
                                    <label for="company">{{ trans('index.company') }} *</label>
                                    <input wire:model="form.company" id="company" name="company" type="text"
                                        placeholder="{{ trans('index.your_company') }} *" class="form-control"
                                        maxlength="50" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="form-field col-md-6 form-m-bttm">
                                    <label for="email">{{ trans('index.email') }} *</label>
                                    <input wire:model="form.email" id="email" name="email" type="email"
                                        placeholder="{{ trans('index.your_email') }} *" class="form-control"
                                        maxlength="50" required>
                                </div>

                                <div class="form-field col-md-6">
                                    <label for="phone">{{ trans('index.phone') }} *</label>
                                    <input wire:model="form.phone" id="phone" name="phone" type="text"
                                        placeholder="{{ trans('index.your_phone') }} *" class="form-control"
                                        maxlength="15" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="form-field col-md-12">
                                    <label for="subject">{{ trans('index.subject') }} *</label>
                                    <input wire:model="form.subject" id="subject" name="subject" type="text"
                                        placeholder="{{ trans('index.write_subject') }} *" class="form-control"
                                        maxlength="100" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="form-field col-md-12">
                                    <label for="message">{{ trans('index.message') }} *</label>
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
                                    <x-components::link.external-link :icon="''" :href="env('CONTACT_MAPS')"
                                        :text="env('CONTACT_ADDRESS')" />
                                </span>
                            </li>
                            <li>
                                <em class="fa fa-phone" aria-hidden="true"></em>
                                <span>
                                    <x-components::link.phone :icon="''" :value="Utils::phone(env('CONTACT_PHONE'))" />
                                </span>
                            </li>
                            <li>
                                <em class="fa fa-envelope" aria-hidden="true"></em>
                                <span>
                                    <x-components::link.email :icon="''" :value="env('CONTACT_EMAIL')" />
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
            <iframe src="{{ env('CONTACT_IFRAME') }}" frameborder="0" width="100%" height="400"
                allowfullscreen>
            </iframe>
        </div>
    </div>

    <div class="section section-contents section-pad bg-light">
        <div class="container">
            <div class="content row">
                <div class="wide-sm center">
                    <h2>
                        @if (App::isLocale('en'))
                            Our Office Locations
                        @endif
                        @if (App::isLocale('id'))
                            Lokasi Kantor Kami
                        @endif
                        @if (App::isLocale('zh'))
                            我们的办公地点
                        @endif
                    </h2>
                    <p>
                        @if (App::isLocale('en'))
                            PT. Pyramida Kimia Semesta operates across multiple key regions in Indonesia, with office
                            and distribution points strategically located in Tangerang, Sumatra, Batam, Semarang,
                            Surabaya, Kalimantan, and Sulawesi to ensure efficient service and nationwide coverage.
                        @endif
                        @if (App::isLocale('id'))
                            PT. Pyramida Kimia Semesta beroperasi di beberapa wilayah utama di Indonesia, dengan kantor
                            dan titik distribusi berlokasi strategis di Tangerang, Sumatera, Batam, Semarang, Surabaya,
                            Kalimantan, dan Sulawesi untuk memastikan layanan yang efisien dan jangkauan nasional.
                        @endif
                        @if (App::isLocale('zh'))
                            PT。 Pyramida Kimia Semesta
                            的业务遍及印度尼西亚多个主要地区，在坦格朗、苏门答腊、巴淡岛、三宝垄、泗水、加里曼丹和苏拉威西岛战略性地设有办事处和分销点，以确保高效的服务和全国范围的覆盖。
                        @endif
                    </p>
                </div>
                <div class="gaps size-lg"></div>
                <div class="row center-md">
                    @foreach ($offices as $key => $office)
                        <div class="col-lg-3 col-sm-6 res-s-bttm">
                            <div class="txt-entry bg-white pd-x3 round">
                                <h5>{{ $office->name }}</h5>
                                <p>
                                    <x-components::image :href="$office->maps" :src="$office->assetImage()" :alt="$office->altImage()" />
                                </p>
                                <p>
                                    <x-components::link.external-link :icon="''" :href="$office->maps"
                                        :text="$office->address" />
                                </p>
                                <p>
                                    <span class="color-primary">{{ trans('index.phone') }}</span>
                                    <x-components::link.phone :icon="''" :value="$office->phone" />
                                </p>
                            </div>
                            <div class="gaps"></div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</main>
