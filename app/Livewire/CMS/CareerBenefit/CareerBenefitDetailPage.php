<?php

namespace App\Livewire\CMS\CareerBenefit;

use App\Livewire\Component;
use App\Models\CareerBenefit;
use App\Services\CareerBenefitService;
use Illuminate\Contracts\View\View;

class CareerBenefitDetailPage extends Component
{
    public CareerBenefit $careerBenefit;

    public function mount(CareerBenefit $careerBenefit): void
    {
        $this->careerBenefit = $careerBenefit;
    }

    public function changeActive(CareerBenefit $careerBenefit): void
    {
        (new CareerBenefitService)->active(careerBenefit: $careerBenefit);

        $this->alert('success', trans('index.change').' '.trans('index.active').' '.trans('index.success'), [
            'html' => trans('index.career_benefit').' '.trans('index.has_been_successfully_changed'),
        ]);
    }

    public function delete(CareerBenefit $careerBenefit): void
    {
        (new CareerBenefitService)->delete(careerBenefit: $careerBenefit);

        $this->flash('success', trans('index.delete').' '.trans('index.success'), [
            'html' => trans('index.career_benefit').' '.trans('index.has_been_successfully_deleted'),
        ]);

        $this->redirect(route('cms.career-benefit.index'), navigate: true);
    }

    public function render(): View
    {
        return view('livewire.cms.career-benefit.detail');
    }
}
