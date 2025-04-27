@section('title', trans('index.article'))
@section('icon', 'fas fa-newspaper')

<main>
    <div class="card mb-3">
        <div class="card-header text-bg-info">
            <x-components::icon :value="'fas fa-list'" />
            {{ trans('index.detail') }} @yield('title')
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-auto">
                    <x-components::link.back :width="'100'" :href="route('cms.article.index')" />
                </div>
            </div>

            <hr />

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.id') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $article->id }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.name') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $article->name }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.company') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $article->company }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.email') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    <x-components::link.email :value="$article->email" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.phone') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    <x-components::link.whatsapp :value="$article->phone" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.subject') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $article->subject }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.message') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {!! $article->message !!}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.active') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @can('article.edit')
                        <x-components::form.switch :key="'changeActive'" :id="$article->id" :value="$article->is_active" />
                    @else
                        <span class="badge rounded-pill text-bg-{{ Utils::successDanger($article->is_active) }}">
                            {{ Utils::translate(Utils::yesNo($article->is_active)) }}
                        </span>
                    @endcan
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.created_by') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($article->createdBy)
                        <x-components::link.user :data="$article->createdBy" />
                    @endif
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.updated_by') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($article->updatedBy)
                        <x-components::link.user :data="$article->updatedBy" />
                    @endif
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.created_at') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($article->created_at)
                        {{ $article->created_at->isoFormat('LLLL') }}
                        <br class="d-lg-none">
                        ({{ $article->created_at->diffForHumans() }})
                    @endif
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.updated_at') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($article->updated_at)
                        {{ $article->updated_at->isoFormat('LLLL') }}
                        <br class="d-lg-none">
                        ({{ $article->updated_at->diffForHumans() }})
                    @endif
                </div>
            </div>

            <hr />

            <div class="row">
                @can('article.delete')
                    <div class="col-6 col-sm-auto">
                        <x-components::button.delete :size="'md'" :width="'100'" :key="'delete(' . $article->id . ')'"
                            :confirm="trans('index.confirm')" />
                    </div>
                @endcan
            </div>
        </div>
    </div>

    @livewire('c-m-s.loader')

</main>
