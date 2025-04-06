<?php

namespace App\Livewire\CMS\Login;

use App\Livewire\Component;
use App\Livewire\Forms\CMS\Login\LoginForm;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class LoginPage extends Component
{
    public LoginForm $form;

    public function mount(): void
    {
        if (Auth::check()) {
            $this->flash('info', trans('index.login_failed'), [
                'html' => trans('index.you_already_login'),
            ]);

            $this->redirect(route('cms.index'), navigate: true);

            return;
        }
    }

    public function rules(): array
    {
        return [
            'username' => 'required|string|max:50|exists:users,username',
            'password' => 'required|string|max:50',
            'remember' => 'nullable|boolean',
        ];
    }

    public function submit()
    {
        $result = $this->form->submit();

        if ($result) {
            $this->flash('success', trans('index.login_success'), [
                'html' => trans('index.login_has_been_successfully'),
            ]);

            return $this->redirect(session()->pull('url.intended', route('cms.index')), navigate: true);
        }

        $this->alert('error', trans('index.login_failed'), [
            'html' => trans('index.username_or_password_is_invalid'),
        ]);
    }

    public function render(): View
    {
        return view('livewire.cms.login.index');
    }
}
