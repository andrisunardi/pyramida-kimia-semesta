<?php

use App\Livewire\CMS\Configuration\User\UserAddPage;
use App\Livewire\CMS\Configuration\User\UserDelete;
use App\Livewire\CMS\Configuration\User\UserDetailPage;
use App\Livewire\CMS\Configuration\User\UserEditPage;
use App\Livewire\CMS\Configuration\User\UserPage;
use Illuminate\Support\Facades\Route;

Route::any('', UserPage::class)->name('index')->middleware('permission:user');
Route::any('add', UserAddPage::class)->name('add')->middleware('permission:user.add');
Route::any('edit/{user}', UserEditPage::class)->name('edit')->middleware('permission:user.edit');
Route::any('delete/{user}', UserDelete::class)->name('delete')->middleware('permission:user.delete');
Route::any('detail/{user}', UserDetailPage::class)->name('detail')->middleware('permission:user.detail');
