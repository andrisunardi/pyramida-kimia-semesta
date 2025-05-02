<?php

use App\Livewire\CMS\Career\CareerAddPage;
use App\Livewire\CMS\Career\CareerDetailPage;
use App\Livewire\CMS\Career\CareerEditPage;
use App\Livewire\CMS\Career\CareerPage;
use Illuminate\Support\Facades\Route;

Route::any('', CareerPage::class)->name('index')->middleware('permission:career');
Route::any('add', CareerAddPage::class)->name('add')->middleware('permission:career.add');
Route::any('edit/{career}', CareerEditPage::class)->name('edit')->middleware('permission:career.edit');
Route::any('detail/{career}', CareerDetailPage::class)->name('detail')->middleware('permission:career.detail');
