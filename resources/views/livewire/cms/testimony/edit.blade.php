@section('title', trans('index.team'))
@section('icon', 'fas fa-comments')

<main>
    <div class="card">
        <div class="card-header text-bg-success">
            <x-components::icon :value="'fas fa-edit'" />
            {{ trans('index.edit') }} @yield('title')
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-auto">
                    <x-components::link.back :width="'100'" :href="route('cms.team.index')" />
                </div>
            </div>

            <hr />

            <form wire:submit.prevent="submit" role="form" autocomplete="off">

                <x-components::form.alert />

                <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                        <x-components::form.name :key="'form.name'" :title="trans('validation.attributes.name')" :maxlength="50" :required="true"
                            :autofocus="true" />
                    </div>

                    <div class="col-sm-6">
                        <x-components::form.company :key="'form.company'" :title="trans('validation.attributes.company')" :maxlength="50"
                            :required="true" />
                    </div>
                </div>

                <div class="row g-3 mb-3">
                    <div class="col-sm-6">
                        <x-components::form.message :key="'form.message'" :title="trans('validation.attributes.message')" :required="true" />
                    </div>

                    <div class="col-sm-6">
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
