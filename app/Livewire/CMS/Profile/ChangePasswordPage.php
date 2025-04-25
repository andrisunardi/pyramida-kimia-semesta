<?php

namespace App\Livewire\CMS\Profile;

use App\Livewire\Component;
use App\Livewire\Forms\CMS\Profile\ChangePasswordForm;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordPage extends Component
{
    public ChangePasswordForm $form;

    public bool $currentPasswordVisibility = false;

    public bool $newPasswordVisibility = false;

    public bool $newPasswordConfirmationVisibility = false;

    public function resetFields(): void
    {
        $this->form->set();

        $this->alert('success', trans('index.reset').' '.trans('index.success'), [
            'html' => trans('index.fields_has_been_successfully_reseted'),
        ]);
    }

    public function submit(): void
    {
        if (! Hash::check($this->form->current_password, Auth::user()->password)) {
            $this->alert('error', trans('index.change_password_failed'), [
                'html' => trans('index.current_password_is_incorrect'),
            ]);

            return;
        }

        $this->form->submit();

        $this->alert('success', trans('index.change_password_success'), [
            'html' => trans('index.forgot_password_success'),
        ]);

    }

    public function render(): View
    {
        return view('livewire.cms.profile.change-password');
    }
}
