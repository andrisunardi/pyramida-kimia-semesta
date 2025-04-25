<main>
    <div class="row g-3 mb-3">
        <div class="col-6 col-sm-auto">
            <x-components::link :text="trans('index.profile')" :class="'text-white'" :href="route('cms.profile.index')" :icon="'fas fa-user-circle'"
                :button="true" :color="'primary'" :width="'100'" />
        </div>

        <div class="col-6 col-sm-auto">
            <x-components::link :text="trans('index.activity_log')" :class="'text-white'" :href="route('cms.profile.activity-log')" :icon="'fas fa-user-clock'"
                :button="true" :color="'info'" :width="'100'" />
        </div>

        <div class="col-sm-auto">
            <x-components::link :text="trans('index.edit_profile')" :class="'text-white'" :href="route('cms.profile.edit-profile')" :icon="'fas fa-user-edit'"
                :button="true" :color="'success'" :width="'100'" />
        </div>

        <div class="col-sm-auto">
            <x-components::link :text="trans('index.change_password')" :class="'text-white'" :href="route('cms.profile.change-password')" :icon="'fas fa-user-lock'"
                :button="true" :color="'warning'" :width="'100'" />
        </div>

        <div class="col-sm-auto">
            <x-components::link :text="trans('index.logout')" :class="'text-white'" :href="route('cms.logout')" :icon="'fas fa-sign-out-alt'"
                :button="true" :color="'danger'" :width="'100'" />
        </div>
    </div>
</main>
