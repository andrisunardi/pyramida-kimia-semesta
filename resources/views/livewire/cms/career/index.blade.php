@section('title', trans('index.career'))
@section('icon', 'fas fa-briefcase')

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
                @can('career.add')
                    <div class="col col-sm-auto">
                        <x-components::link.add :href="route('cms.career.add')" />
                    </div>
                @endcan

                @can('career.export')
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
                            <th width="1%">{{ trans('index.location') }}</th>
                            <th width="1%">{{ trans('index.active') }}</th>
                            <th width="1%">{{ trans('index.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($careers as $key => $career)
                            <tr wire:key="{{ $key }}">
                                <td class="text-center">
                                    {{ ($careers->currentPage() - 1) * $careers->perPage() + $loop->iteration }}
                                </td>
                                <td class="text-center">
                                    <x-components::link :href="route('cms.career.detail', [
                                        'career' => $career,
                                    ])" :text="$career->id" />
                                </td>
                                <td>
                                    <div>
                                        <x-components::link :href="route('cms.career.detail', [
                                            'career' => $career,
                                        ])" :text="$career->name" />
                                    </div>
                                    <div>
                                        <x-components::link :href="route('cms.career.detail', [
                                            'career' => $career,
                                        ])" :text="$career->name_id" />
                                    </div>
                                    <div>
                                        <x-components::link :href="route('cms.career.detail', [
                                            'career' => $career,
                                        ])" :text="$career->name_zh" />
                                    </div>
                                    <div>
                                        <x-components::link.external-link :href="$career->link" :text="$career->link" />
                                    </div>
                                </td>
                                <td>
                                    <div>{{ $career->location }}</div>
                                    <div>{{ $career->location_id }}</div>
                                    <div>{{ $career->location_zh }}</div>
                                </td>
                                <td class="text-center">
                                    @can('career.edit')
                                        <x-components::form.switch :key="'changeActive'" :id="$career->id"
                                            :value="$career->is_active" />
                                    @else
                                        <span
                                            class="badge rounded-pill text-bg-{{ Utils::successDanger($career->is_active) }}">
                                            {{ Utils::translate(Utils::yesNo($career->is_active)) }}
                                        </span>
                                    @endcan
                                </td>
                                <td>
                                    @can('career.detail')
                                        <x-components::link.detail :size="'sm'" :width="'auto'"
                                            :href="route('cms.career.detail', [
                                                'career' => $career->id,
                                            ])" />
                                    @endcan

                                    @can('career.edit')
                                        <x-components::link.edit :size="'sm'" :width="'auto'" :href="route('cms.career.edit', [
                                            'career' => $career->id,
                                        ])" />
                                    @endcan

                                    @can('career.delete')
                                        <x-components::button.delete :size="'sm'" :width="'auto'"
                                            :key="'delete(' . $career->id . ')'" :confirm="trans('index.confirm')" />
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

            {{ $careers->links('components::components.layouts.pagination') }}
        </div>
    </div>
</main>
