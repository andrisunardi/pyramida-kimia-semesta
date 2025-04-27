<?php

namespace App\Livewire\CMS\Configuration\Permission;

use App\Livewire\Component;
use App\Livewire\Forms\CMS\Permission\PermissionAddForm;
use App\Services\RoleService;
use Illuminate\Contracts\View\View;

class PermissionAddPage extends Component
{
    public PermissionAddForm $form;

    public function resetFields(): void
    {
        $this->form->set();

        $this->alert('success', trans('index.reset').' '.trans('index.success'), [
            'html' => trans('index.fields_has_been_successfully_reseted'),
        ]);
    }

    public function submit(): void
    {
        $this->form->submit();

        $this->flash('success', trans('index.add').' '.trans('index.success'), [
            'html' => trans('index.permission')." ".trans('index.has_been_successfully_added'),
        ]);

        $this->redirect(route('cms.configuration.permission.index'), navigate: true);
    }

    public function getRoles(): object
    {
        return (new RoleService)->index(
            orderBy: 'name',
            sortBy: 'asc',
            paginate: false,
        );
    }

    public function render(): View
    {
        return view('livewire.cms.configuration.permission.add', [
            'roles' => $this->getRoles(),
        ]);
    }
}
