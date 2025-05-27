<?php

namespace App\Livewire\CMS\Configuration\Permission;

use App\Exports\PermissionRoleExport;
use App\Livewire\Component;
use App\Services\RoleService;
use App\Services\UserService;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Url;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class PermissionRoleComponent extends Component
{
    public Permission $permission;

    #[Url(except: '')]
    public string $search = '';

    #[Url(except: '')]
    public string $user_id = '';

    public function mount(Permission $permission): void
    {
        $this->permission = $permission;
    }

    public function resetFields(): void
    {
        $this->resetPage();

        $this->reset([
            'search',
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

    public function delete(Role $role): void
    {
        (new RoleService)->delete(role: $role);

        $this->alert('success', trans('index.delete').' '.trans('index.success'), [
            'html' => trans('index.role').' '.trans('index.has_been_successfully_deleted'),
        ]);
    }

    public function getUsers(): object
    {
        return (new UserService)->index(
            isActive: [true],
            orderBy: 'name',
            sortBy: 'asc',
            paginate: false,
        );
    }

    public function getRoles(bool $paginate = true): object
    {
        $roles = (new RoleService)->index(
            search: $this->search,
            permissionId: $this->permission->id,
            userId: $this->user_id,
            sortBy: 'asc',
            paginate: $paginate,
        );

        $roles->loadCount(['permissions', 'users']);

        return $roles;
    }

    public function exportToExcel(): BinaryFileResponse
    {
        $this->alert('success', trans('index.export_to_excel').' '.trans('index.success'), [
            'html' => trans('index.role').' '.trans('index.has_been_successfully_exported'),
        ]);

        return Excel::download(new PermissionRoleExport(
            permission: $this->permission,
            roles: $this->getRoles(paginate: false),
        ), trans('index.permission').' '.trans('index.role')." - {$this->permission->name}.xlsx");
    }

    public function render(): View
    {
        return view('livewire.cms.configuration.permission.role', [
            'users' => $this->getUsers(),
            'roles' => $this->getRoles(),
        ]);
    }
}
