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
