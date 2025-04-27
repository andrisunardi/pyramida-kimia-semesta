<?php

namespace App\Livewire\CMS\Configuration\Permission;

use App\Livewire\Component;
use App\Services\PermissionService;
use Illuminate\Contracts\View\View;
use Spatie\Permission\Models\Permission;

class PermissionDetailPage extends Component
{
    public Permission $permission;

    public function mount(Permission $permission): void
    {
        $this->permission = $permission;
        $this->permission->loadCount(['roles', 'users']);
    }

    public function delete(Permission $permission): void
    {
        (new PermissionService)->delete(permission: $permission);

        $this->alert('success', trans('index.delete').' '.trans('index.success'), [
            'html' => trans('index.permission').' '.trans('index.has_been_successfully_deleted'),
        ]);

        $this->redirect(route('cms.configuration.permission.index'), navigate: true);
    }

    public function render(): View
    {
        return view('livewire.cms.configuration.permission.detail');
    }
}
