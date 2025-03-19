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

        <form id="contact-us" class="form-quote" wire:submit.prevent="submit" role="form" autocomplete="off">

            <x-components::form.alert />

            <div class="form-results"></div>

            <div class="form-group">
                <div class="form-field">
                    <input wire:model="form.name" id="name" name="name" type="text"
                        placeholder="{{ trans('index.your_name') }} *" class="form-control" maxlength="50" required>
                </div>
            </div>

            <div class="form-group">
                <div class="form-field">
                    <input wire:model="form.company" id="company" name="company" type="text"
                        placeholder="{{ trans('index.your_company') }} *" class="form-control" maxlength="50" required>
                </div>
            </div>

            <div class="form-group">
                <div class="form-field">
                    <input wire:model="form.email" id="email" name="email" type="email"
                        placeholder="{{ trans('index.your_email') }} *" class="form-control" maxlength="50" required>
                </div>
            </div>

            <div class="form-group">
                <div class="form-field form-m-bttm">
                    <input wire:model="form.phone" id="phone" name="phone" type="text"
                        placeholder="{{ trans('index.your_phone') }} *" class="form-control" maxlength="15" required>
                </div>
            </div>

            <div class="form-group">
                <div class="form-field">
                    <input wire:model="form.subject" id="subject" name="subject" type="text"
                        placeholder="{{ trans('index.write_subject') }} *" class="form-control" maxlength="100"
                        required>
                </div>
            </div>

            <div class="form-group">
                <div class="form-field">
                    <textarea wire:model="form.message" id="message" name="message" type="text"
                        placeholder="{{ trans('index.write_message') }} *" class="txtarea form-control" maxlength="1000" required>
                    </textarea>
                </div>
            </div>

            <input type="text" class="hidden" name="form-anti-honeypot" value="">

            <button wire:click="submit" type="submit" class="btn btn-alt sb-h">
                {{ trans('index.submit') }}
            </button>
        </form>
    </div>
</div>
