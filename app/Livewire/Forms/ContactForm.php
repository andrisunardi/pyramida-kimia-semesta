<?php

namespace App\Livewire\Forms;

use App\Models\Contact;
use App\Services\ContactService;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ContactForm extends Form
{
    #[Validate('required|string|min:1|max:50')]
    public string $name;

    #[Validate('required|string|min:1|max:50')]
    public string $company;

    #[Validate('required|email:rfc,dns|regex:/^\S*$/u|min:1|max:50')]
    public string $email;

    #[Validate('required|string|min:1|max:15')]
    public string $phone;

    #[Validate('required|string|min:1|max:100')]
    public string $subject;

    #[Validate('required|string|min:1|max:1000')]
    public string $message;

    public function set(): void
    {
        $this->reset();
    }

    public function submit(): Contact
    {
        return (new ContactService)->create(data: $this->validate());
    }
}
