<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Spatie\Permission\Models\Permission;

class PermissionUserExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public object $users;

    public Permission $permission;

    public function __construct(object $users, Permission $permission)
    {
        $this->users = $users;
        $this->permission = $permission;
    }

    public function view(): View
    {
        return view('excel.permission.user', [
            'users' => $this->users,
            'permission' => $this->permission,
        ]);
    }
}
