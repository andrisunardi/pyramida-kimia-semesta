<?php

namespace App\Livewire\CMS\Configuration\Permission;

use App\Livewire\Component;
use App\Livewire\Forms\CMS\Permission\PermissionEditForm;
use App\Services\RoleService;
use Spatie\Permission\Models\Permission;

class PermissionEditPage extends Component
{
    public PermissionEditForm $form;

    public Permission $permission;

    public function mount(Permission $permission): void
    {
        $this->permission = $permission;
        $this->form->set(permission: $permission);
    }

    public function resetFields(): void
    {
        $this->form->set(permission: $this->permission);

        $this->alert('success', trans('index.reset').' '.trans('index.success'), [
            'html' => trans('index.fields_has_been_successfully_reseted'),
        ]);
    }

    public function submit()
    {
        $this->form->submit(permission: $this->permission);

        $this->alert('success', trans('index.edit').' '.trans('index.success'), [
            'html' => trans('index.permission').' '.trans('index.has_been_successfully_edited'),
        ]);

        return $this->redirect(route('cms.configuration.permission.index'), navigate: true);
    }

    public function getRoles()
    {
        return (new RoleService)->index(
            orderBy: 'name',
            sortBy: 'asc',
            paginate: false
        );
    }

    public function render()
    {
        return view('livewire.cms.configuration.permission.edit', [
            'roles' => $this->getRoles(),
        ]);
    }
}
