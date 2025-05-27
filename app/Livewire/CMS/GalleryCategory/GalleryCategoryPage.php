<?php

namespace App\Livewire\CMS\GalleryCategory;

use App\Exports\GalleryCategoryExport;
use App\Livewire\Component;
use App\Models\GalleryCategory;
use App\Services\GalleryCategoryService;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Url;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class GalleryCategoryPage extends Component
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

    public function changeActive(GalleryCategory $galleryCategory): void
    {
        (new GalleryCategoryService)->active(galleryCategory: $galleryCategory);

        $this->alert('success', trans('index.change').' '.trans('index.active').' '.trans('index.success'), [
            'html' => trans('index.gallery_category').' '.trans('index.has_been_successfully_changed'),
        ]);
    }

    public function delete(GalleryCategory $galleryCategory): void
    {
        (new GalleryCategoryService)->delete(galleryCategory: $galleryCategory);

        $this->alert('success', trans('index.delete').' '.trans('index.success'), [
            'html' => trans('index.gallery_category').' '.trans('index.has_been_successfully_deleted'),
        ]);
    }

    public function getGalleryCategories(bool $paginate = true): object
    {
        $galleryCategories = (new GalleryCategoryService)->index(
            search: $this->search,
            isActive: $this->is_active,
            paginate: $paginate,
        );

        $galleryCategories->loadCount(['galleries']);

        return $galleryCategories;
    }

    public function exportToExcel(): BinaryFileResponse
    {
        $this->alert('success', trans('index.export_to_excel').' '.trans('index.success'), [
            'html' => trans('index.gallery_category').' '.trans('index.has_been_successfully_exported'),
        ]);

        return Excel::download(new GalleryCategoryExport(
            galleryCategories: $this->getGalleryCategories(paginate: false),
        ), trans('index.gallery_category').'.xlsx');
    }

    public function render(): View
    {
        return view('livewire.cms.gallery-category.index', [
            'galleryCategories' => $this->getGalleryCategories(),
        ]);
    }
}
