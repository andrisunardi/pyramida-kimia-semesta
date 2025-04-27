@section('title', trans('index.contact'))
@section('icon', 'fas fa-phone')

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
                @can('contact.export')
                    <div class="col-auto col-sm-auto">
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
                            <th>{{ trans('index.name') }}</th>
                            <th>{{ trans('index.company') }}</th>
                            <th>{{ trans('index.email') }}</th>
                            <th>{{ trans('index.phone') }}</th>
                            <th width="1%">{{ trans('index.active') }}</th>
                            <th width="1%">{{ trans('index.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($contacts as $key => $contact)
                            <tr wire:key="{{ $key }}">
                                <td class="text-center">
                                    {{ ($contacts->currentPage() - 1) * $contacts->perPage() + $loop->iteration }}
                                </td>
                                <td class="text-center">
                                    <x-components::link :href="route('cms.contact.detail', [
                                        'contact' => $contact,
                                    ])" :text="$contact->id" />
                                </td>
                                <td class="text-wrap">
                                    {{ $contact->name }}
                                </td>
                                <td class="text-wrap">
                                    {{ $contact->company }}
                                </td>
                                <td>
                                    <x-components::link.email :value="$contact->email" />
                                </td>
                                <td>
                                    <x-components::link.whatsapp :value="$contact->phone" />
                                </td>
                                <td class="text-center">
                                    @can('contact.edit')
                                        <x-components::form.switch :key="'changeActive'" :id="$contact->id" :value="$contact->is_active" />
                                    @else
                                        <span
                                            class="badge rounded-pill text-bg-{{ Utils::successDanger($contact->is_active) }}">
                                            {{ Utils::translate(Utils::yesNo($contact->is_active)) }}
                                        </span>
                                    @endcan
                                </td>
                                <td>
                                    @can('contact.detail')
                                        <x-components::link.detail :size="'sm'" :width="'auto'"
                                            :href="route('cms.contact.detail', [
                                                'contact' => $contact->id,
                                            ])" />
                                    @endcan

                                    @can('contact.delete')
                                        <x-components::button.delete :size="'sm'" :width="'auto'"
                                            :key="'delete(' . $contact->id . ')'" :confirm="trans('index.confirm')" />
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

            {{ $contacts->links('components::components.layouts.pagination') }}
        </div>
    </div>
</main>
