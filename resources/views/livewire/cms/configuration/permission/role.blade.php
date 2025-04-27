<div>
    <div class="card">
        <div class="card-header text-bg-primary">
            <x-components::icon :value="'fas fa-table'" />
            {{ trans('index.data') }} {{ trans('index.role') }}
        </div>
        <div class="card-body">
            <div class="row g-3 mb-3">
                <div class="col-sm-6 col-lg">
                    <x-components::search :wire="'live'" />
                </div>

                <div class="col-sm-6 col-lg" wire:ignore>
                    <x-components::form.select :key="'user_id'" :title="'User'" :icon="'fas fa-user'" :placeholder="'All User'"
                        :wire="'lazy'" :datas="$users" :value="$user_id" />
                </div>

                <div class="col-6 col-sm-auto">
                    <x-components::form.label :class="'d-none d-sm-block'" :title="'&nbsp;'" />
                    <x-components::form.reset :width="'100'" />
                </div>

                <div class="col-6 col-sm-auto">
                    <x-components::form.label :class="'d-none d-sm-block'" :title="'&nbsp;'" />
                    <x-components::button.refresh :width="'100'" />
                </div>

                @can('role.add')
                    <div class="col-6 col-sm-auto">
                        <x-components::form.label :class="'d-none d-sm-block'" :title="'&nbsp;'" />
                        <x-components::link.add :width="'100'" :href="route('cms.configuration.role.add')" />
                    </div>
                @endcan

                @can('role.export')
                    <div class="col-6 col-sm-auto">
                        <x-components::form.label :class="'d-none d-sm-block'" :title="'&nbsp;'" />
                        <x-components::button.export-to-excel :width="'100'" />
                    </div>
                @endcan
            </div>

            <div class="table-responsive mt-3">
                <table
                    class="table table-striped table-bordered table-hover text-nowrap table-responsive align-middle mb-0">
                    <thead class="table-primary">
                        <tr class="text-center align-middle">
                            <th width="1%">#</th>
                            <th width="1%">ID</th>
                            <th>Name</th>
                            <th>Guard Name</th>
                            <th width="1%">Total Permission</th>
                            <th width="1%">Total User</th>
                            <th width="1%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($roles as $key => $role)
                            <tr wire:key="{{ $key }}">
                                <td class="text-center">
                                    {{ ($roles->currentPage() - 1) * $roles->perPage() + $loop->iteration }}
                                </td>
                                <td class="text-center">
                                    {{ $role->id }}
                                </td>
                                <td>
                                    <x-components::link :href="route('cms.configuration.role.detail', [
                                        'role' => $role,
                                    ])" :text="$role->name" />
                                </td>
                                <td class="text-center">
                                    <x-components::link :href="route('cms.configuration.role.detail', [
                                        'role' => $role,
                                    ])" :text="$role->guard_name" />
                                </td>
                                <td class="text-center">
                                    <x-components::link :href="route('cms.configuration.permission.index', [
                                        'role_id' => $role->id,
                                    ])" :text="$role->permissions_count" />
                                </td>
                                <td class="text-center">
                                    <x-components::link :href="route('cms.configuration.user.index', [
                                        'role_name' => $role->name,
                                    ])" :text="$role->users_count" />
                                </td>
                                <td>
                                    @can('role.detail')
                                        <x-components::link.detail :size="'sm'" :width="'auto'"
                                            :href="route('cms.configuration.role.detail', [
                                                'role' => $role->id,
                                            ])" />
                                    @endcan

                                    @can('role.edit')
                                        <x-components::link.edit :size="'sm'" :width="'auto'" :href="route('cms.configuration.role.edit', [
                                            'role' => $role->id,
                                        ])" />
                                    @endcan

                                    @can('role.delete')
                                        <x-components::button.delete :size="'sm'" :width="'auto'"
                                            :key="'delete(' . $role->id . ')'" :confirm="trans('index.confirm')" />
                                    @endcan
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-center" colspan="100%">
                                    No Data Available
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{ $roles->links('components::components.layouts.pagination') }}
        </div>
    </div>
</div>
