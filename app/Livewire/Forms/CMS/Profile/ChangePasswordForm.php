<?php

namespace App\Livewire\Forms\CMS\Profile;

use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ChangePasswordForm extends Form
{
    #[Validate('required|string|min:1|max:50')]
    public string $current_password = '';

    #[Validate('required|string|min:1|max:50|same:new_password_confirmation')]
    public string $new_password = '';

    #[Validate('required|string|min:1|max:50|same:new_password')]
    public string $new_password_confirmation = '';

    public function set(): void
    {
        $this->reset();
    }

    public function submit(): void
    {
        $data = $this->validate();

        (new UserService)->changePassword(user: Auth::user(), data: $data);
    }
}
