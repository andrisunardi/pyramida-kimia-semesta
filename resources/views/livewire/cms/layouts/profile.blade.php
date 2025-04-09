<li class="nav-item dropdown">
    <button class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
        aria-expanded="false">
        <img draggable="false" class="rounded-circle me-1" width="30" height="30"
            src="{{ Auth::user()->assetImage() }}" alt="{{ Auth::user()->altImage() }}">
        {{ Auth::user()->name }}
    </button>
    <ul class="dropdown-menu dropdown-menu-end">
        <li>
            <a draggable="false" class="dropdown-item" aria-current="page"
                href="{{ route('cms.profile.index') }}" wire:navigate>
                <span class="fas fa-user fa-fw me-1"></span>
                {{ trans('index.profile') }}
            </a>
        </li>
        <li>
            <a draggable="false" class="dropdown-item" aria-current="page"
                href="{{ route('cms.profile.activity-log') }}" wire:navigate>
                <span class="fas fa-user-clock fa-fw me-1"></span>
                {{ trans('index.activity_log') }}
            </a>
        </li>
        <li>
            <a draggable="false" class="dropdown-item" aria-current="page"
                href="{{ route('cms.profile.edit-profile') }}" wire:navigate>
                <span class="fas fa-user-edit fa-fw me-1"></span>
                {{ trans('index.edit_profile') }}
            </a>
        </li>
        <li>
            <a draggable="false" class="dropdown-item" aria-current="page"
                href="{{ route('cms.profile.change-password') }}" wire:navigate>
                <span class="fas fa-user-lock fa-fw me-1"></span>
                {{ trans('index.change_password') }}
            </a>
        </li>
        <li>
            <a draggable="false" class="dropdown-item" aria-current="page"
                href="{{ route('cms.logout') }}">
                <span class="fas fa-sign-out-alt fa-fw me-1"></span>
                {{ trans('index.logout') }}
            </a>
        </li>
    </ul>
</li>
