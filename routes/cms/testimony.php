<?php

use App\Livewire\CMS\Testimony\TestimonyAddPage;
use App\Livewire\CMS\Testimony\TestimonyDetailPage;
use App\Livewire\CMS\Testimony\TestimonyEditPage;
use App\Livewire\CMS\Testimony\TestimonyPage;
use Illuminate\Support\Facades\Route;

Route::any('', TestimonyPage::class)->name('index')->middleware('permission:testimony');
Route::any('add', TestimonyAddPage::class)->name('add')->middleware('permission:testimony.add');
Route::any('edit/{testimony}', TestimonyEditPage::class)->name('edit')->middleware('permission:testimony.edit');
Route::any('detail/{testimony}', TestimonyDetailPage::class)->name('detail')->middleware('permission:testimony.detail');
