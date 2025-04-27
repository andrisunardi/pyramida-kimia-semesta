<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Spatie\Permission\Models\Permission;

class PermissionRoleExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public object $roles;

    public Permission $permission;

    public function __construct(object $roles, Permission $permission)
    {
        $this->roles = $roles;
        $this->permission = $permission;
    }

    public function view(): View
    {
        return view('excel.permission.role', [
            'roles' => $this->roles,
            'permission' => $this->permission,
        ]);
    }
}
