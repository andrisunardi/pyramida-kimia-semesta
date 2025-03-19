@section('title', trans('index.testimony'))
@section('icon', 'fas fa-comments')

<main>
    @livewire('banner')

    <div class="section section-contents section-pad">
        <div class="container">
            <div class="row">
                <h1>{{ trans('index.testimony') }}</h1>
                <div class="row row-quotes">
                    @foreach ($this->getTestimonies()->chunk(ceil($this->getTestimonies()->count() / 2)) as $chunk)
                        <div class="col-md-6">
                            @foreach ($chunk as $testimony)
                                <div class="quotes quotes-flat">
                                    <div class="quotes-text">
                                        <h5>“{{ $testimony->message }}”</h5>
                                        {{-- <p>{{ $testimony->message }}</p> --}}
                                    </div>
                                    <div class="profile">
                                        <h5>{{ $testimony->name }}</h5>
                                        <h6>{{ $testimony->company }}</h6>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

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
                        @livewire('sidebar-right')
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
