@section('title', trans('index.permission'))
@section('icon', 'fas fa-key')

<main>
    <div class="card">
        <div class="card-header text-bg-primary">
            <x-components::icon :value="'fas fa-search'" />
            {{ trans('index.search') }} @yield('title')
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-sm">
                    <x-components::search />
                </div>

                <div class="col-sm-6 col-lg" wire:ignore>
                    <x-components::search.select :key="'role_id'" :title="trans('validation.attributes.role')" :icon="'fas fa-briefcase'" :datas="$roles"
                        :value="$role_id" />
                </div>

                <div class="col-sm-6 col-lg" wire:ignore>
                    <x-components::search.select :key="'user_id'" :title="trans('validation.attributes.user')" :icon="'fas fa-user'" :datas="$users"
                        :value="$user_id" />
                </div>

                <div class="col col-sm-auto">
                    <x-components::form.label :class="'d-none d-sm-block'" :title="'&nbsp;'" />
                    <x-components::form.reset :width="'100'" />
                </div>

                <div class="col-auto col-sm-auto">
                    <x-components::form.label :class="'d-none d-sm-block'" :title="'&nbsp;'" />
                    <x-components::button.refresh :width="'100'" />
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header text-bg-primary">
            <x-components::icon :value="'fas fa-table'" />
            {{ trans('index.data') }} @yield('title')
        </div>
        <div class="card-body">
            <div class="row g-3">
                @can('permission.add')
                    <div class="col col-sm-auto">
                        <x-components::link.add :width="'100'" :href="route('cms.configuration.permission.add')" />
                    </div>
                @endcan

                @can('permission.export')
                    <div class="col-auto col-sm-auto">
                        <x-components::button.export-to-excel :width="'100'" />
                    </div>
                @endcan
            </div>

            <div class="table-responsive mt-3">
                <table
                    class="table table-striped table-bordered table-hover text-nowrap table-responsive align-middle mb-0">
                    <thead class="table-primary">
                        <tr class="text-center align-middle">
                            <th width="1%">{{ trans('index.#') }}</th>
                            <th width="1%">{{ trans('index.id') }}</th>
                            <th>{{ trans('index.name') }}</th>
                            <th width="1%">{{ trans('index.guard_name') }}</th>
                            <th width="1%">{{ trans('index.total') }} {{ trans('index.role') }}</th>
                            <th width="1%">{{ trans('index.total') }} {{ trans('index.user') }}</th>
                            <th width="1%">{{ trans('index.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($permissions as $key => $permission)
                            <tr wire:key="{{ $key }}">
                                <td class="text-center">
                                    {{ ($permissions->currentPage() - 1) * $permissions->perPage() + $loop->iteration }}
                                </td>
                                <td class="text-center">
                                    <x-components::link :href="route('cms.configuration.permission.detail', [
                                        'permission' => $permission,
                                    ])" :text="$permission->id" />
                                </td>
                                <td>
                                    <x-components::link :href="route('cms.configuration.permission.detail', [
                                        'permission' => $permission,
                                    ])" :text="$permission->name" />
                                </td>
                                <td class="text-center">
                                    {{ $permission->guard_name }}
                                </td>
                                <td class="text-center">
                                    <x-components::link :href="route('cms.configuration.role.index', [
                                        'permission_id' => $permission->id,
                                    ])" :text="$permission->roles_count" />
                                </td>
                                <td class="text-center">
                                    <x-components::link :href="route('cms.configuration.user.index', [
                                        'permission_name' => $permission->name,
                                    ])" :text="$permission->users_count" />
                                </td>
                                <td>
                                    @can('permission.detail')
                                        <x-components::link.detail :size="'sm'" :width="'auto'"
                                            :href="route('cms.configuration.permission.detail', [
                                                'permission' => $permission->id,
                                            ])" />
                                    @endcan

                                    @can('permission.edit')
                                        <x-components::link.edit :size="'sm'" :width="'auto'" :href="route('cms.configuration.permission.edit', [
                                            'permission' => $permission->id,
                                        ])" />
                                    @endcan

                                    @can('permission.delete')
                                        <x-components::button.delete :size="'sm'" :width="'auto'"
                                            :key="'delete(' . $permission->id . ')'" :confirm="trans('index.confirm')" />
                                    @endcan
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="100%">
                                    {{ trans('index.no_data_available') }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{ $permissions->links('components::components.layouts.pagination') }}
        </div>
    </div>
</main>
