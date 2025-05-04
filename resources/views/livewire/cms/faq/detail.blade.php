@section('title', trans('index.faq'))
@section('icon', 'fas fa-question')

<main>
    <div class="card mb-3">
        <div class="card-header text-bg-info">
            <x-components::icon :value="'fas fa-list'" />
            {{ trans('index.detail') }} @yield('title')
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-auto">
                    <x-components::link.back :width="'100'" :href="route('cms.faq.index')" />
                </div>
            </div>

            <hr />

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.id') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $faq->id }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.question') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $faq->question }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.question_id') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $faq->question_id }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.question_zh') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $faq->question_zh }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.answer') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {!! $faq->answer !!}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.answer_id') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {!! $faq->answer_id !!}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.answer_zh') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {!! $faq->answer_zh !!}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.active') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @can('faq.edit')
                        <x-components::form.switch :key="'changeActive'" :id="$faq->id" :value="$faq->is_active" />
                    @else
                        <span class="badge rounded-pill text-bg-{{ Utils::successDanger($faq->is_active) }}">
                            {{ Utils::translate(Utils::yesNo($faq->is_active)) }}
                        </span>
                    @endcan
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.created_by') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($faq->createdBy)
                        <x-components::link.user :data="$faq->createdBy" />
                    @endif
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.updated_by') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($faq->updatedBy)
                        <x-components::link.user :data="$faq->updatedBy" />
                    @endif
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.created_at') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($faq->created_at)
                        {{ $faq->created_at->isoFormat('LLLL') }}
                        <br class="d-lg-none">
                        ({{ $faq->created_at->diffForHumans() }})
                    @endif
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.updated_at') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($faq->updated_at)
                        {{ $faq->updated_at->isoFormat('LLLL') }}
                        <br class="d-lg-none">
                        ({{ $faq->updated_at->diffForHumans() }})
                    @endif
                </div>
            </div>

            <hr />

            <div class="row">
                @can('faq.edit')
                    <div class="col-6 col-sm-auto">
                        <x-components::link.edit :width="'100'" :href="route('cms.faq.edit', [
                            'faq' => $faq->id,
                        ])" />
                    </div>
                @endcan
                @can('faq.delete')
                    <div class="col-6 col-sm-auto">
                        <x-components::button.delete :width="'100'" :key="'delete(' . $faq->id . ')'" :confirm="trans('index.confirm')" />
                    </div>
                @endcan
            </div>
        </div>
    </div>

    @livewire('c-m-s.loader')

</main>
