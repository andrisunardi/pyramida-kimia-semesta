<?php

namespace App\Livewire\CMS\Contact;

use App\Livewire\Component;
use App\Services\ContactService;

class ContactRestoreAll extends Component
{
    public function mount()
    {
        (new ContactService)->restoreAll();

        $this->flash(
            'success',
            trans('index.all').' - '.trans('index.contact').' - '.trans('index.restored'),
        );

        return redirect()->route('cms.contact.trash');
    }
}
