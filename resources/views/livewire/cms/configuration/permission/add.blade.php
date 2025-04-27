@section('title', trans('index.permission'))
@section('icon', 'fas fa-key')

<main>
    <div class="card">
        <div class="card-header text-bg-primary">
            <x-components::icon :value="'fas fa-plus'" />
            {{ trans('index.add') }} @yield('title')
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-auto">
                    <x-components::link.back :width="'100'" :href="route('cms.configuration.permission.index')" />
                </div>
            </div>

            <hr />

            <form wire:submit.prevent="submit" role="form" autocomplete="off">

                <x-components::form.alert />

                <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                        <x-components::form.name :key="'form.name'" :title="trans('validation.attributes.name')" :placeholder="'Ex. Admin'" :icon="'fas fa-key'"
                            :required="true" :autofocus="true" />
                    </div>

                    <div class="col-sm-6">
                        <x-components::form.text :key="'form.guard_name'" :title="trans('validation.attributes.guard_name')" :icon="'fas fa-shield'"
                            :placeholder="'Ex. web'" :required="true" />
                    </div>

                    <div class="col-sm-6">
                        <x-components::form.checkbox :key="'form.role_ids'" :title="trans('validation.attributes.role')" :datas="$roles"
                            :valueAttribute="'name'" />
                    </div>
                </div>

                <hr />

                <div class="row">
                    <div class="col-6 col-sm-auto">
                        <x-components::form.submit :width="'100'" />
                    </div>
                    <div class="col-6 col-sm-auto">
                        <x-components::form.reset :width="'100'" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
