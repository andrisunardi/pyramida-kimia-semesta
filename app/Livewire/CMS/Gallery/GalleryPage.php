<?php

namespace App\Livewire\CMS\Gallery;

use App\Exports\GalleryExport;
use App\Livewire\Component;
use App\Models\Gallery;
use App\Services\GalleryCategoryService;
use App\Services\GalleryService;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Url;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class GalleryPage extends Component
{
    #[Url(except: '')]
    public $gallery_category_id = '';

    #[Url(except: '')]
    public $search = '';

    #[Url(except: [])]
    public $is_active = [];

    public function resetFields(): void
    {
        $this->resetPage();

        $this->reset([
            'gallery_category_id',
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

    public function changeActive(Gallery $gallery): void
    {
        (new GalleryService)->active(gallery: $gallery);

        $this->alert('success', trans('index.change').' '.trans('index.active').' '.trans('index.success'), [
            'html' => trans('index.gallery').' '.trans('index.has_been_successfully_changed'),
        ]);
    }

    public function delete(Gallery $gallery): void
    {
        (new GalleryService)->delete(gallery: $gallery);

        $this->alert('success', trans('index.delete').' '.trans('index.success'), [
            'html' => trans('index.gallery').' '.trans('index.has_been_successfully_deleted'),
        ]);
    }

    public function getGalleries(bool $paginate = true): object
    {
        return (new GalleryService)->index(
            search: $this->search,
            galleryCategoryId: $this->gallery_category_id,
            isActive: $this->is_active,
            paginate: $paginate,
        );
    }

    public function exportToExcel(): BinaryFileResponse
    {
        $this->alert('success', trans('index.delete').' '.trans('index.success'), [
            'html' => trans('index.gallery').' '.trans('index.has_been_successfully_exported'),
        ]);

        return Excel::download(new GalleryExport(
            galleries: $this->getGalleries(paginate: false),
        ), trans('index.gallery').'.xlsx');
    }

    public function getGalleryCategories(): object
    {
        return (new GalleryCategoryService)->index(
            isActive: [true],
            orderBy: 'name',
            sortBy: 'asc',
            paginate: false,
        );
    }

    public function render(): View
    {
        return view('livewire.cms.gallery.index', [
            'galleryCategories' => $this->getGalleryCategories(),
            'galleries' => $this->getGalleries(),
        ]);
    }
}
