<div class="card">
    <div class="card-header text-bg-primary">
        <x-components::icon :value="'fas fa-table'" />
        Data User
    </div>
    <div class="card-body">
        <div class="row g-3 mb-3">
            <div class="col-sm-6 col-lg">
                <x-components::search :wire="'live'" />
            </div>

            <div class="col-sm-6 col-lg" wire:ignore>
                <x-components::form.select :key="'role_name'" :title="'Role'" :icon="'fas fa-briefcase'" :placeholder="'All Role'"
                    :wire="'lazy'" :datas="$roles" :value="$role_name" :valueattribute="'name'" />
            </div>

            <div class="col-sm-auto">
                <x-components::search.is-active :wire="'lazy'" />
            </div>

            <div class="col-6 col-sm-auto">
                <x-components::form.label :class="'d-none d-sm-block'" :title="'&nbsp;'" />
                <x-components::form.reset :width="'100'" />
            </div>

            <div class="col-6 col-sm-auto">
                <x-components::form.label :class="'d-none d-sm-block'" :title="'&nbsp;'" />
                <x-components::button.refresh :width="'100'" />
            </div>

            @can('user.add')
                <div class="col-6 col-sm-auto">
                    <x-components::form.label :class="'d-none d-sm-block'" :title="'&nbsp;'" />
                    <x-components::link.add :width="'100'" :href="route('cms.configuration.user.add')" />
                </div>
            @endcan

            @can('user.export')
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
                        <th width="1%">Image</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th width="1%">Active</th>
                        <th width="1%">Total Role</th>
                        <th width="1%">Total Permission</th>
                        <th width="1%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $key => $user)
                        <tr wire:key="{{ $key }}">
                            <td class="text-center">
                                {{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}
                            </td>
                            <td class="text-center">
                                {{ $user->id }}
                            </td>
                            <td>
                                @if ($user->image_url)
                                    <x-components::image :src="asset($user->image_url)" :href="asset($user->image_url)" />
                                @endif
                            </td>
                            <td>
                                <x-components::link :href="route('cms.configuration.user.detail', [
                                    'user' => $user,
                                ])" :text="$user->name" />
                            </td>
                            <td>
                                <x-components::link :href="route('cms.configuration.user.detail', [
                                    'user' => $user,
                                ])" :text="$user->username" />
                            </td>
                            <td>
                                <x-components::link.email :value="$user->email" />
                            </td>
                            <td>
                                <x-components::link.whatsapp :value="$user->phone" />
                            </td>
                            <td class="text-center">
                                @can('user.add')
                                    <x-components::form.switch :key="'changeActive'" :id="$user->id" :value="$user->is_active" />
                                @else
                                    <span class="badge rounded-pill text-bg-{{ Str::successDanger($user->is_active) }}">
                                        {{ Str::yesNo($user->is_active) }}
                                    </span>
                                @endcan
                            </td>
                            <td class="text-center">
                                <x-components::link :href="route('cms.configuration.role.index', [
                                    'user_id' => $user->id,
                                ])" :text="$user->roles_count" />
                            </td>
                            <td class="text-center">
                                <x-components::link :href="route('cms.configuration.permission.index', [
                                    'user_id' => $user->id,
                                ])" :text="$user->permissions_count" />
                            </td>
                            <td>
                                @can('user.detail')
                                    <x-components::link.detail :size="'sm'" :width="'auto'" :href="route('cms.configuration.user.detail', [
                                        'user' => $user->id,
                                    ])" />
                                @endcan

                                @can('user.edit')
                                    <x-components::link.edit :size="'sm'" :width="'auto'" :href="route('cms.configuration.user.edit', [
                                        'user' => $user->id,
                                    ])" />
                                @endcan

                                @can('user.delete')
                                    <x-components::button.delete :size="'sm'" :width="'auto'" :key="'delete(' . $user->id . ')'"
                                        :confirm="trans('index.confirm')" />
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

        {{ $users->links('components::components.layouts.pagination') }}
    </div>
</div>
