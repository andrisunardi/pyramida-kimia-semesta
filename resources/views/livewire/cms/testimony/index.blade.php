@section('title', trans('index.testimony'))
@section('icon', 'fas fa-comments')

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
                @can('testimony.add')
                    <div class="col col-sm-auto">
                        <x-components::link.add :href="route('cms.testimony.add')" />
                    </div>
                @endcan

                @can('testimony.export')
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
                            <th>{{ trans('index.name') }} & {{ trans('index.company') }}</th>
                            <th>{{ trans('index.message') }}</th>
                            <th width="1%">{{ trans('index.active') }}</th>
                            <th width="1%">{{ trans('index.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($testimonies as $key => $testimony)
                            <tr wire:key="{{ $key }}">
                                <td class="text-center">
                                    {{ ($testimonies->currentPage() - 1) * $testimonies->perPage() + $loop->iteration }}
                                </td>
                                <td class="text-center">
                                    <x-components::link :href="route('cms.testimony.detail', [
                                        'testimony' => $testimony,
                                    ])" :text="$testimony->id" />
                                </td>
                                <td>
                                    <x-components::link :href="route('cms.testimony.detail', [
                                        'testimony' => $testimony,
                                    ])" :text="$testimony->name" />
                                    <div>{{ $testimony->company }}</div>
                                </td>
                                <td class="text-wrap">
                                    {{ $testimony->translate_message }}
                                </td>
                                <td class="text-center">
                                    @can('testimony.edit')
                                        <x-components::form.switch :key="'changeActive'" :id="$testimony->id"
                                            :value="$testimony->is_active" />
                                    @else
                                        <span
                                            class="badge rounded-pill text-bg-{{ Utils::successDanger($testimony->is_active) }}">
                                            {{ Utils::translate(Utils::yesNo($testimony->is_active)) }}
                                        </span>
                                    @endcan
                                </td>
                                <td>
                                    @can('testimony.detail')
                                        <x-components::link.detail :size="'sm'" :width="'auto'"
                                            :href="route('cms.testimony.detail', [
                                                'testimony' => $testimony->id,
                                            ])" />
                                    @endcan

                                    @can('testimony.edit')
                                        <x-components::link.edit :size="'sm'" :width="'auto'" :href="route('cms.testimony.edit', [
                                            'testimony' => $testimony->id,
                                        ])" />
                                    @endcan

                                    @can('testimony.delete')
                                        <x-components::button.delete :size="'sm'" :width="'auto'"
                                            :key="'delete(' . $testimony->id . ')'" :confirm="trans('index.confirm')" />
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

            {{ $testimonies->links('components::components.layouts.pagination') }}
        </div>
    </div>
</main>
