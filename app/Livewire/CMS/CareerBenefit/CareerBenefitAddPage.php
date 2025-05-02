<?php

namespace App\Livewire\CMS\CareerBenefit;

use App\Livewire\Component;
use App\Livewire\Forms\CMS\CareerBenefit\CareerBenefitAddForm;
use Illuminate\Contracts\View\View;

class CareerBenefitAddPage extends Component
{
    public CareerBenefitAddForm $form;

    public function resetFields(): void
    {
        $this->form->reset();

        $this->alert('success', trans('index.reset').' '.trans('index.success'), [
            'html' => trans('index.fields_has_been_successfully_reseted'),
        ]);
    }

    public function submit(): void
    {
        $this->form->submit();

        $this->flash('success', trans('index.add').' '.trans('index.success'), [
            'html' => trans('index.career_benefit').' '.trans('index.has_been_successfully_added'),
        ]);

        $this->redirect(route('cms.career-benefit.index'), navigate: true);
    }

    public function render(): View
    {
        return view('livewire.cms.career-benefit.add');
    }
}
