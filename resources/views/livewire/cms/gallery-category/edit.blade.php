@section('title', trans('index.gallery_category'))
@section('icon', 'fas fa-tags')

<main>
    <div class="card">
        <div class="card-header text-bg-success">
            <x-components::icon :value="'fas fa-edit'" />
            {{ trans('index.edit') }} @yield('title')
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-auto">
                    <x-components::link.back :width="'100'" :href="route('cms.gallery-category.index')" />
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
                    </div>

                    <div class="col-sm-4">
                        <div>
                            <x-components::form.name :key="'form.name_id'" :title="trans('validation.attributes.name_id')" :required="true"
                                :autofocus="true" />
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div>
                            <x-components::form.name :key="'form.name_zh'" :title="trans('validation.attributes.name_zh')" :required="true"
                                :autofocus="true" />
                        </div>
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-auto">
                        <x-components::form.is-active :key="'form.is_active'" />
                    </div>
                </div>

                <hr />

                <div class="row">
                    <div class="col-6 col-sm-auto">
                        <x-components::form.save :width="'100'" />
                    </div>
                    <div class="col-6 col-sm-auto">
                        <x-components::form.reset :width="'100'" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
