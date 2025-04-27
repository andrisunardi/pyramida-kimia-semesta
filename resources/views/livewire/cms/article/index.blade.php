@section('title', trans('index.article'))
@section('icon', 'fas fa-newspaper')

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
                @can('article.export')
                    <div class="col-auto col-sm-auto">
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
                            <th>{{ trans('index.company') }}</th>
                            <th>{{ trans('index.email') }}</th>
                            <th>{{ trans('index.phone') }}</th>
                            <th width="1%">{{ trans('index.active') }}</th>
                            <th width="1%">{{ trans('index.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($articles as $key => $article)
                            <tr wire:key="{{ $key }}">
                                <td class="text-center">
                                    {{ ($articles->currentPage() - 1) * $articles->perPage() + $loop->iteration }}
                                </td>
                                <td class="text-center">
                                    <x-components::link :href="route('cms.article.detail', [
                                        'article' => $article,
                                    ])" :text="$article->id" />
                                </td>
                                <td class="text-wrap">
                                    {{ $article->name }}
                                </td>
                                <td class="text-wrap">
                                    {{ $article->company }}
                                </td>
                                <td>
                                    <x-components::link.email :value="$article->email" />
                                </td>
                                <td>
                                    <x-components::link.whatsapp :value="$article->phone" />
                                </td>
                                <td class="text-center">
                                    @can('article.edit')
                                        <x-components::form.switch :key="'changeActive'" :id="$article->id" :value="$article->is_active" />
                                    @else
                                        <span
                                            class="badge rounded-pill text-bg-{{ Utils::successDanger($article->is_active) }}">
                                            {{ Utils::translate(Utils::yesNo($article->is_active)) }}
                                        </span>
                                    @endcan
                                </td>
                                <td>
                                    @can('article.detail')
                                        <x-components::link.detail :size="'sm'" :width="'auto'"
                                            :href="route('cms.article.detail', [
                                                'article' => $article->id,
                                            ])" />
                                    @endcan

                                    @can('article.delete')
                                        <x-components::button.delete :size="'sm'" :width="'auto'"
                                            :key="'delete(' . $article->id . ')'" :confirm="trans('index.confirm')" />
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

            {{ $articles->links('components::components.layouts.pagination') }}
        </div>
    </div>
</main>
