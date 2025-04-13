@section('title', trans('index.view') . ' - ' . trans('index.contact'))
@section('icon', 'fas fa-eye')

<div>
    <div class="card mb-3">
        <div class="card-header {{ $contact->trashed() ? 'bg-danger-subtle' : 'bg-primary-subtle' }}">
            <span class="fas fa-eye fa-fw"></span>
            {{ trans('index.detail') }} {{ trans('index.contact') }}
        </div>

        <div class="card-body">
            <div class="row g-3 mb-3">
                <div class="col-6 col-sm-auto">
                    <x-components::link.back :href="route('cms.contact.index')" />
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.id') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $contact->id }}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.name') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $contact->name }}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.company') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $contact->company }}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.email') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    <a draggable="false" href="mailto:{{ $contact->email }}">
                        {{ $contact->email }}
                    </a>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.phone') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    <a draggable="false"
                        href="https://api.whatsapp.com/send?phone={{ Utils::phone($contact->phone) }}">
                        {{ $contact->phone }}
                    </a>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.subject') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {{ $contact->subject }}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.message') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    {!! $contact->message !!}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.active') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    <span class="badge bg-{{ Utils::successDanger($contact->is_active) }}">
                        {{ Utils::translate(Utils::yesNo($contact->is_active)) }}
                    </span>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.created_by') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($contact->createdBy)
                        <x-components::link.user :data="$contact->createdBy" />
                    @endif
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.updated_by') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($contact->updatedBy)
                        <x-components::link.user :data="$contact->updatedBy" />
                    @endif
                </div>
            </div>

            @if ($contact->trashed())
                <div class="row mb-2">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <h6>{{ trans('index.deleted_by') }}</h6>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        @if ($contact->deletedBy)
                            <x-components::link.user :data="$contact->deletedBy" />
                        @endif
                    </div>
                </div>
            @endif

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.created_at') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($contact->created_at)
                        {{ $contact->created_at->isoFormat('LLLL') }}
                        <br class="d-lg-none">
                        ({{ $contact->created_at->diffForHumans() }})
                    @endif
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                    <h6>{{ trans('index.updated_at') }}</h6>
                </div>
                <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                    @if ($contact->updated_at)
                        {{ $contact->updated_at->isoFormat('LLLL') }}
                        <br class="d-lg-none">
                        ({{ $contact->updated_at->diffForHumans() }})
                    @endif
                </div>
            </div>

            @if ($contact->trashed())
                <div class="row mb-2">
                    <div class="col-sm-5 col-md-4 col-lg-3 col-xl-2">
                        <h6>{{ trans('index.deleted_at') }}</h6>
                    </div>
                    <div class="col-sm-7 col-md-8 col-lg-9 col-xl-10">
                        @if ($contact->deleted_at)
                            {{ $contact->deleted_at->isoFormat('LLLL') }}
                            <br class="d-lg-none">
                            ({{ $contact->deleted_at->diffForHumans() }})
                        @endif
                    </div>
                </div>
            @endif

            <div class="row g-3">
                @if ($contact->trashed())
                    @can('Contact Restore')
                        <div class="col-12 col-sm-auto">
                            <x-components::link.restore :href="route('cms.contact.restore', [
                                'contact' => $contact->id,
                            ])" />
                        </div>
                    @endcan

                    @can('Contact Delete Permanent')
                        <div class="col-12 col-sm-auto">
                            <x-components::link.delete-permanent :href="route('cms.contact.delete-permanent', [
                                'contact' => $contact->id,
                            ])" />
                        </div>
                    @endcan
                @else
                    @can('Contact Active')
                        <div class="col-6 col-sm-auto">
                            <x-components::link.active :href="route('cms.contact.active', [
                                'contact' => $contact->id,
                            ])" :value="$contact->is_active" />
                        </div>
                    @endcan

                    @can('Contact Clone')
                        <div class="col-6 col-sm-auto">
                            <x-components::link.clone :href="route('cms.contact.clone', [
                                'contact' => $contact->id,
                            ])" />
                        </div>
                    @endcan

                    @can('Contact Edit')
                        <div class="col-6 col-sm-auto">
                            <x-components::link.edit :href="route('cms.contact.edit', [
                                'contact' => $contact->id,
                            ])" />
                        </div>
                    @endcan

                    @can('Contact Delete')
                        <div class="col-6 col-sm-auto">
                            <x-components::link.delete :href="route('cms.contact.delete', [
                                'contact' => $contact->id,
                            ])" />
                        </div>
                    @endcan
                @endif
            </div>
        </div>

        <div class="card-footer {{ $contact->trashed() ? 'bg-danger-subtle' : 'bg-primary-subtle' }}"></div>
    </div>
</div>
