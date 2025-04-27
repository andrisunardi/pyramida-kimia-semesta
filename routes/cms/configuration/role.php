<?php

use App\Livewire\CMS\Configuration\Role\RoleAddPage;
use App\Livewire\CMS\Configuration\Role\RoleDelete;
use App\Livewire\CMS\Configuration\Role\RoleDetailPage;
use App\Livewire\CMS\Configuration\Role\RoleEditPage;
use App\Livewire\CMS\Configuration\Role\RolePage;
use Illuminate\Support\Facades\Route;

Route::any('', RolePage::class)->name('index')->middleware('permission:role');
Route::any('add', RoleAddPage::class)->name('add')->middleware('permission:role.add');
Route::any('edit/{role}', RoleEditPage::class)->name('edit')->middleware('permission:role.edit');
Route::any('delete/{role}', RoleDelete::class)->name('delete')->middleware('permission:role.delete');
Route::any('detail/{role}', RoleDetailPage::class)->name('detail')->middleware('permission:role.detail');
