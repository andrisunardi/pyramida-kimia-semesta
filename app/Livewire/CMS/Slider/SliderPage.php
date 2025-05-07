<?php

namespace App\Livewire\CMS\Slider;

use App\Exports\SliderExport;
use App\Livewire\Component;
use App\Models\Slider;
use App\Services\SliderService;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Url;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class SliderPage extends Component
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

    public function changeActive(Slider $slider): void
    {
        (new SliderService)->active(slider: $slider);

        $this->alert('success', trans('index.change').' '.trans('index.active').' '.trans('index.success'), [
            'html' => trans('index.slider').' '.trans('index.has_been_successfully_changed'),
        ]);
    }

    public function delete(Slider $slider): void
    {
        (new SliderService)->delete(slider: $slider);

        $this->alert('success', trans('index.delete').' '.trans('index.success'), [
            'html' => trans('index.slider').' '.trans('index.has_been_successfully_deleted'),
        ]);
    }

    public function getSliders(bool $paginate = true): object
    {
        return (new SliderService)->index(
            search: $this->search,
            isActive: $this->is_active,
            paginate: $paginate,
        );
    }

    public function exportToExcel(): BinaryFileResponse
    {
        $this->alert('success', trans('index.delete').' '.trans('index.success'), [
            'html' => trans('index.slider').' '.trans('index.has_been_successfully_exported'),
        ]);

        return Excel::download(new SliderExport(
            sliders: $this->getSliders(paginate: false),
        ), trans('index.slider').'.xlsx');
    }

    public function render(): View
    {
        return view('livewire.cms.slider.index', [
            'sliders' => $this->getSliders(),
        ]);
    }
}
