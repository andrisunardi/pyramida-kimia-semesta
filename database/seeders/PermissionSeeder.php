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

        Permission::create(['name' => 'article', 'guard_name' => 'web'])->assignRole('Admin');
        Permission::create(['name' => 'article.add', 'guard_name' => 'web'])->assignRole('Admin');
        Permission::create(['name' => 'article.edit', 'guard_name' => 'web'])->assignRole('Admin');
        Permission::create(['name' => 'article.delete', 'guard_name' => 'web'])->assignRole('Admin');
        Permission::create(['name' => 'article.detail', 'guard_name' => 'web'])->assignRole('Admin');
        Permission::create(['name' => 'article.export', 'guard_name' => 'web'])->assignRole('Admin');
    }
}
