<?php

namespace App\Livewire\CMS\Configuration\Permission;

use App\Livewire\Component;
use App\Services\PermissionService;
use App\Services\RoleService;

class PermissionPage extends Component
{
    public $role_id = '';

    public $name = '';

    public $guard_name = '';

    public $queryString = [
        'role_id',
        'name',
        'guard_name',
    ];

    public function updating()
    {
        $this->resetPage();
    }

    public function resetFields()
    {
        $this->resetPage();

        $this->reset([
            'role_id',
            'name',
            'guard_name',
        ]);
    }

    public function getRoles()
    {
        return (new RoleService)->index(orderBy: 'name', sortBy: 'asc');
    }

    public function getPermissions()
    {
        return (new PermissionService)->index(
            role_id: $this->role_id,
            name: $this->name,
            guard_name: $this->guard_name,
        );
    }

    public function render()
    {
        return view('livewire.cms.configuration.permission.index', [
            'roles' => $this->getRoles(),
            'permissions' => $this->getPermissions(),
        ]);
    }
}
