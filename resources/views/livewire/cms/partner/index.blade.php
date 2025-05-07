@section('title', trans('index.partner'))
@section('icon', 'fas fa-users')

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
                @can('partner.add')
                    <div class="col col-sm-auto">
                        <x-components::link.add :href="route('cms.partner.add')" />
                    </div>
                @endcan

                @can('partner.export')
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
                            <th width="1%">{{ trans('index.link') }}</th>
                            <th width="1%">{{ trans('index.active') }}</th>
                            <th width="1%">{{ trans('index.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($partners as $key => $partner)
                            <tr wire:key="{{ $key }}">
                                <td class="text-center">
                                    {{ ($partners->currentPage() - 1) * $partners->perPage() + $loop->iteration }}
                                </td>
                                <td class="text-center">
                                    <x-components::link :href="route('cms.partner.detail', [
                                        'partner' => $partner,
                                    ])" :text="$partner->id" />
                                </td>
                                <td>
                                    @if ($partner->checkImage())
                                        <x-components::image :href="$partner->assetImage()" :src="$partner->assetImage()" :alt="$partner->altImage()" />
                                    @endif
                                </td>
                                <td>
                                    <div>
                                        <x-components::link :href="route('cms.partner.detail', [
                                            'partner' => $partner,
                                        ])" :text="$partner->name" />
                                    </div>
                                    <div>
                                        <x-components::link :href="route('cms.partner.detail', [
                                            'partner' => $partner,
                                        ])" :text="$partner->name_id" />
                                    </div>
                                    <div>
                                        <x-components::link :href="route('cms.partner.detail', [
                                            'partner' => $partner,
                                        ])" :text="$partner->name_zh" />
                                    </div>
                                </td>
                                <td>
                                    <x-components::link.external-link :href="$partner->link" :text="$partner->link" />
                                </td>
                                <td class="text-center">
                                    @can('partner.edit')
                                        <x-components::form.switch :key="'changeActive'" :id="$partner->id"
                                            :value="$partner->is_active" />
                                    @else
                                        <span
                                            class="badge rounded-pill text-bg-{{ Utils::successDanger($partner->is_active) }}">
                                            {{ Utils::translate(Utils::yesNo($partner->is_active)) }}
                                        </span>
                                    @endcan
                                </td>
                                <td>
                                    @can('partner.detail')
                                        <x-components::link.detail :size="'sm'" :width="'auto'"
                                            :href="route('cms.partner.detail', [
                                                'partner' => $partner->id,
                                            ])" />
                                    @endcan

                                    @can('partner.edit')
                                        <x-components::link.edit :size="'sm'" :width="'auto'" :href="route('cms.partner.edit', [
                                            'partner' => $partner->id,
                                        ])" />
                                    @endcan

                                    @can('partner.delete')
                                        <x-components::button.delete :size="'sm'" :width="'auto'"
                                            :key="'delete(' . $partner->id . ')'" :confirm="trans('index.confirm')" />
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

            {{ $partners->links('components::components.layouts.pagination') }}
        </div>
    </div>
</main>
