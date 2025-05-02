@section('title', trans('index.career'))
@section('icon', 'fas fa-briefcase')

<main>
    <div class="card">
        <div class="card-header text-bg-primary">
            <x-components::icon :value="'fas fa-plus'" />
            {{ trans('index.add') }} @yield('title')
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-auto">
                    <x-components::link.back :width="'100'" :href="route('cms.career.index')" />
                </div>
            </div>

            <hr />

            <form wire:submit.prevent="submit" role="form" autocomplete="off">

                <x-components::form.alert />

                <div class="row g-3 mb-3">
                    <div class="col-sm-4">
                        <div>
                            <x-components::form.name :key="'form.name'" :title="trans('validation.attributes.name')" :required="true"
                                :autofocus="true" />
                        </div>

                        <div class="mt-3">
                            <x-components::form.textarea :key="'form.description'" :title="trans('validation.attributes.description')" />
                        </div>

                        <div class="mt-3">
                            <x-components::form.textarea :key="'location'" :title="trans('validation.attributes.location')" :icon="'fas fa-location'"
                                :helper="trans('index.example') . ' : Pyramida, Kimia, Semesta'" />
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div>
                            <x-components::form.name :key="'form.name_id'" :title="trans('validation.attributes.name_id')" :required="true"
                                :autofocus="true" />
                        </div>

                        <div class="mt-3">
                            <x-components::form.textarea :key="'form.description_id'" :title="trans('validation.attributes.description_id')" />
                        </div>

                        <div class="mt-3">
                            <x-components::form.textarea :key="'location_id'" :title="trans('validation.attributes.location_id')" :icon="'fas fa-location'"
                                :helper="trans('index.example') . ' : Pyramida, Kimia, Semesta'" />
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div>
                            <x-components::form.name :key="'form.name_zh'" :title="trans('validation.attributes.name_zh')" :required="true"
                                :autofocus="true" />
                        </div>

                        <div class="mt-3">
                            <x-components::form.textarea :key="'form.description_zh'" :title="trans('validation.attributes.description_zh')" />
                        </div>

                        <div class="mt-3">
                            <x-components::form.textarea :key="'location_zh'" :title="trans('validation.attributes.location_zh')" :icon="'fas fa-location'"
                                :helper="trans('index.example') . ' : Pyramida, Kimia, Semesta'" />
                        </div>
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col">
                        <x-components::form.url :key="'form.link'" :title="trans('validation.attributes.link')" />
                    </div>

                    <div class="col-auto">
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
