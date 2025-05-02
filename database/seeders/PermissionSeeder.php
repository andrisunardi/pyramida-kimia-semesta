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

        Permission::create(['name' => 'career', 'guard_name' => 'web'])->assignRole('Admin');
        Permission::create(['name' => 'career.add', 'guard_name' => 'web'])->assignRole('Admin');
        Permission::create(['name' => 'career.edit', 'guard_name' => 'web'])->assignRole('Admin');
        Permission::create(['name' => 'career.delete', 'guard_name' => 'web'])->assignRole('Admin');
        Permission::create(['name' => 'career.detail', 'guard_name' => 'web'])->assignRole('Admin');
        Permission::create(['name' => 'career.export', 'guard_name' => 'web'])->assignRole('Admin');

        Permission::create(['name' => 'career_benefit', 'guard_name' => 'web'])->assignRole('Admin');
        Permission::create(['name' => 'career_benefit.add', 'guard_name' => 'web'])->assignRole('Admin');
        Permission::create(['name' => 'career_benefit.edit', 'guard_name' => 'web'])->assignRole('Admin');
        Permission::create(['name' => 'career_benefit.delete', 'guard_name' => 'web'])->assignRole('Admin');
        Permission::create(['name' => 'career_benefit.detail', 'guard_name' => 'web'])->assignRole('Admin');
        Permission::create(['name' => 'career_benefit.export', 'guard_name' => 'web'])->assignRole('Admin');
    }
}
