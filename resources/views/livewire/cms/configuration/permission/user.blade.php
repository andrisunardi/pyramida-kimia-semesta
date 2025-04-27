<div>
    <div class="card">
        <div class="card-header text-bg-primary">
            <x-icon :value="'fas fa-table'" />
            Data User
        </div>
        <div class="card-body">
            <div class="row g-3 mb-3">
                <div class="col-sm-6 col-lg">
                    <x-form.search :wire="'live'" />
                </div>

                <div class="col-sm-6 col-lg" wire:ignore>
                    <x-form.select :key="'role_name'" :title="'Role'" :icon="'fas fa-briefcase'" :placeholder="'All Role'"
                        :wire="'lazy'" :datas="$roles" :value="$role_name" :valueattribute="'name'" />
                </div>

                <div class="col-sm-auto">
                    <x-search.is-active :wire="'lazy'" />
                </div>

                <div class="col-6 col-sm-auto">
                    <x-form.label :class="'d-none d-sm-block'" :title="'&nbsp;'" />
                    <x-form.reset :width="'100'" />
                </div>

                <div class="col-6 col-sm-auto">
                    <x-form.label :class="'d-none d-sm-block'" :title="'&nbsp;'" />
                    <x-button.refresh :width="'100'" />
                </div>

                @can('user.add')
                    <div class="col-6 col-sm-auto">
                        <x-form.label :class="'d-none d-sm-block'" :title="'&nbsp;'" />
                        <x-link.add :width="'100'" :href="route('user.add')" />
                    </div>
                @endcan

                @can('user.export')
                    <div class="col-6 col-sm-auto">
                        <x-form.label :class="'d-none d-sm-block'" :title="'&nbsp;'" />
                        <x-button.export :width="'100'" />
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
                            <th>Code</th>
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
                                        <x-image :src="asset($user->image_url)" :href="asset($user->image_url)" />
                                    @endif
                                </td>
                                <td>
                                    <x-link :href="route('user.detail', [
                                        'user' => $user,
                                    ])" :text="$user->code" />
                                </td>
                                <td>
                                    <x-link :href="route('user.detail', [
                                        'user' => $user,
                                    ])" :text="$user->name" />
                                </td>
                                <td>
                                    <x-link :href="route('user.detail', [
                                        'user' => $user,
                                    ])" :text="$user->username" />
                                </td>
                                <td>
                                    <x-link.email :value="$user->email" />
                                </td>
                                <td>
                                    <x-link.whatsapp :value="$user->phone" />
                                </td>
                                <td class="text-center">
                                    @can('user.add')
                                        <x-form.switch :key="'changeActive'" :id="$user->id" :value="$user->is_active" />
                                    @else
                                        <span class="badge rounded-pill text-bg-{{ Str::successDanger($user->is_active) }}">
                                            {{ Str::yesNo($user->is_active) }}
                                        </span>
                                    @endcan
                                </td>
                                <td class="text-center">
                                    <x-link :href="route('role.index', [
                                        'user_id' => $user->id,
                                    ])" :text="$user->roles_count" />
                                </td>
                                <td class="text-center">
                                    <x-link :href="route('permission.index', [
                                        'user_id' => $user->id,
                                    ])" :text="$user->permissions_count" />
                                </td>
                                <td>
                                    @can('user.detail')
                                        <x-link.detail :size="'sm'" :width="'auto'" :href="route('user.detail', [
                                            'user' => $user->id,
                                        ])" />
                                    @endcan

                                    @can('user.edit')
                                        <x-link.edit :size="'sm'" :width="'auto'" :href="route('user.edit', [
                                            'user' => $user->id,
                                        ])" />
                                    @endcan

                                    @can('user.delete')
                                        <x-button.delete :size="'sm'" :width="'auto'" :key="'delete(' . $user->id . ')'"
                                            :confirm="'Are you sure you want to delete this User'" />
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

            {{ $users->links('livewire.pagination') }}
        </div>
    </div>
</div>
