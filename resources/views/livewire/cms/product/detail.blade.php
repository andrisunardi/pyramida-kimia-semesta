@section('title', trans('index.product'))
@section('icon', 'fas fa-flask')

<main>
    <div class="card mb-3">
        <div class="card-header text-bg-info">
            <x-components::icon :value="'fas fa-list'" />
            {{ trans('index.detail') }} @yield('title')
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-auto">
                    <x-components::link.back :width="'100'" :href="route('cms.product.index')" />
                </div>
            </div>

            <hr />

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.id') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $product->id }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.category') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $product->category->name }}
                    <x-components::link.external-link :href="route('product.category', [
                        'slug' => $product->category->slug,
                    ])" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.name') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $product->name }}
                    <x-components::link.external-link :href="route('product.view', [
                        'slug' => $product->slug,
                    ])" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.name_id') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $product->name_id }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.name_zh') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $product->name_zh }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.description') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {!! $product->description !!}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.description_id') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {!! $product->description_id !!}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.description_zh') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {!! $product->description_zh !!}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.image') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-2">
                    @if ($product->checkImage())
                        <x-components::image :href="$product->assetImage()" :src="$product->assetImage()" :alt="$product->altImage()" />
                    @endif
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.file_coa') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($product->checkFileCoa())
                        <x-components::iframe :src="$product->assetFileCoa()" />
                    @endif
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.file_msds') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($product->checkFileMsds())
                        <x-components::iframe :src="$product->assetFileMsds()" />
                    @endif
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.slug') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $product->slug }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.active') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @can('product.edit')
                        <x-components::form.switch :key="'changeActive'" :id="$product->id" :value="$product->is_active" />
                    @else
                        <span class="badge rounded-pill text-bg-{{ Utils::successDanger($product->is_active) }}">
                            {{ Utils::translate(Utils::yesNo($product->is_active)) }}
                        </span>
                    @endcan
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.created_by') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($product->createdBy)
                        <x-components::link.user :data="$product->createdBy" />
                    @endif
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.updated_by') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($product->updatedBy)
                        <x-components::link.user :data="$product->updatedBy" />
                    @endif
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.created_at') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($product->created_at)
                        {{ $product->created_at->isoFormat('LLLL') }}
                        <br class="d-lg-none">
                        ({{ $product->created_at->diffForHumans() }})
                    @endif
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.updated_at') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($product->updated_at)
                        {{ $product->updated_at->isoFormat('LLLL') }}
                        <br class="d-lg-none">
                        ({{ $product->updated_at->diffForHumans() }})
                    @endif
                </div>
            </div>

            <hr />

            <div class="row">
                @can('product.edit')
                    <div class="col-6 col-sm-auto">
                        <x-components::link.edit :width="'100'" :href="route('cms.product.edit', [
                            'product' => $product->id,
                        ])" />
                    </div>
                @endcan
                @can('product.delete')
                    <div class="col-6 col-sm-auto">
                        <x-components::button.delete :width="'100'" :key="'delete(' . $product->id . ')'" :confirm="trans('index.confirm')" />
                    </div>
                @endcan
            </div>
        </div>
    </div>

    @livewire('c-m-s.loader')

</main>
