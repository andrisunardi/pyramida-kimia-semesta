@section('title', trans('index.product_category'))
@section('icon', 'fas fa-tags')

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
                @can('product_category.add')
                    <div class="col col-sm-auto">
                        <x-components::link.add :href="route('cms.product-category.add')" />
                    </div>
                @endcan

                @can('product_category.export')
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
                            <th width="1%">{{ trans('index.active') }}</th>
                            <th width="1%">{{ trans('index.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($productCategories as $key => $productCategory)
                            <tr wire:key="{{ $key }}">
                                <td class="text-center">
                                    {{ ($productCategories->currentPage() - 1) * $productCategories->perPage() + $loop->iteration }}
                                </td>
                                <td class="text-center">
                                    <x-components::link :href="route('cms.product-category.detail', [
                                        'productCategory' => $productCategory,
                                    ])" :text="$productCategory->id" />
                                </td>
                                <td>
                                    @if ($productCategory->checkImage())
                                        <x-components::image :href="$productCategory->assetImage()" :src="$productCategory->assetImage()" :alt="$productCategory->altImage()" />
                                    @endif
                                </td>
                                <td>
                                    <div>
                                        <x-components::link :href="route('cms.product-category.detail', [
                                            'productCategory' => $productCategory,
                                        ])" :text="$productCategory->name" />
                                        <x-components::link.external-link :href="route('product.category', [
                                            'slug' => $productCategory->slug,
                                        ])" />
                                    </div>
                                    <div>
                                        <x-components::link :href="route('cms.product-category.detail', [
                                            'productCategory' => $productCategory,
                                        ])" :text="$productCategory->name_id" />
                                    </div>
                                    <div>
                                        <x-components::link :href="route('cms.product-category.detail', [
                                            'productCategory' => $productCategory,
                                        ])" :text="$productCategory->name_zh" />
                                    </div>
                                </td>
                                <td class="text-center">
                                    @can('product_category.edit')
                                        <x-components::form.switch :key="'changeActive'" :id="$productCategory->id"
                                            :value="$productCategory->is_active" />
                                    @else
                                        <span
                                            class="badge rounded-pill text-bg-{{ Utils::successDanger($productCategory->is_active) }}">
                                            {{ Utils::translate(Utils::yesNo($productCategory->is_active)) }}
                                        </span>
                                    @endcan
                                </td>
                                <td>
                                    @can('product_category.detail')
                                        <x-components::link.detail :size="'sm'" :width="'auto'"
                                            :href="route('cms.product-category.detail', [
                                                'productCategory' => $productCategory->id,
                                            ])" />
                                    @endcan

                                    @can('product_category.edit')
                                        <x-components::link.edit :size="'sm'" :width="'auto'" :href="route('cms.product-category.edit', [
                                            'productCategory' => $productCategory->id,
                                        ])" />
                                    @endcan

                                    @can('product_category.delete')
                                        <x-components::button.delete :size="'sm'" :width="'auto'"
                                            :key="'delete(' . $productCategory->id . ')'" :confirm="trans('index.confirm')" />
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

            {{ $productCategories->links('components::components.layouts.pagination') }}
        </div>
    </div>
</main>
