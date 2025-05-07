<?php

use App\Livewire\CMS\Office\OfficeAddPage;
use App\Livewire\CMS\Office\OfficeDetailPage;
use App\Livewire\CMS\Office\OfficeEditPage;
use App\Livewire\CMS\Office\OfficePage;
use Illuminate\Support\Facades\Route;

Route::any('', OfficePage::class)->name('index')->middleware('permission:office');
Route::any('add', OfficeAddPage::class)->name('add')->middleware('permission:office.add');
Route::any('edit/{office}', OfficeEditPage::class)->name('edit')->middleware('permission:office.edit');
Route::any('detail/{office}', OfficeDetailPage::class)->name('detail')->middleware('permission:office.detail');
