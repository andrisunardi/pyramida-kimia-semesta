<?php

namespace App\Livewire\Faq;

use App\Livewire\Component;
use App\Services\FaqService;

class FaqPage extends Component
{
    public function getFaqs()
    {
        return (new FaqService)->index(
            isActive: [true],
            paginate: false,
        );
    }

    public function render()
    {
        return view('livewire.faq.index', [
            'faqs' => $this->getFaqs(),
        ]);
    }
}
