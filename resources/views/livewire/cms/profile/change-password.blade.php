@section('title', trans('index.change_password') . ' - ' . trans('index.profile'))
@section('icon', 'fas fa-user-lock')

<main>
    @livewire('c-m-s.profile.menu-component')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header text-bg-warning">
                    <x-components::icon :value="'fas fa-user-lock'" />
                    @yield('title')
                </div>

                <div class="card-body">
                    <form wire:submit.prevent="submit" role="form" autocomplete="off">

                        <x-components::form.alert />

                        <div class="mb-3">
                            <x-components::form.password :key="'current_password'" :title="trans('validation.attributes.current_password')" :icon="'fas fa-lock'"
                                :maxlength="50" :required="true" :autocapitalize="'none'" :autofocus="true" />
                        </div>

                        <div class="mb-3">
                            <x-components::form.password :key="'new_password'" :title="trans('validation.attributes.new_password')" :icon="'fas fa-lock'"
                                :maxlength="50" :required="true" :autocapitalize="'none'" />
                        </div>

                        <div class="mb-3">
                            <x-components::form.password :key="'confirm_password'" :title="trans('validation.attributes.confirm_password')" :icon="'fas fa-lock'"
                                :maxlength="50" :required="true" :autocapitalize="'none'" />
                        </div>

                        <div class="row">
                            <div class="col-6 col-sm-auto">
                                <x-components::form.submit />
                            </div>
                            <div class="col-6 col-sm-auto">
                                <x-components::form.reset />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
