<?php

use App\Livewire\CMS\Configuration\Permission\PermissionAddPage;
use App\Livewire\CMS\Configuration\Permission\PermissionDetailPage;
use App\Livewire\CMS\Configuration\Permission\PermissionEditPage;
use App\Livewire\CMS\Configuration\Permission\PermissionPage;
use Illuminate\Support\Facades\Route;

Route::any('', PermissionPage::class)->name('index')->middleware('permission:permission');
Route::any('add', PermissionAddPage::class)->name('add')->middleware('permission:permission.add');
Route::any('edit/{permission}', PermissionEditPage::class)->name('edit')->middleware('permission:permission.edit');
Route::any('detail/{permission}', PermissionDetailPage::class)->name('detail')->middleware('permission:permission.detail');
