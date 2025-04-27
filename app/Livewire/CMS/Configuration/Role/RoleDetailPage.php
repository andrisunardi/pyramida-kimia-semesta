<?php

namespace App\Livewire\CMS\Configuration\Role;

use App\Livewire\Component;
use Spatie\Permission\Models\Role;

class RoleDetailPage extends Component
{
    public $role;

    public function mount(Role $role) {}

    public function render()
    {
        return view('livewire.cms.configuration.role.detail');
    }
}
