<header class="site-header header-s1 is-sticky">

    @livewire('layouts.topbar')

    <div class="navbar navbar-primary">
        <div class="container">
            <a draggable="false" class="navbar-brand" href="{{ route('index') }}" wire:navigate>
                <img draggable="false" class="logo logo-dark" alt="" src="{{ asset('images/logo/logo.png') }}"
                    srcset="{{ asset('images/logo/logo.png') }} 2x">
                <img draggable="false" class="logo logo-light" alt="" src="{{ asset('images/logo/logo.png') }}"
                    srcset="{{ asset('images/logo/logo.png') }} 2x">
            </a>

            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mainnav"
                    aria-expanded="false">
                    <span class="sr-only">{{ trans('index.menu') }}</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="quote-btn">
                    <a draggable="false" class="btn" href="get-a-quote.html" wire:navigate>
                        Enquire Today
                    </a>
                </div>
            </div>

            <nav class="navbar-collapse collapse" id="mainnav">
                <ul class="nav navbar-nav">
                    <li>
                        <a draggable="false" href="{{ route('index') }}" wire:navigate>
                            <span class="fas fa-home"></span>
                            {{ trans('index.home') }}
                        </a>
                    </li>
                    <li>
                        <a draggable="false" href="{{ route('contact') }}" wire:navigate>
                            <span class="fas fa-phone"></span>
                            {{ trans('index.contact') }}
                        </a>
                    </li>
                    <li class="quote-btn"><a class="btn" href="get-a-quote.html">Enquire Today</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>
