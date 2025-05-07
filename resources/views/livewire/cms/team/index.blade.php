@section('title', trans('index.team'))
@section('icon', 'fas fa-user-tie')

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

                <div class="col-sm-auto">
                    <x-components::search.is-active />
                </div>

                <div class="col col-sm-auto">
                    <x-components::form.label :class="'d-none d-sm-block'" :title="'&nbsp;'" />
                    <x-components::form.reset />
                </div>
                <div class="col-auto col-sm-auto">
                    <x-components::form.label :class="'d-none d-sm-block'" :title="'&nbsp;'" />
                    <x-components::button.refresh />
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
                @can('team.add')
                    <div class="col col-sm-auto">
                        <x-components::link.add :href="route('cms.team.add')" />
                    </div>
                @endcan

                @can('team.export')
                    <div class="col-auto">
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
                            <th width="1%">{{ trans('index.image') }}</th>
                            <th>{{ trans('index.name') }}</th>
                            <th width="1%">{{ trans('index.job') }}</th>
                            <th width="1%">{{ trans('index.active') }}</th>
                            <th width="1%">{{ trans('index.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($teams as $key => $team)
                            <tr wire:key="{{ $key }}">
                                <td class="text-center">
                                    {{ ($teams->currentPage() - 1) * $teams->perPage() + $loop->iteration }}
                                </td>
                                <td class="text-center">
                                    <x-components::link :href="route('cms.team.detail', [
                                        'team' => $team,
                                    ])" :text="$team->id" />
                                </td>
                                <td>
                                    @if ($team->checkImage())
                                        <x-components::image :href="$team->assetImage()" :src="$team->assetImage()" :alt="$team->altImage()" />
                                    @endif
                                </td>
                                <td>
                                    <x-components::link :href="route('cms.team.detail', [
                                        'team' => $team,
                                    ])" :text="$team->name" />
                                </td>
                                <td>
                                    {{ $team->job }}
                                </td>
                                <td class="text-center">
                                    @can('team.edit')
                                        <x-components::form.switch :key="'changeActive'" :id="$team->id"
                                            :value="$team->is_active" />
                                    @else
                                        <span
                                            class="badge rounded-pill text-bg-{{ Utils::successDanger($team->is_active) }}">
                                            {{ Utils::translate(Utils::yesNo($team->is_active)) }}
                                        </span>
                                    @endcan
                                </td>
                                <td>
                                    @can('team.detail')
                                        <x-components::link.detail :size="'sm'" :width="'auto'"
                                            :href="route('cms.team.detail', [
                                                'team' => $team->id,
                                            ])" />
                                    @endcan

                                    @can('team.edit')
                                        <x-components::link.edit :size="'sm'" :width="'auto'" :href="route('cms.team.edit', [
                                            'team' => $team->id,
                                        ])" />
                                    @endcan

                                    @can('team.delete')
                                        <x-components::button.delete :size="'sm'" :width="'auto'"
                                            :key="'delete(' . $team->id . ')'" :confirm="trans('index.confirm')" />
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

            {{ $teams->links('components::components.layouts.pagination') }}
        </div>
    </div>
</main>
