<?php

namespace App\Livewire\CMS\ForgotPassword;

use App\Livewire\Component;
use App\Livewire\Forms\CMS\ForgotPassword\ForgotPasswordForm;
use Illuminate\Support\Facades\Auth;

class ForgotPasswordPage extends Component
{
    public ForgotPasswordForm $form;

    public function mount(): void
    {
        if (Auth::check()) {
            $this->flash('info', trans('index.login_failed'), [
                'html' => trans('index.you_already_login'),
            ]);

            $this->redirect(route('cms.index'), navigate: true);
        }
    }

    public function submit(): void
    {
        $result = $this->form->submit();

        if (! $result) {
            $this->alert('error', trans('index.forgot_password_failed'), [
                'html' => trans('index.username_or_email_or_phone_is_invalid'),
            ]);

            return;
        }

        $this->flash('success', trans('index.forgot_password_success'), [
            'html' => trans('validation.attributes.new_password')." : {$result}",
        ]);

        $this->redirect(route('cms.login'), navigate: true);
    }

    public function render()
    {
        return view('livewire.cms.forgot-password.index');
    }
}
