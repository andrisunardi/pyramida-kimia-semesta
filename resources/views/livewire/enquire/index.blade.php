@section('title', trans('index.enquire'))
@section('icon', 'fas fa-pencil')

<main>
    @livewire('banner')

    <div class="section section-contents section-freequote section-pad">
        <div class="container">
            <div class="row">

                <div class="freequote-content row">

                    <div class="quote-list col-md-8 res-m-bttm">
                        <div class="quote-group">
                            <h1>
                                @if (App::isLocale('en'))
                                    Request for Free Consultation
                                @endif
                                @if (App::isLocale('id'))
                                    Permintaan Konsultasi Gratis
                                @endif
                                @if (App::isLocale('zh'))
                                    请求免费咨询
                                @endif
                            </h1>

                            <p>
                                @if (App::isLocale('en'))
                                    Curious about how our chemical and petrochemical solutions can support your business
                                    needs? Contact PT. Pyramida Kimia Semesta today for a free consultation. Our
                                    experienced team is ready to provide personalized guidance for industries ranging
                                    from solar panel and semiconductor manufacturing to lithium battery production and
                                    industrial waste treatment.
                                @endif
                                @if (App::isLocale('id'))
                                    Penasaran bagaimana solusi kimia dan petrokimia kami dapat mendukung kebutuhan
                                    bisnis Anda? Hubungi PT. Pyramida Kimia Semesta hari ini untuk konsultasi gratis.
                                    Tim kami yang berpengalaman siap memberikan panduan yang dipersonalisasi untuk
                                    berbagai industri, mulai dari produksi panel surya dan semikonduktor hingga produksi
                                    baterai litium dan pengolahan limbah industri.
                                @endif
                                @if (App::isLocale('zh'))
                                    想知道我们的化学和石化解决方案如何满足您的业务需求？立即联系 PT. Pyramida Kimia Semesta
                                    获取免费咨询。我们经验丰富的团队随时准备为从太阳能电池板和半导体制造到锂电池生产和工业废物处理等行业提供个性化指导。
                                @endif
                            </p>

                            <form id="quote-request" class="form-quote" wire:submit.prevent="submit" role="form"
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

                                <h4>
                                    @if (App::isLocale('en'))
                                        Product You Interested
                                    @endif
                                    @if (App::isLocale('id'))
                                        Produk Yang Anda Minati
                                    @endif
                                    @if (App::isLocale('zh'))
                                        您感兴趣的产品
                                    @endif
                                </h4>

                                <div class="form-group row">
                                    <div class="form-field col-md-12">
                                        <select wire:model="form.subject" id="subject" name="subject" required>
                                            <option value="">
                                                @if (App::isLocale('en'))
                                                    Please Select Product Category *
                                                @endif
                                                @if (App::isLocale('id'))
                                                    Silakan Pilih Kategori Produk *
                                                @endif
                                                @if (App::isLocale('zh'))
                                                    请选择产品类别*
                                                @endif
                                            </option>
                                            @foreach ($productCategories as $productCategory)
                                                <option value="{{ $productCategory->name }}">
                                                    {{ $productCategory->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="form-field col-md-12">
                                        <textarea wire:model="form.message" id="message" name="message" type="text"
                                            placeholder="{{ trans('index.write_message') }} *" class="txtarea form-control" maxlength="1000" required>
                                        </textarea>
                                    </div>
                                </div>

                                <button type="submit" class="btn" wire:click="submit">
                                    {{ trans('index.submit') }}
                                </button>
                            </form>
                        </div>
                    </div>

                    <div class="contact-details col-md-4">
                        <h3>{{ trans('index.contact_information') }}</h3>
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
</main>
