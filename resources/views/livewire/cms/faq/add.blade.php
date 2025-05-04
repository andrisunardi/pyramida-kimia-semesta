@section('title', trans('index.faq'))
@section('icon', 'fas fa-question')

<main>
    <div class="card">
        <div class="card-header text-bg-primary">
            <x-components::icon :value="'fas fa-plus'" />
            {{ trans('index.add') }} @yield('title')
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-auto">
                    <x-components::link.back :width="'100'" :href="route('cms.faq.index')" />
                </div>
            </div>

            <hr />

            <form wire:submit.prevent="submit" role="form" autocomplete="off">

                <x-components::form.alert />

                <div class="row g-3 mb-3">
                    <div class="col-sm-4">
                        <div>
                            <x-components::form.text :key="'form.question'" :title="trans('validation.attributes.question')" :icon="'fas fa-question'"
                                :required="true" :autofocus="true" />
                        </div>

                        <div class="mt-3">
                            <x-components::form.textarea :key="'form.answer'" :title="trans('validation.attributes.answer')" />
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div>
                            <x-components::form.text :key="'form.question_id'" :title="trans('validation.attributes.question_id')" :icon="'fas fa-question'"
                                :required="true" :autofocus="true" />
                        </div>

                        <div class="mt-3">
                            <x-components::form.textarea :key="'form.answer_id'" :title="trans('validation.attributes.answer_id')" />
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div>
                            <x-components::form.text :key="'form.question_zh'" :title="trans('validation.attributes.question_zh')" :icon="'fas fa-question'"
                                :required="true" :autofocus="true" />
                        </div>

                        <div class="mt-3">
                            <x-components::form.textarea :key="'form.answer_zh'" :title="trans('validation.attributes.answer_zh')" />
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
