@section('title', trans('index.gallery'))
@section('icon', 'fas fa-images')

<main>
    <div class="card mb-3">
        <div class="card-header text-bg-info">
            <x-components::icon :value="'fas fa-list'" />
            {{ trans('index.detail') }} @yield('title')
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-auto">
                    <x-components::link.back :width="'100'" :href="route('cms.gallery.index')" />
                </div>
            </div>

            <hr />

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.id') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $gallery->id }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.category') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    <x-components::link :href="route('cms.gallery-category.detail', [
                        'galleryCategory' => $gallery->category->id,
                    ])" :text="$gallery->category->name" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.name') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $gallery->name }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.name_id') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $gallery->name_id }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.name_zh') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $gallery->name_zh }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.description') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {!! $gallery->description !!}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.description_id') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {!! $gallery->description_id !!}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.description_zh') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {!! $gallery->description_zh !!}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.image') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-2">
                    @if ($gallery->checkImage())
                        <x-components::image :href="$gallery->assetImage()" :src="$gallery->assetImage()" :alt="$gallery->altImage()" />
                    @endif
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.active') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @can('gallery.edit')
                        <x-components::form.switch :key="'changeActive'" :id="$gallery->id" :value="$gallery->is_active" />
                    @else
                        <span class="badge rounded-pill text-bg-{{ Utils::successDanger($gallery->is_active) }}">
                            {{ Utils::translate(Utils::yesNo($gallery->is_active)) }}
                        </span>
                    @endcan
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.created_by') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($gallery->createdBy)
                        <x-components::link.user :data="$gallery->createdBy" />
                    @endif
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.updated_by') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($gallery->updatedBy)
                        <x-components::link.user :data="$gallery->updatedBy" />
                    @endif
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.created_at') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($gallery->created_at)
                        {{ $gallery->created_at->isoFormat('LLLL') }}
                        <br class="d-lg-none">
                        ({{ $gallery->created_at->diffForHumans() }})
                    @endif
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.updated_at') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($gallery->updated_at)
                        {{ $gallery->updated_at->isoFormat('LLLL') }}
                        <br class="d-lg-none">
                        ({{ $gallery->updated_at->diffForHumans() }})
                    @endif
                </div>
            </div>

            <hr />

            <div class="row">
                @can('gallery.edit')
                    <div class="col-6 col-sm-auto">
                        <x-components::link.edit :width="'100'" :href="route('cms.gallery.edit', [
                            'gallery' => $gallery->id,
                        ])" />
                    </div>
                @endcan
                @can('gallery.delete')
                    <div class="col-6 col-sm-auto">
                        <x-components::button.delete :width="'100'" :key="'delete(' . $gallery->id . ')'" :confirm="trans('index.confirm')" />
                    </div>
                @endcan
            </div>
        </div>
    </div>

    @livewire('c-m-s.loader')

</main>
