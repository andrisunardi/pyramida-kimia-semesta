<?php

namespace App\Livewire\CMS\CareerBenefit;

use App\Exports\CareerBenefitExport;
use App\Livewire\Component;
use App\Models\CareerBenefit;
use App\Services\CareerBenefitService;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Url;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class CareerBenefitPage extends Component
{
    #[Url(except: '')]
    public $search = '';

    #[Url(except: [])]
    public $is_active = [];

    public function resetFields(): void
    {
        $this->resetPage();

        $this->reset([
            'search',
            'is_active',
        ]);

        $this->alert('success', trans('index.reset').' '.trans('index.success'), [
            'html' => trans('index.fields_has_been_successfully_reseted'),
        ]);
    }

    public function updating(): void
    {
        $this->resetPage();
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

        $this->alert('success', trans('index.delete').' '.trans('index.success'), [
            'html' => trans('index.career_benefit').' '.trans('index.has_been_successfully_deleted'),
        ]);
    }

    public function getCareerBenefits(bool $paginate = true): object
    {
        return (new CareerBenefitService)->index(
            search: $this->search,
            isActive: $this->is_active,
            paginate: $paginate,
        );
    }

    public function exportToExcel(): BinaryFileResponse
    {
        $this->alert('success', trans('index.export_to_excel').' '.trans('index.success'), [
            'html' => trans('index.career_benefit').' '.trans('index.has_been_successfully_exported'),
        ]);

        return Excel::download(new CareerBenefitExport(
            careerBenefits: $this->getCareerBenefits(paginate: false),
        ), trans('index.career_benefit').'.xlsx');
    }

    public function render(): View
    {
        return view('livewire.cms.career-benefit.index', [
            'careerBenefits' => $this->getCareerBenefits(),
        ]);
    }
}
