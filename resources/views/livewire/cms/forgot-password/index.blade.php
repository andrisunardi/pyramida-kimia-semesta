@section('title', trans('index.forgot_password'))
@section('icon', 'fas fa-question')

<main>
    <div class="bg-body-secondary">
        <div class="container">
            <div class="row justify-content-center align-items-center vh-100 mt-sm-5 mt-md-auto">
                <div class="col-sm-10 col-md-8 col-lg-6 col-xl-4">
                    <div class="mb-3 d-flex justify-content-center">
                        <img draggable="false" class="w-50" src="{{ asset('images/logo.png') }}"
                            alt="{{ trans('index.logo') }} - {{ env('APP_TITLE') }}">
                    </div>

                    <div class="card shadow rounded border-0 mb-sm-5 mb-md-auto">
                        <div class="card-header text-center">
                            <h5 class="card-title">{{ env('APP_NAME') }}</h5>
                            <p class="card-text">@yield('title')</p>
                        </div>

                        <div class="card-body">
                            <form wire:submit.prevent="submit" role="form" autocomplete="off">

                                <x-components::form.alert />

                                <div class="mb-3">
                                    <x-components::form.username :maxlength="50" :required="true" :autocapitalize="'none'"
                                        :autofocus="true" />
                                </div>

                                <div class="mb-3">
                                    <x-components::form.email :maxlength="50" :required="true" :autocapitalize="'none'" />
                                </div>

                                <div class="mb-3">
                                    <x-components::form.phone :maxlength="15" :required="true" :autocapitalize="'none'" />
                                </div>

                                <div class="mb-3">
                                    <x-components::form.boolean :key="'confirm_reset'" :title="trans('validation.attributes.confirm_reset')" :type="'checkbox'"
                                        :text="trans('index.confirm_reset')" :second="false" :label="false" />
                                </div>

                                <div class="row align-items-center justify-content-between">
                                    <div class="col">
                                        <x-components::link :class="'small text-decoration-none'" :text="trans('index.back_to_login_page')" :icon="'fas fa-arrow-left'"
                                            :href="route('cms.login')" />
                                    </div>
                                    <div class="col">
                                        <x-components::form.submit :text="trans('index.send_request')" :icon="'fas fa-paper-plane'" />
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="card-footer text-center">
                            <small class="text-body-secondary">
                                &copy; {{ trans('index.copyright') }}
                                {{ env('APP_YEAR') && env('APP_YEAR') != now()->year ? env('APP_YEAR') . ' - ' : null }}
                                {{ now()->year }} &reg;
                                <a draggable="false" href="{{ route('index') }}" target="_blank" class="text-body text-decoration-none">
                                    <strong>{{ env('APP_NAME') }}</strong>&trade;
                                </a>
                                <br />
                                {{ trans('index.all_rights_reserved') }}.
                            </small>
                            <br>
                            <small class="text-body-secondary">
                                {{ trans('index.created_and_designed_by') }}
                                <a draggable="false" href="https://www.diw.co.id" target="_blank">
                                    <img draggable="false" src="{{ asset('images/icon-diw.co.id.png') }}"
                                        alt="Icon DIW.co.id"
                                        title="{{ trans('index.created_and_designed_by') }} DIW.co.id">
                                </a>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
