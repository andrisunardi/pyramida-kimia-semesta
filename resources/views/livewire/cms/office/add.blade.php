@section('title', trans('index.office'))
@section('icon', 'fas fa-building')

<main>
    <div class="card">
        <div class="card-header text-bg-primary">
            <x-components::icon :value="'fas fa-plus'" />
            {{ trans('index.add') }} @yield('title')
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-auto">
                    <x-components::link.back :width="'100'" :href="route('cms.office.index')" />
                </div>
            </div>

            <hr />

            <form wire:submit.prevent="submit" role="form" autocomplete="off">

                <x-components::form.alert />

                <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                        <x-components::form.name :key="'form.name'" :title="trans('validation.attributes.name')" :required="true"
                            :autofocus="true" />
                    </div>

                    <div class="col-sm-6">
                        <x-components::form.address :key="'form.address'" :title="trans('validation.attributes.address')" :required="true" />
                    </div>

                    <div class="col-sm-6">
                        <x-components::form.url :key="'form.maps'" :title="trans('validation.attributes.maps')" :required="true" />
                    </div>

                    <div class="col-sm-6">
                        <x-components::form.phone :key="'form.phone'" :title="trans('validation.attributes.phone')" :required="true" />
                    </div>

                    <div class="col-sm-6">
                        <x-components::form.image :key="'form.image'" />

                        <div class="mt-3">
                            <x-components::preview.image :image="$form->image" />
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <x-components::form.is-active :key="'form.is_active'" />
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
