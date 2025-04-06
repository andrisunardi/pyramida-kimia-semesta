@section('title', trans('index.partner'))
@section('icon', 'fas fa-users')

<main>
    @livewire('banner')

    <div class="section section-contents section-pad">
        <div class="container">
            <div class="content row">
                <div class="row">
                    <div class="col-md-8">
                        <h1>Investors Centre</h1>
                        @foreach ($partners as $key => $partner)
                            <div class="client-logo row space-top-md">
                                <div class="col-sm-4 col-xs-6 res-m-bttm-xs">
                                    <x-components::image :href="$partner->link" :src="$partner->assetImage()" :alt="$partner->altImage()" />
                                </div>
                                <div class="col-sm-8 col-xs-12">
                                    <strong>{{ $partner->translate_name }}</strong>
                                    <p>{!! $partner->translate_description !!}</p>
                                    <x-components::link.external-link :icon="''" :href="$partner->link"
                                        :text="Str::after($partner->link, '://')" />
                                </div>
                            </div>
                        @endforeach

                        <div class="gaps"></div>
                        <hr>

                        <h4>
                            Investor Fact Sheet
                        </h4>
                        <p>
                            Learn more about dolor sit amet consectetur to adipiscing elit eiusmod tempor incididunt
                            labore et dolore magna aliqua, adipiscing elit eiusmod tempor incididunt labore.
                        </p>
                        <p>
                            <a href="#" class="btn btn-md">Download</a>
                        </p>

                        <hr>

                        <h4>
                            Latest Presentation
                        </h4>
                        <p>
                            Find out why assets are core for the amet consectetur to adipiscing elit eiusmod tempor
                            incididunt labore.
                        </p>
                        <p>
                            <a href="#" class="btn btn-md">Download</a>
                        </p>

                        <hr>

                        <h4>
                            Analyst Coverage
                        </h4>
                        <p>
                            Review a list of Analysts elit eiusmod tempor incididunt labore et dolore magna aliqua.
                        </p>
                        <p>
                            <a href="#" class="btn btn-md">View Details</a>
                        </p>
                    </div>

                    <div class="col-md-4">
                        @livewire('sidebar-right')
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
