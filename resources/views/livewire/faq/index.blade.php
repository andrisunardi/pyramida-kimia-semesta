@section('title', trans('index.faq'))
@section('icon', 'fas fa-question')

<main>
    @livewire('banner')

    <div class="section section-contents section-pad">
        <div class="container">
            <div class="content row">
                <div class="row">
                    <div class="col-md-8">
                        <h1>{{ trans('index.frequently_asked_questions') }}</h1>
                        <p>
                            @if (App::isLocale('en'))
                                Get all the answers to the most frequently asked questions (FAQs) regarding industry,
                                research, development and much, much more.
                            @endif
                            @if (App::isLocale('id'))
                                Dapatkan semua jawaban atas pertanyaan yang paling sering diajukan (FAQ) mengenai
                                industri, penelitian, pengembangan, dan banyak lagi.
                            @endif
                            @if (App::isLocale('zh'))
                                获取有关行业、研究、开发等所有常见问题 (FAQ) 的答案。
                            @endif
                        </p>
                        <div class="panel-group accordion faqs" id="faq" role="tablist" aria-multiselectable="true">
                            @foreach ($faqs as $key => $faq)
                                <div class="panel panel-default" wire:key="{{ $key }}">
                                    <div class="panel-heading" role="tab" id="faq-id-{{ $faq->id }}">
                                        <h4 class="panel-title">
                                            <a draggable="false" class="collapsed" role="button" data-toggle="collapse"
                                                data-parent="#faq" href="#faq-{{ $faq->id }}"
                                                aria-expanded="false">
                                                {{ $faq->translate_question }}
                                                <span class="plus-minus"><span></span></span>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="faq-{{ $faq->id }}" class="panel-collapse collapse" role="tabpanel"
                                        aria-labelledby="faq-id-{{ $faq->id }}">
                                        <div class="panel-body">
                                            <p>{!! $faq->translate_answer !!}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <hr>

                        <h2>
                            @if (App::isLocale('en'))
                                Few More thing you should know
                            @endif
                            @if (App::isLocale('id'))
                                Beberapa hal lagi yang harus Anda ketahui
                            @endif
                            @if (App::isLocale('zh'))
                                您应该知道的一些事情
                            @endif
                        </h2>
                        <div class="faqs-row faqs-s2">
                            @foreach ($faqs as $key => $faq)
                                <div class="faqs" wire:key="{{ $key }}">
                                    <h3 class="faq-heading">{{ $faq->translate_question }}</h3>
                                    <p>{!! $faq->translate_answer !!}</p>
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
