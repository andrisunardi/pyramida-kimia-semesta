<?php

namespace App\Livewire\CMS\Configuration\Permission;

use App\Livewire\Component;
use App\Services\PermissionService;
use Spatie\Permission\Models\Permission;

class PermissionDelete extends Component
{
    public function mount(Permission $permission)
    {
        (new PermissionService)->delete(permission: $permission);

        $this->flash('success', trans('index.delete_success'), [
            'html' => trans('index.permission')." - {$permission->id} - ".trans('index.deleted'),
        ]);

        return $this->redirect(route('cms.configuration.permission.index'), navigate: true);
    }
}
