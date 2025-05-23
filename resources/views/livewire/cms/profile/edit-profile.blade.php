@section('title', trans('index.edit_profile') . ' - ' . trans('index.profile'))
@section('icon', 'fas fa-user-edit')

<main>
    @livewire('c-m-s.profile.menu-component')

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header text-bg-success">
                    <x-components::icon :value="'fas fa-user-edit'" />
                    @yield('title')
                </div>

                <div class="card-body">
                    <form wire:submit.prevent="submit" role="form" autocomplete="off">

                        <x-components::form.alert />

                        <div class="row g-3 mb-3">
                            <div class="col-sm-6">
                                <x-components::form.name :key="'form.name'" :icon="'fas fa-id-card'" :maxlength="50"
                                    :required="true" :autofocus="true" />
                            </div>

                            <div class="col-sm-6">
                                <x-components::form.username :key="'form.username'" :maxlength="50" :required="true" />
                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-sm-6">
                                <x-components::form.email :key="'form.email'" :maxlength="50" :required="true"
                                    :autocapitalize="'none'" />
                            </div>

                            <div class="col-sm-6">
                                <x-components::form.phone :key="'form.phone'" :maxlength="15" :required="true" />
                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-sm-6">
                                <x-components::form.image :key="'form.image'" />

                                <x-components::preview.image :image="$form->image" :data="Auth::user()" />
                            </div>
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
