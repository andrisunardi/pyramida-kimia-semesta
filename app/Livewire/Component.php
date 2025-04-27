<?php

namespace App\Livewire;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component as LivewireComponent;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Component extends LivewireComponent
{
    use LivewireAlert;
    use WithFileUploads;
    use WithPagination;

    public function refresh(): void
    {
        $this->alert('success', trans('index.refresh').' '.trans('index.success'), [
            'html' => trans('index.page_has_been_successfully_refreshed'),
        ]);
    }

    public function getBgClasses(): object
    {
        return collect([
            'bg-primary',
            'bg-success',
            'bg-warning',
            'bg-danger',
            'bg-info',
            'bg-secondary',
        ]);
    }

    public function resetFile(): void
    {
        $this->reset(['file']);
    }

    public function resetImage(): void
    {
        $this->reset(['image']);
    }

    public function resetVideo(): void
    {
        $this->reset(['video']);
    }
}
