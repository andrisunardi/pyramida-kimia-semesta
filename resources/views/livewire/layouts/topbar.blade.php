<div class="topbar style-dark" style="background: #006633;">
    <div class="container">
        <div class="row">
            <div class="top-aside top-left">
                <ul class="top-nav">
                    <li>
                        <b>{{ trans('index.change_language') }} :</b>
                    </li>
                    <li>
                        <a draggable="false" href="{{ url('locale/en') }}">
                            {{ trans('index.english') }}
                        </a>
                    </li>
                    <li>
                        <a draggable="false" href="{{ url('locale/id') }}">
                            {{ trans('index.indonesia') }}
                        </a>
                    </li>
                    <li>
                        <a draggable="false" href="{{ url('locale/zh') }}">
                            {{ trans('index.chinese') }}
                        </a>
                    </li>
                </ul>
            </div>
            <div class="top-aside top-right clearfix">
                <ul class="top-contact clearfix">
                    <li class="t-email t-email1">
                        <em class="fa fa-envelope-o" aria-hidden="true"></em>
                        <span>
                            <a draggable="false" href="mailto:{{ env('CONTACT_EMAIL') }}">
                                {{ env('CONTACT_EMAIL') }}
                            </a>
                        </span>
                    </li>
                    <li class="t-phone t-phone1 d-none">
                        <em class="fa fa-phone" aria-hidden="true"></em>
                        <span>
                            <a draggable="false" href="tel:+{{ Utils::phone(env('CONTACT_PHONE')) }}">
                                {{ env('CONTACT_PHONE') }}
                            </a>
                        </span>
                    </li>
                    <li class="t-phone t-phone1">
                        <em class="fa fa-whatsapp" aria-hidden="true"></em>
                        <span>
                            <x-components::link.whatsapp :value="Utils::phone(env('CONTACT_WHATSAPP'))" :icon="''" />
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
