<li class="nav-item dropdown">
    <button class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        @if (App::isLocale('en'))
            <img draggable="false"class="me-1 rounded" width="30" height="20"
                src="{{ asset('images/flag/en.webp') }}"
                alt="{{ trans('index.flag') }}  - {{ trans('index.english') }} - {{ env('APP_TITLE') }}">
            {{ trans('index.english') }}
        @elseif(App::isLocale('id'))
            <img draggable="false" class="me-1 rounded" width="30" height="20"
                src="{{ asset('images/flag/id.webp') }}"
                alt="{{ trans('index.flag') }}  - {{ trans('index.indonesia') }} - {{ env('APP_TITLE') }}">
            {{ trans('index.indonesia') }}
        @elseif(App::isLocale('zh'))
            <img draggable="false" class="me-1 rounded" width="30" height="20"
                src="{{ asset('images/flag/zh.webp') }}"
                alt="{{ trans('index.flag') }}  - {{ trans('index.chinese') }} - {{ env('APP_TITLE') }}">
            {{ trans('index.chinese') }}
        @endif
    </button>

    <ul class="dropdown-menu dropdown-menu-end">
        <li>
            <a draggable="false" class="dropdown-item" href="{{ route('locale', ['locale' => 'en']) }}">
                <img draggable="false" class="me-1 rounded" width="30" height="20"
                    src="{{ asset('images/flag/en.webp') }}"
                    alt="{{ trans('index.flag') }}  - {{ trans('index.english') }} - {{ env('APP_TITLE') }}">
                {{ trans('index.english') }}
            </a>
        </li>
        <li>
            <a draggable="false" class="dropdown-item" href="{{ route('locale', ['locale' => 'id']) }}">
                <img draggable="false" class="me-1 rounded" width="30" height="20"
                    src="{{ asset('images/flag/id.webp') }}"
                    alt="{{ trans('index.flag') }}  - {{ trans('index.indonesia') }} - {{ env('APP_TITLE') }}">
                {{ trans('index.indonesia') }}
            </a>
        </li>
        <li>
            <a draggable="false" class="dropdown-item" href="{{ route('locale', ['locale' => 'zh']) }}">
                <img draggable="false" class="me-1 rounded" width="30" height="20"
                    src="{{ asset('images/flag/zh.webp') }}"
                    alt="{{ trans('index.flag') }}  - {{ trans('index.chinese') }} - {{ env('APP_TITLE') }}">
                {{ trans('index.chinese') }}
            </a>
        </li>
    </ul>
</li>
