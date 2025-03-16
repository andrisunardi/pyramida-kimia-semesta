<div class="section section-quotes section-pad bg-light">
    <div class="container">
        <div class="content row">
            <div class="col-md-offset-2 col-md-8 center">
                <h2 class="heading-section">
                    @if (App::isLocale('en'))
                        What Our Client Say's
                    @endif

                    @if (App::isLocale('id'))
                        我们的客户怎么说
                    @endif

                    @if (App::isLocale('zh'))
                        客户评价
                    @endif
                </h2>
            </div>

            <div class="gaps"></div>

            <div class="testimonials">
                <div id="testimonial" class="quotes-slider col-md-8 col-md-offset-2">
                    <div class="owl-carousel loop has-carousel" data-items="1" data-loop="true" data-dots="true"
                        data-auto="true">
                        @foreach ($testimonies as $key => $testimony)
                            <div class="item">
                                <div class="quotes">
                                    <div class="quotes-text center">
                                        <p>{!! $testimony->message !!}</p>
                                    </div>
                                    <div class="profile">
                                        <h5>{{ $testimony->name }}</h5>
                                        <h6>{{ $testimony->company }}</h6>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
