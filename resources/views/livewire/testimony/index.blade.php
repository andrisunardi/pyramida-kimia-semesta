@section('title', trans('index.testimony'))
@section('icon', 'fas fa-comments')

<main>
    @livewire('banner')

    <div class="section section-contents section-pad">
        <div class="container">
            <div class="row">
                <h1>{{ trans('index.testimony') }}</h1>
                <div class="row row-quotes">
                    <div class="col-md-6">

                        <div class="quotes quotes-flat">
                            <div class="quotes-text">
                                <h5>“I have been a loyal customer of this company since 1999 (18 years!)”</h5>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                    laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                                    architecto beatae vitae dicta sunt explicabo enim ipsam.</p>
                            </div>
                            <div class="profile">
                                <h5>David Alone</h5>
                                <h6>CEO, Company Name</h6>
                            </div>
                        </div>
                        <!-- // -->
                        <div class="quotes quotes-flat">
                            <div class="quotes-text">
                                <p>I was looking for an mining solution iste natus error sit voluptatem accusantium
                                    doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritati
                                    iste natus sit.</p>
                            </div>
                            <div class="profile">
                                <h5>Newman H.</h5>
                            </div>
                        </div>
                        <!-- // -->
                        <div class="quotes quotes-flat">
                            <div class="quotes-text">
                                <p>I was looking for best solution and iste natus error sit voluptatem accusantium
                                    doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritati
                                    totam rem.</p>
                            </div>
                            <div class="profile">
                                <h5>Robert W.</h5>
                                <h6>CEO, Company Name</h6>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">

                        <div class="quotes quotes-flat">
                            <div class="quotes-text">
                                <h5>“This firm is tops in customer service.”</h5>
                                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                    laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis ciatis
                                    unde omnis iste natus.</p>
                            </div>
                            <div class="profile">
                                <h5>Maribel M.</h5>
                                <h6>CEO, Company Name</h6>
                            </div>
                        </div>
                        <!-- // -->
                        <div class="quotes quotes-flat">
                            <div class="quotes-text">
                                <p>Nemo enim ipsam ut perspiciatis unde omnis iste natus error sit voluptatem
                                    accusantium doloremque laudantium, totam rem aperiam. Eaque ipsa quae ab illo
                                    inventore veritatis et quasi architecto beatae vitae dicta sunt explic.</p>
                            </div>
                            <div class="profile">
                                <h5>Jimmy Alan</h5>
                            </div>
                        </div>
                        <!-- // -->
                        <div class="quotes quotes-flat">
                            <div class="quotes-text">
                                <p>Nemo enim ipsam ut perspiciatis unde omnis iste natus error sit voluptatem
                                    accusantium doloremque laudantium rem aperill.</p>
                            </div>
                            <div class="profile">
                                <h5>Williams Jhon</h5>
                            </div>
                        </div>

                    </div>
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
