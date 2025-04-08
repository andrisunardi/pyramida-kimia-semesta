<li class="nav-item dropdown">
    <button class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="fas fa-palette fa-fw"></span>
        {{ trans('index.theme') }}
    </button>
    <ul class="dropdown-menu">
        <li>
            <button class="dropdown-item" data-bs-theme-value="light">
                <span class="fas fa-sun fa-fw"></span>
                {{ trans('index.light') }}
            </button>
        </li>
        <li>
            <button class="dropdown-item" data-bs-theme-value="dark">
                <span class="fas fa-moon fa-fw"></span>
                {{ trans('index.dark') }}
            </button>
        </li>
        <li>
            <button class="dropdown-item" data-bs-theme-value="auto">
                <span class="fas fa-circle-half-stroke fa-fw"></span>
                {{ trans('index.auto') }}
            </button>
        </li>
    </ul>
</li>
