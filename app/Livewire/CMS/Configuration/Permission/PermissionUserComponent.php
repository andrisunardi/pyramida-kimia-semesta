<?php

namespace App\Livewire\CMS\Configuration\Permission;

use App\Exports\PermissionUserExport;
use App\Livewire\Component;
use App\Models\User;
use App\Services\RoleService;
use App\Services\UserService;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Url;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Permission;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class PermissionUserComponent extends Component
{
    public Permission $permission;

    #[Url(except: '')]
    public string $search = '';

    #[Url(except: '')]
    public string $role_name = '';

    #[Url(except: [])]
    public array $is_active = [];

    public function mount(Permission $permission): void
    {
        $this->permission = $permission;
    }

    public function resetFields(): void
    {
        $this->resetPage();

        $this->reset([
            'search',
            'role_name',
            'is_active',
        ]);

        $this->alert('success', trans('index.reset') . ' ' . trans('index.success'), [
            'html' => trans('index.fields_has_been_successfully_reseted'),
        ]);
    }

    public function updating(): void
    {
        $this->resetPage();
    }

    public function changeActive(User $user): void
    {
        (new UserService)->active(user: $user);

        $this->alert('success', trans('index.change') . ' ' . trans('index.active') . ' ' . trans('index.success'), [
            'html' => trans('index.user') . ' ' . trans('index.has_been_successfully_changed'),
        ]);
    }

    public function delete(User $user): void
    {
        (new UserService)->delete(user: $user);

        $this->alert('success', trans('index.delete') . ' ' . trans('index.success'), [
            'html' => trans('index.user') . ' ' . trans('index.has_been_successfully_deleted'),
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

    public function getUsers(bool $paginate = true): object
    {
        $users = (new UserService)->index(
            search: $this->search,
            isActive: $this->is_active,
            roleName: $this->role_name,
            permissionName: $this->permission->name,
            sortBy: 'asc',
            paginate: $paginate,
        );

        $users->loadCount(['roles', 'permissions']);

        return $users;
    }

    public function exportToExcel(): BinaryFileResponse
    {
        $this->alert('success', trans('index.delete') . ' ' . trans('index.success'), [
            'html' => trans('index.user') . ' ' . trans('index.has_been_successfully_exported'),
        ]);

        return Excel::download(new PermissionUserExport(
            permission: $this->permission,
            users: $this->getUsers(paginate: false),
        ), trans('index.permission') . ' ' . trans('index.user') . " - {$this->permission->name}.xlsx");
    }

    public function render(): View
    {
        return view('livewire.cms.configuration.permission.user', [
            'roles' => $this->getRoles(),
            'users' => $this->getUsers(),
        ]);
    }
}
