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
                            @livewire('menu-sidebar')

                            @livewire('quick-contact')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
