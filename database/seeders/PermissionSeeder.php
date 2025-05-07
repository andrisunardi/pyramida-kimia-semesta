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

        Permission::create(['name' => 'gallery', 'guard_name' => 'web'])->assignRole('Admin');
        Permission::create(['name' => 'gallery.add', 'guard_name' => 'web'])->assignRole('Admin');
        Permission::create(['name' => 'gallery.edit', 'guard_name' => 'web'])->assignRole('Admin');
        Permission::create(['name' => 'gallery.delete', 'guard_name' => 'web'])->assignRole('Admin');
        Permission::create(['name' => 'gallery.detail', 'guard_name' => 'web'])->assignRole('Admin');
        Permission::create(['name' => 'gallery.export', 'guard_name' => 'web'])->assignRole('Admin');

        Permission::create(['name' => 'gallery_category', 'guard_name' => 'web'])->assignRole('Admin');
        Permission::create(['name' => 'gallery_category.add', 'guard_name' => 'web'])->assignRole('Admin');
        Permission::create(['name' => 'gallery_category.edit', 'guard_name' => 'web'])->assignRole('Admin');
        Permission::create(['name' => 'gallery_category.delete', 'guard_name' => 'web'])->assignRole('Admin');
        Permission::create(['name' => 'gallery_category.detail', 'guard_name' => 'web'])->assignRole('Admin');
        Permission::create(['name' => 'gallery_category.export', 'guard_name' => 'web'])->assignRole('Admin');

        Permission::create(['name' => 'history', 'guard_name' => 'web'])->assignRole('Admin');
        Permission::create(['name' => 'history.add', 'guard_name' => 'web'])->assignRole('Admin');
        Permission::create(['name' => 'history.edit', 'guard_name' => 'web'])->assignRole('Admin');
        Permission::create(['name' => 'history.delete', 'guard_name' => 'web'])->assignRole('Admin');
        Permission::create(['name' => 'history.detail', 'guard_name' => 'web'])->assignRole('Admin');
        Permission::create(['name' => 'history.export', 'guard_name' => 'web'])->assignRole('Admin');

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

        Permission::create(['name' => 'faq', 'guard_name' => 'web'])->assignRole('Admin');
        Permission::create(['name' => 'faq.add', 'guard_name' => 'web'])->assignRole('Admin');
        Permission::create(['name' => 'faq.edit', 'guard_name' => 'web'])->assignRole('Admin');
        Permission::create(['name' => 'faq.delete', 'guard_name' => 'web'])->assignRole('Admin');
        Permission::create(['name' => 'faq.detail', 'guard_name' => 'web'])->assignRole('Admin');
        Permission::create(['name' => 'faq.export', 'guard_name' => 'web'])->assignRole('Admin');

        Permission::create(['name' => 'office', 'guard_name' => 'web'])->assignRole('Admin');
        Permission::create(['name' => 'office.add', 'guard_name' => 'web'])->assignRole('Admin');
        Permission::create(['name' => 'office.edit', 'guard_name' => 'web'])->assignRole('Admin');
        Permission::create(['name' => 'office.delete', 'guard_name' => 'web'])->assignRole('Admin');
        Permission::create(['name' => 'office.detail', 'guard_name' => 'web'])->assignRole('Admin');
        Permission::create(['name' => 'office.export', 'guard_name' => 'web'])->assignRole('Admin');
    }
}
