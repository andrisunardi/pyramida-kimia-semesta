@section('title', trans('index.office'))
@section('icon', 'fas fa-building')

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
                @can('office.add')
                    <div class="col col-sm-auto">
                        <x-components::link.add :href="route('cms.office.add')" />
                    </div>
                @endcan

                @can('office.export')
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
                            <th>{{ trans('index.address') }}</th>
                            <th width="1%">{{ trans('index.phone') }}</th>
                            <th width="1%">{{ trans('index.active') }}</th>
                            <th width="1%">{{ trans('index.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($offices as $key => $office)
                            <tr wire:key="{{ $key }}">
                                <td class="text-center">
                                    {{ ($offices->currentPage() - 1) * $offices->perPage() + $loop->iteration }}
                                </td>
                                <td class="text-center">
                                    <x-components::link :href="route('cms.office.detail', [
                                        'office' => $office,
                                    ])" :text="$office->id" />
                                </td>
                                <td>
                                    @if ($office->checkImage())
                                        <x-components::image :href="$office->assetImage()" :src="$office->assetImage()" :alt="$office->altImage()" />
                                    @endif
                                </td>
                                <td>
                                    <x-components::link :href="route('cms.office.detail', [
                                        'office' => $office,
                                    ])" :text="$office->name" />
                                </td>
                                <td class="text-wrap">
                                    <x-components::link.external-link :href="$office->maps" :text="$office->address" />
                                </td>
                                <td>
                                    <x-components::link.whatsapp :value="$office->phone" />
                                </td>
                                <td class="text-center">
                                    @can('office.edit')
                                        <x-components::form.switch :key="'changeActive'" :id="$office->id"
                                            :value="$office->is_active" />
                                    @else
                                        <span
                                            class="badge rounded-pill text-bg-{{ Utils::successDanger($office->is_active) }}">
                                            {{ Utils::translate(Utils::yesNo($office->is_active)) }}
                                        </span>
                                    @endcan
                                </td>
                                <td>
                                    @can('office.detail')
                                        <x-components::link.detail :size="'sm'" :width="'auto'"
                                            :href="route('cms.office.detail', [
                                                'office' => $office->id,
                                            ])" />
                                    @endcan

                                    @can('office.edit')
                                        <x-components::link.edit :size="'sm'" :width="'auto'" :href="route('cms.office.edit', [
                                            'office' => $office->id,
                                        ])" />
                                    @endcan

                                    @can('office.delete')
                                        <x-components::button.delete :size="'sm'" :width="'auto'"
                                            :key="'delete(' . $office->id . ')'" :confirm="trans('index.confirm')" />
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

            {{ $offices->links('components::components.layouts.pagination') }}
        </div>
    </div>
</main>
