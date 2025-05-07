@section('title', trans('index.product'))
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
                @can('product.add')
                    <div class="col col-sm-auto">
                        <x-components::link.add :href="route('cms.product.add')" />
                    </div>
                @endcan

                @can('product.export')
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
                            <th width="1%">{{ trans('index.category') }}</th>
                            <th>{{ trans('index.name') }}</th>
                            <th width="1%">{{ trans('index.file_coa') }}</th>
                            <th width="1%">{{ trans('index.file_msds') }}</th>
                            <th width="1%">{{ trans('index.active') }}</th>
                            <th width="1%">{{ trans('index.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $key => $product)
                            <tr wire:key="{{ $key }}">
                                <td class="text-center">
                                    {{ ($products->currentPage() - 1) * $products->perPage() + $loop->iteration }}
                                </td>
                                <td class="text-center">
                                    <x-components::link :href="route('cms.product.detail', [
                                        'product' => $product,
                                    ])" :text="$product->id" />
                                </td>
                                <td>
                                    @if ($product->checkImage())
                                        <x-components::image :href="$product->assetImage()" :src="$product->assetImage()" :alt="$product->altImage()" />
                                    @endif
                                </td>
                                <td>
                                    <x-components::link :href="route('cms.product-category.detail', [
                                        'productCategory' => $product->category->id,
                                    ])" :text="$product->category->name" />

                                    <x-components::link.external-link :href="route('product.category', [
                                        'slug' => $product->category->slug,
                                    ])" />
                                </td>
                                <td>
                                    <div>
                                        <x-components::link :href="route('cms.product.detail', [
                                            'product' => $product,
                                        ])" :text="$product->name" />

                                        <x-components::link.external-link :href="route('product.view', [
                                            'slug' => $product->slug,
                                        ])" />
                                    </div>
                                    <div>
                                        <x-components::link :href="route('cms.product.detail', [
                                            'product' => $product,
                                        ])" :text="$product->name_id" />
                                    </div>
                                    <div>
                                        <x-components::link :href="route('cms.product.detail', [
                                            'product' => $product,
                                        ])" :text="$product->name_zh" />
                                    </div>
                                </td>
                                <td class="text-center">
                                    @if ($product->checkFileCoa())
                                        <div>
                                            <x-components::link.view :class="'btn btn-danger btn-sm w-100'" :icon="'fas fa-file-pdf'"
                                                :href="$product->assetFileCoa()" :target="'_blank'" :navigate="false" />
                                        </div>
                                        <div class="mt-2">
                                            <x-components::link.download :size="'sm'" :href="$product->assetFileCoa()" />
                                        </div>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if ($product->checkFileMsds())
                                        <div>
                                            <x-components::link.view :class="'btn btn-danger btn-sm w-100'" :icon="'fas fa-file-pdf'"
                                                :href="$product->assetFileMsds()" :target="'_blank'" :navigate="false" />
                                        </div>
                                        <div class="mt-2">
                                            <x-components::link.download :size="'sm'" :href="$product->assetFileMsds()" />
                                        </div>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @can('product.edit')
                                        <x-components::form.switch :key="'changeActive'" :id="$product->id"
                                            :value="$product->is_active" />
                                    @else
                                        <span
                                            class="badge rounded-pill text-bg-{{ Utils::successDanger($product->is_active) }}">
                                            {{ Utils::translate(Utils::yesNo($product->is_active)) }}
                                        </span>
                                    @endcan
                                </td>
                                <td>
                                    @can('product.detail')
                                        <x-components::link.detail :size="'sm'" :width="'auto'"
                                            :href="route('cms.product.detail', [
                                                'product' => $product->id,
                                            ])" />
                                    @endcan

                                    @can('product.edit')
                                        <x-components::link.edit :size="'sm'" :width="'auto'" :href="route('cms.product.edit', [
                                            'product' => $product->id,
                                        ])" />
                                    @endcan

                                    @can('product.delete')
                                        <x-components::button.delete :size="'sm'" :width="'auto'"
                                            :key="'delete(' . $product->id . ')'" :confirm="trans('index.confirm')" />
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

            {{ $products->links('components::components.layouts.pagination') }}
        </div>
    </div>
</main>
