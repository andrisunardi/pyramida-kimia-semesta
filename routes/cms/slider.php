<?php

use App\Livewire\CMS\Slider\SliderAddPage;
use App\Livewire\CMS\Slider\SliderDetailPage;
use App\Livewire\CMS\Slider\SliderEditPage;
use App\Livewire\CMS\Slider\SliderPage;
use Illuminate\Support\Facades\Route;

Route::any('', SliderPage::class)->name('index')->middleware('permission:slider');
Route::any('add', SliderAddPage::class)->name('add')->middleware('permission:slider.add');
Route::any('edit/{slider}', SliderEditPage::class)->name('edit')->middleware('permission:slider.edit');
Route::any('detail/{slider}', SliderDetailPage::class)->name('detail')->middleware('permission:slider.detail');
