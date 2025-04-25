<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        Permission::create(['name' => 'contact', 'guard_name' => 'web'])->assignRole('Admin');
        Permission::create(['name' => 'contact.detail', 'guard_name' => 'web'])->assignRole('Admin');
        Permission::create(['name' => 'contact.export', 'guard_name' => 'web'])->assignRole('Admin');
    }
}
