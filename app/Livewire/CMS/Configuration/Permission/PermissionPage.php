<?php

namespace App\Livewire\CMS\Configuration\Permission;

use App\Exports\PermissionExport;
use App\Livewire\Component;
use App\Services\PermissionService;
use App\Services\RoleService;
use App\Services\UserService;
use Livewire\Attributes\Url;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Permission;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class PermissionPage extends Component
{
    #[Url(except: '')]
    public string $search = '';

    #[Url(except: '')]
    public string $role_id = '';

    #[Url(except: '')]
    public string $user_id = '';

    public function resetFields(): void
    {
        $this->resetPage();

        $this->reset([
            'search',
            'role_id',
            'user_id',
        ]);

        $this->alert('success', trans('index.reset').' '.trans('index.success'), [
            'html' => trans('index.fields_has_been_successfully_reseted'),
        ]);
    }

    public function updating(): void
    {
        $this->resetPage();
    }

    public function delete(Permission $permission): void
    {
        (new PermissionService)->delete(permission: $permission);

        $this->alert('success', trans('index.delete').' '.trans('index.success'), [
            'html' => trans('index.permission').' '.trans('index.has_been_successfully_deleted'),
        ]);
    }

    public function getRoles(): object
    {
        return (new RoleService)->index(
            orderBy: 'name',
            sortBy: 'asc',
            paginate: false,
        );
    }

    public function getUsers(): object
    {
        return (new UserService)->index(
            orderBy: 'name',
            sortBy: 'asc',
            paginate: false,
        );
    }

    public function getPermissions(bool $paginate = true)
    {
        $permissions = (new PermissionService)->index(
            search: $this->search,
            roleId: $this->role_id,
            userId: $this->user_id,
            paginate: $paginate,
        );

        $permissions->loadCount(['roles', 'users']);

        return $permissions;
    }

    public function exportToExcel(): BinaryFileResponse
    {
        $this->alert('success', trans('index.export_to_excel').' '.trans('index.success'), [
            'html' => trans('index.permission').' '.trans('index.has_been_successfully_exported'),
        ]);

        return Excel::download(new PermissionExport(
            permissions: $this->getPermissions(paginate: false),
        ), trans('index.permission').'.xlsx');
    }

    public function render()
    {
        return view('livewire.cms.configuration.permission.index', [
            'roles' => $this->getRoles(),
            'users' => $this->getUsers(),
            'permissions' => $this->getPermissions(),
        ]);
    }
}
