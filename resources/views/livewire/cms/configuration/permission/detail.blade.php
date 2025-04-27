@section('title', trans('index.permission'))
@section('icon', 'fas fa-key')

<main>
    <div class="card mb-3">
        <div class="card-header text-bg-info">
            <x-components::icon :value="'fas fa-list'" />
            {{ trans('index.detail') }} @yield('title')
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-auto">
                    <x-components::link.back :width="'100'" :href="route('cms.configuration.permission.index')" />
                </div>
            </div>

            <hr />

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">ID</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $permission->id }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">Name</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $permission->name }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">Guard Name</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $permission->guard_name }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">Total Role</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    <x-components::link :href="route('cms.configuration.role.index', [
                        'permission_id' => $permission->id,
                    ])" :text="$permission->roles_count" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">Total User</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    <x-components::link :href="route('cms.configuration.user.index', [
                        'permission_name' => $permission->name,
                    ])" :text="$permission->users_count" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">Created At</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $permission->created_at }}
                    ({{ $permission->created_at->diffForHumans() }})
                </div>
            </div>

            <div class="row">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">Updated At</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $permission->updated_at }}
                    ({{ $permission->updated_at->diffForHumans() }})
                </div>
            </div>

            <hr />

            <div class="row">
                @can('permission.edit')
                    <div class="col-6 col-sm-auto">
                        <x-components::link.edit :size="'md'" :width="'100'" :href="route('cms.configuration.permission.edit', [
                            'permission' => $permission->id,
                        ])" />
                    </div>
                @endcan

                @can('permission.delete')
                    <div class="col-6 col-sm-auto">
                        <x-components::button.delete :size="'md'" :width="'100'" :key="'delete(' . $permission->id . ')'"
                            :confirm="trans('index.confirm')" />
                    </div>
                @endcan
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                @can('role')
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-role-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-role" type="button" role="tab">
                            <x-components::icon :value="'fas fa-briefcase'" /> Role
                        </button>
                    </li>
                @endcan

                @can('user')
                    <li class="nav-item ms-3" role="presentation">
                        <button class="nav-link" id="pills-user-tab" data-bs-toggle="pill" data-bs-target="#pills-user"
                            type="button" role="tab">
                            <x-components::icon :value="'fas fa-user'" /> User
                        </button>
                    </li>
                @endcan
            </ul>
        </div>
    </div>

    <div class="tab-content" id="pills-tabContent">
        @can('role')
            <div class="tab-pane fade show active" id="pills-role" role="tabpanel">
                @livewire('c-m-s.configuration.permission.permission-role-component', ['permission' => $permission])
            </div>
        @endcan

        @can('user')
            <div class="tab-pane fade" id="pills-user" role="tabpanel">
                @livewire('c-m-s.configuration.permission.permission-user-component', ['permission' => $permission])
            </div>
        @endcan
    </div>

    @livewire('c-m-s.loader')

</main>
