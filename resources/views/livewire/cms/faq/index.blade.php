@section('title', trans('index.faq'))
@section('icon', 'fas fa-question')

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
                @can('faq.add')
                    <div class="col col-sm-auto">
                        <x-components::link.add :href="route('cms.faq.add')" />
                    </div>
                @endcan

                @can('faq.export')
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
                            <th>{{ trans('index.question') }}</th>
                            <th width="1%">{{ trans('index.active') }}</th>
                            <th width="1%">{{ trans('index.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($faqs as $key => $faq)
                            <tr wire:key="{{ $key }}">
                                <td class="text-center">
                                    {{ ($faqs->currentPage() - 1) * $faqs->perPage() + $loop->iteration }}
                                </td>
                                <td class="text-center">
                                    <x-components::link :href="route('cms.faq.detail', [
                                        'faq' => $faq,
                                    ])" :text="$faq->id" />
                                </td>
                                <td>
                                    <div>
                                        <x-components::link :href="route('cms.faq.detail', [
                                            'faq' => $faq,
                                        ])" :text="$faq->question" />
                                    </div>
                                    <div>
                                        <x-components::link :href="route('cms.faq.detail', [
                                            'faq' => $faq,
                                        ])" :text="$faq->question_id" />
                                    </div>
                                    <div>
                                        <x-components::link :href="route('cms.faq.detail', [
                                            'faq' => $faq,
                                        ])" :text="$faq->question_zh" />
                                    </div>
                                </td>
                                <td class="text-center">
                                    @can('faq.edit')
                                        <x-components::form.switch :key="'changeActive'" :id="$faq->id"
                                            :value="$faq->is_active" />
                                    @else
                                        <span
                                            class="badge rounded-pill text-bg-{{ Utils::successDanger($faq->is_active) }}">
                                            {{ Utils::translate(Utils::yesNo($faq->is_active)) }}
                                        </span>
                                    @endcan
                                </td>
                                <td>
                                    @can('faq.detail')
                                        <x-components::link.detail :size="'sm'" :width="'auto'"
                                            :href="route('cms.faq.detail', [
                                                'faq' => $faq->id,
                                            ])" />
                                    @endcan

                                    @can('faq.edit')
                                        <x-components::link.edit :size="'sm'" :width="'auto'" :href="route('cms.faq.edit', [
                                            'faq' => $faq->id,
                                        ])" />
                                    @endcan

                                    @can('faq.delete')
                                        <x-components::button.delete :size="'sm'" :width="'auto'"
                                            :key="'delete(' . $faq->id . ')'" :confirm="trans('index.confirm')" />
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

            {{ $faqs->links('components::components.layouts.pagination') }}
        </div>
    </div>
</main>
