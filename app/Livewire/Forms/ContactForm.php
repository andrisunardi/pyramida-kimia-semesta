<?php

namespace App\Livewire\Forms;

use App\Services\ContactService;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ContactForm extends Form
{
    #[Validate('required|string|min:1|max:50')]
    public $name;

    #[Validate('required|string|min:1|max:50')]
    public $company;

    #[Validate('required|email:rfc,dns|regex:/^\S*$/u|min:1|max:50')]
    public $email;

    #[Validate('required|string|min:1|max:15')]
    public $phone;

    #[Validate('required|string|min:1|max:100')]
    public $subject;

    #[Validate('required|string|min:1|max:1000')]
    public $message;

    public function set()
    {
        $this->reset();
    }

    public function submit()
    {
        return (new ContactService)->create(data: $this->validate());
    }
}
