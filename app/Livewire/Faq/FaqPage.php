<?php

namespace App\Livewire\Faq;

use App\Livewire\Component;
use App\Services\FaqService;
use Illuminate\Contracts\View\View;

class FaqPage extends Component
{
    public function getFaqs(): object
    {
        return (new FaqService)->index(
            isActive: [true],
            paginate: false,
        );
    }

    public function render(): View
    {
        return view('livewire.faq.index', [
            'faqs' => $this->getFaqs(),
        ]);
    }
}
