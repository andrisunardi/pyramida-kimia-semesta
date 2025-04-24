<?php

namespace App\Livewire\CMS\Profile;

use App\Livewire\Component;
use App\Livewire\Forms\CMS\Profile\ChangePasswordForm;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordPage extends Component
{
    public ChangePasswordForm $form;

    public $currentPasswordVisibility = false;

    public $newPasswordVisibility = false;

    public $newPasswordConfirmationVisibility = false;

    public function resetFields(): void
    {
        $this->form->set();

        $this->alert('success', trans('index.reset').' '.trans('index.success'), [
            'html' => '',
        ]);

    }

    public function submit(): void
    {
        $data = $this->form->validate();

        if (! Hash::check($data['current_password'], Auth::user()->password)) {
            $this->alert('error', trans('index.change_password_failed'), [
                'html' => trans('index.current_password_is_incorrect'),
            ]);

            return;
        }

        if ($data['new_password'] != $data['new_password_confirmation']) {
            $this->alert('error', trans('index.change_password_failed'), [
                'html' => trans('index.new_password_and_confirm_password_does_not_match'),
            ]);

            return;
        }

        (new UserService)->changePassword(user: Auth::user(), data: $data);

        $this->form->reset();
        $this->resetValidation();

        $this->alert('success', trans('index.change_password_success'), [
            'html' => trans('index.forgot_password_success'),
        ]);

    }

    public function render()
    {
        return view('livewire.cms.profile.change-password');
    }
}
