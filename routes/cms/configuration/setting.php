<?php

use App\Livewire\CMS\Configuration\Setting\SettingAddPage;
use App\Livewire\CMS\Configuration\Setting\SettingDelete;
use App\Livewire\CMS\Configuration\Setting\SettingDetailPage;
use App\Livewire\CMS\Configuration\Setting\SettingEditPage;
use App\Livewire\CMS\Configuration\Setting\SettingPage;
use Illuminate\Support\Facades\Route;

Route::any('', SettingPage::class)->name('index')->middleware('permission:setting');
Route::any('add', SettingAddPage::class)->name('add')->middleware('permission:setting.add');
Route::any('edit/{setting}', SettingEditPage::class)->name('edit')->middleware('permission:setting.edit');
Route::any('delete/{setting}', SettingDelete::class)->name('delete')->middleware('permission:setting.delete');
Route::any('detail/{setting}', SettingDetailPage::class)->name('detail')->middleware('permission:setting.detail');
