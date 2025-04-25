@section('title', trans('index.activity_log') . ' - ' . trans('index.profile'))
@section('icon', 'fas fa-user-clock')

<main>
    @livewire('c-m-s.profile.menu-component')

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header text-bg-info">
                    <x-components::icon :value="'fas fa-user-clock'" />
                    @yield('title')
                </div>

                <div class="card-body">
                    <div class="list-group mb-3">
                        @forelse ($activities as $activity)
                            <button class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1 text-capitalize">
                                        {{ $activity->log_name }} - {{ $activity->subject_id }}
                                    </h5>
                                    <small>{{ Utils::translate($activity->event) }}</small>
                                </div>
                                <p class="mb-1">{!! $activity->description !!}</p>
                                <div><small>{{ $activity->causer->name }}</small></div>
                                <small>
                                    {{ $activity->created_at->isoFormat('LLLL') }}<br class="d-sm-none">
                                    ({{ $activity->created_at->diffForHumans() }})
                                </small>
                                <hr>
                                <div class="row">
                                    <div class="col-6">
                                        @if (Arr::exists($activity->changes, ['old']))
                                            <h6>{{ trans('index.old') }}</h6>
                                            <pre><code>{{ json_encode($activity->changes['old'], JSON_PRETTY_PRINT) }}</code></pre>
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        @if (Arr::exists($activity->changes, ['attributes']))
                                            <h6>{{ trans('index.attributes') }}</h6>
                                            <pre><code>{{ json_encode($activity->changes['attributes'], JSON_PRETTY_PRINT) }}</code></pre>
                                        @endif
                                    </div>
                                </div>
                            </button>
                        @empty
                            <div class="text-center">
                                {{ trans('index.no_data_available') }}
                            </div>
                        @endforelse
                    </div>

                    {{ $activities->links('components::components.layouts.pagination') }}
                </div>
            </div>
        </div>
    </div>
</main>
