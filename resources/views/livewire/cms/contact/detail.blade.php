@section('title', trans('index.contact'))
@section('icon', 'fas fa-phone')

<main>
    <div class="card mb-3">
        <div class="card-header text-bg-info">
            <x-components::icon :value="'fas fa-list'" />
            {{ trans('index.detail') }} @yield('title')
        </div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-auto">
                    <x-components::link.back :width="'100'" :href="route('cms.contact.index')" />
                </div>
            </div>

            <hr />

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.id') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $contact->id }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.name') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $contact->name }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.company') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $contact->company }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.email') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    <x-components::link.email :value="$contact->email" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.phone') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    <x-components::link.whatsapp :value="$contact->phone" />
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.subject') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $contact->subject }}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.message') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {!! $contact->message !!}
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.active') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @can('contact.edit')
                        <x-components::form.switch :key="'changeActive'" :id="$contact->id" :value="$contact->is_active" />
                    @else
                        <span class="badge rounded-pill text-bg-{{ Utils::successDanger($contact->is_active) }}">
                            {{ Utils::translate(Utils::yesNo($contact->is_active)) }}
                        </span>
                    @endcan
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.created_by') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($contact->createdBy)
                        <x-components::link.user :data="$contact->createdBy" />
                    @endif
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.updated_by') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($contact->updatedBy)
                        <x-components::link.user :data="$contact->updatedBy" />
                    @endif
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.created_at') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($contact->created_at)
                        {{ $contact->created_at->isoFormat('LLLL') }}
                        <br class="d-lg-none">
                        ({{ $contact->created_at->diffForHumans() }})
                    @endif
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <div class="fw-bold">{{ trans('index.updated_at') }}</div>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($contact->updated_at)
                        {{ $contact->updated_at->isoFormat('LLLL') }}
                        <br class="d-lg-none">
                        ({{ $contact->updated_at->diffForHumans() }})
                    @endif
                </div>
            </div>

            <hr />

            <div class="row">
                @can('contact.delete')
                    <div class="col-6 col-sm-auto">
                        <x-components::button.delete :width="'100'" :key="'delete(' . $contact->id . ')'" :confirm="trans('index.confirm')" />
                    </div>
                @endcan
            </div>
        </div>
    </div>

    @livewire('c-m-s.loader')

</main>
