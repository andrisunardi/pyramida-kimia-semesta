@section('title', trans('index.history'))
@section('icon', 'fas fa-scroll')

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
                @can('history.add')
                    <div class="col col-sm-auto">
                        <x-components::link.add :href="route('cms.history.add')" />
                    </div>
                @endcan

                @can('history.export')
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
                            <th>{{ trans('index.name') }}</th>
                            <th width="1%">{{ trans('index.active') }}</th>
                            <th width="1%">{{ trans('index.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($histories as $key => $history)
                            <tr wire:key="{{ $key }}">
                                <td class="text-center">
                                    {{ ($histories->currentPage() - 1) * $histories->perPage() + $loop->iteration }}
                                </td>
                                <td class="text-center">
                                    <x-components::link :href="route('cms.history.detail', [
                                        'history' => $history,
                                    ])" :text="$history->id" />
                                </td>
                                <td>
                                    <div>
                                        <x-components::link :href="route('cms.history.detail', [
                                            'history' => $history,
                                        ])" :text="$history->name" />
                                    </div>
                                    <div>
                                        <x-components::link :href="route('cms.history.detail', [
                                            'history' => $history,
                                        ])" :text="$history->name_id" />
                                    </div>
                                    <div>
                                        <x-components::link :href="route('cms.history.detail', [
                                            'history' => $history,
                                        ])" :text="$history->name_zh" />
                                    </div>
                                </td>
                                <td class="text-center">
                                    @can('history.edit')
                                        <x-components::form.switch :key="'changeActive'" :id="$history->id"
                                            :value="$history->is_active" />
                                    @else
                                        <span
                                            class="badge rounded-pill text-bg-{{ Utils::successDanger($history->is_active) }}">
                                            {{ Utils::translate(Utils::yesNo($history->is_active)) }}
                                        </span>
                                    @endcan
                                </td>
                                <td>
                                    @can('history.detail')
                                        <x-components::link.detail :size="'sm'" :width="'auto'"
                                            :href="route('cms.history.detail', [
                                                'history' => $history->id,
                                            ])" />
                                    @endcan

                                    @can('history.edit')
                                        <x-components::link.edit :size="'sm'" :width="'auto'" :href="route('cms.history.edit', [
                                            'history' => $history->id,
                                        ])" />
                                    @endcan

                                    @can('history.delete')
                                        <x-components::button.delete :size="'sm'" :width="'auto'"
                                            :key="'delete(' . $history->id . ')'" :confirm="trans('index.confirm')" />
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

            {{ $histories->links('components::components.layouts.pagination') }}
        </div>
    </div>
</main>
