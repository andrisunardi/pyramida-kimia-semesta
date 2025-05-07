@section('title', trans('index.gallery'))
@section('icon', 'fas fa-gift')

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

                <div class="col-sm">
                    <x-components::search.select :key="'gallery_category_id'" :title="trans('validation.attributes.gallery_category_id')" :icon="'fas fa-tag'"
                        :datas="$galleryCategories" />
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
                @can('gallery.add')
                    <div class="col col-sm-auto">
                        <x-components::link.add :href="route('cms.gallery.add')" />
                    </div>
                @endcan

                @can('gallery.export')
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
                            <th width="1%">{{ trans('index.gallery') }}</th>
                            <th>{{ trans('index.name') }}</th>
                            <th width="1%">{{ trans('index.active') }}</th>
                            <th width="1%">{{ trans('index.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($galleries as $key => $gallery)
                            <tr wire:key="{{ $key }}">
                                <td class="text-center">
                                    {{ ($galleries->currentPage() - 1) * $galleries->perPage() + $loop->iteration }}
                                </td>
                                <td class="text-center">
                                    <x-components::link :href="route('cms.gallery.detail', [
                                        'gallery' => $gallery,
                                    ])" :text="$gallery->id" />
                                </td>
                                <td>
                                    @if ($gallery->checkImage())
                                        <x-components::image :href="$gallery->assetImage()" :src="$gallery->assetImage()" :alt="$gallery->altImage()" />
                                    @endif
                                </td>
                                <td>
                                    <x-components::link :href="route('cms.gallery-category.detail', [
                                        'galleryCategory' => $gallery->category->id,
                                    ])" :text="$gallery->category->name" />
                                </td>
                                <td>
                                    <div>
                                        <x-components::link :href="route('cms.gallery.detail', [
                                            'gallery' => $gallery,
                                        ])" :text="$gallery->name" />
                                    </div>
                                    <div>
                                        <x-components::link :href="route('cms.gallery.detail', [
                                            'gallery' => $gallery,
                                        ])" :text="$gallery->name_id" />
                                    </div>
                                    <div>
                                        <x-components::link :href="route('cms.gallery.detail', [
                                            'gallery' => $gallery,
                                        ])" :text="$gallery->name_zh" />
                                    </div>
                                </td>
                                <td class="text-center">
                                    @can('gallery.edit')
                                        <x-components::form.switch :key="'changeActive'" :id="$gallery->id"
                                            :value="$gallery->is_active" />
                                    @else
                                        <span
                                            class="badge rounded-pill text-bg-{{ Utils::successDanger($gallery->is_active) }}">
                                            {{ Utils::translate(Utils::yesNo($gallery->is_active)) }}
                                        </span>
                                    @endcan
                                </td>
                                <td>
                                    @can('gallery.detail')
                                        <x-components::link.detail :size="'sm'" :width="'auto'"
                                            :href="route('cms.gallery.detail', [
                                                'gallery' => $gallery->id,
                                            ])" />
                                    @endcan

                                    @can('gallery.edit')
                                        <x-components::link.edit :size="'sm'" :width="'auto'" :href="route('cms.gallery.edit', [
                                            'gallery' => $gallery->id,
                                        ])" />
                                    @endcan

                                    @can('gallery.delete')
                                        <x-components::button.delete :size="'sm'" :width="'auto'"
                                            :key="'delete(' . $gallery->id . ')'" :confirm="trans('index.confirm')" />
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

            {{ $galleries->links('components::components.layouts.pagination') }}
        </div>
    </div>
</main>
