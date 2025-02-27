<?php

namespace App\Livewire\Contact;

use App\Livewire\Component;
use App\Livewire\Forms\ContactForm;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactPage extends Component
{
    public ContactForm $form;

    public function mount()
    {
        $this->form->set();
    }

    public function submit()
    {
        $contact = $this->form->submit();

        if (env('APP_ENV') == 'production') {
            Mail::to('contact@'.env('APP_DOMAIN'))->send(new ContactMail($contact));
        }

        $this->form->set();

        return $this->alert('success', 'Add Success', [
            'html' => 'Area has been successfully added.',
        ]);
    }

    public function render()
    {
        return view('livewire.contact.index');
    }
}
