<?php

namespace App\Livewire\CMS\CareerBenefit;

use App\Livewire\Component;
use App\Livewire\Forms\CMS\CareerBenefit\CareerBenefitEditForm;
use App\Models\CareerBenefit;

class CareerBenefitEditPage extends Component
{
    public CareerBenefitEditForm $form;

    public CareerBenefit $careerBenefit;

    public function mount(CareerBenefit $careerBenefit): void
    {
        $this->careerBenefit = $careerBenefit;
        $this->form->set(careerBenefit: $careerBenefit);
    }

    public function resetFields(): void
    {
        $this->form->set(careerBenefit: $this->careerBenefit);

        $this->alert('success', trans('index.reset').' '.trans('index.success'), [
            'html' => trans('index.fields_has_been_successfully_reseted'),
        ]);
    }

    public function submit(): void
    {
        $this->form->submit(careerBenefit: $this->careerBenefit);

        $this->flash('success', trans('index.edit').' '.trans('index.success'), [
            'html' => trans('index.career_benefit').' '.trans('index.has_been_successfully_edited'),
        ]);

        $this->redirect(route('cms.career-benefit.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.cms.career-benefit.edit');
    }
}
