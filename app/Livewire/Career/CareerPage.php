<?php

namespace App\Livewire\Career;

use App\Livewire\Component;
use App\Services\CareerBenefitService;
use App\Services\CareerService;
use Illuminate\Contracts\View\View;

class CareerPage extends Component
{
    public function getCareers(): object
    {
        return (new CareerService)->index(
            isActive: [true],
            paginate: false,
        );
    }

    public function getCareerBenefits(): object
    {
        return (new CareerBenefitService)->index(
            isActive: [true],
            limit: 6,
            paginate: false,
        );
    }

    public function render(): View
    {
        return view('livewire.career.index', [
            'careers' => $this->getCareers(),
            'careerBenefits' => $this->getCareerBenefits(),
        ]);
    }
}
