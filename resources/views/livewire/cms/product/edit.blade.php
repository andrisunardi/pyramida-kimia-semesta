@section('title', trans('index.product'))
@section('icon', 'fas fa-flask')

<main>
    <div class="card">
        <div class="card-header text-bg-success">
            <x-components::icon :value="'fas fa-edit'" />
            {{ trans('index.edit') }} @yield('title')
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-auto">
                    <x-components::link.back :width="'100'" :href="route('cms.product.index')" />
                </div>
            </div>

            <hr />

            <form wire:submit.prevent="submit" role="form" autocomplete="off">

                <x-components::form.alert />

                <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                        <x-components::form.select :key="'form.product_category_id'" :title="trans('validation.attributes.product_category_id')" :icon="'fas fa-tag'"
                            :datas="$productCategories" :required="true" />
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-sm-4">
                        <div>
                            <x-components::form.name :key="'form.name'" :title="trans('validation.attributes.name')" :required="true"
                                :autofocus="true" />
                        </div>

                        <div class="mt-3">
                            <x-components::form.textarea :key="'form.description'" :title="trans('validation.attributes.description')" />
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
                    </div>

                    <div class="col-sm-4">
                        <div>
                            <x-components::form.name :key="'form.name_zh'" :title="trans('validation.attributes.name_zh')" :required="true"
                                :autofocus="true" />
                        </div>

                        <div class="mt-3">
                            <x-components::form.textarea :key="'form.description_zh'" :title="trans('validation.attributes.description_zh')" />
                        </div>
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-sm-4">
                        <x-components::form.image :key="'form.image'" />

                        <div class="mt-3">
                            <x-components::preview.image :image="$form->image" :data="$product" />
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <x-components::form.file :key="'form.file_coa'" :title="trans('validation.attributes.file_coa')" />
                    </div>

                    <div class="col-sm-4">
                        <x-components::form.file :key="'form.file_msds'" :title="trans('validation.attributes.file_msds')" />
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-sm-4">
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
