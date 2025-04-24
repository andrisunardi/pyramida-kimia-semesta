<?php

namespace App\Livewire\CMS\Profile;

use App\Livewire\Component;
use App\Livewire\Forms\CMS\Profile\EditProfileForm;
use Illuminate\Contracts\View\View;

class EditProfilePage extends Component
{
    public EditProfileForm $form;

    public function mount(): void
    {
        $this->form->set();
    }

    public function resetFields(): void
    {
        $this->form->set();

        $this->alert('success', trans('index.reset').' '.trans('index.success'), [
            'html' => trans('index.fields_has_been_successfully_reseted'),
        ]);
    }

    public function submit(): void
    {
        $this->form->submit();

        $this->alert('success', trans('index.edit_profile').' '.trans('index.success'), [
            'html' => trans('index.your_profile_has_been_successfully_updated'),
        ]);

    }

    public function render(): View
    {
        return view('livewire.cms.profile.edit-profile');
    }
}
