@section('title', trans('index.testimony'))
@section('icon', 'fas fa-comments')

<main>
    @livewire('banner')

    <div class="section section-contents section-pad">
        <div class="container">
            <div class="row">
                <div class="row">
                    <div class="col-md-8">
                        <h1>{{ trans('index.testimony') }}</h1>
                        <div class="testimonials testimonials-list">
                            @foreach ($testimonies as $key => $testimony)
                                <div class="quotes">
                                    <div class="quotes-text">
                                        <p><i>{{ $testimony->message }}</i></p>
                                    </div>
                                    <div class="profile">
                                        <h5>{{ $testimony->name }}</h5>
                                        <h6>{{ $testimony->company }}</h6>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="sidebar-right">
                            <div class="wgs-box wgs-menus">
                                <div class="wgs-content">
                                    <ul class="list list-grouped">
                                        <li class="list-heading">
                                            <span>{{ trans('index.about') }} {{ trans('index.company') }}</span>
                                            <ul>
                                                <li>
                                                    <x-components::link :href="route('about')" :text="trans('index.about')" />
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <x-components::link :href="route('product.index')" :text="trans('index.product')" />
                                        </li>
                                        <li>
                                            <x-components::link :href="route('gallery')" :text="trans('index.gallery')" />
                                        </li>
                                        <li>
                                            <x-components::link :href="route('faq')" :text="trans('index.faq')" />
                                        </li>
                                        <li class="current">
                                            <x-components::link :href="route('testimony')" :text="trans('index.testimony')" />
                                        </li>
                                        <li>
                                            <x-components::link :href="route('contact')" :text="trans('index.contact')" />
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            @livewire('quick-contact')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
