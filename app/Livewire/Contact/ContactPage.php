<?php

namespace App\Livewire\Contact;

use App\Livewire\Component;
use App\Livewire\Forms\ContactForm;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\App;
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

        if (App::environment('production')) {
            Mail::to('contact@'.env('APP_DOMAIN'))->send(new ContactMail($contact));
        }

        return $this->alert('success', trans('index.thank_you_for_contacting_us'), [
            'html' => trans('index.thank_you_for_contacting_us_we_will_reply_to_your_message_as_soon_as_possible'),
        ]);
    }

    public function render()
    {
        return view('livewire.contact.index');
    }
}
