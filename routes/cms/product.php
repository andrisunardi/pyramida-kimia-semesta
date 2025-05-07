<?php

use App\Livewire\CMS\Product\ProductAddPage;
use App\Livewire\CMS\Product\ProductDetailPage;
use App\Livewire\CMS\Product\ProductEditPage;
use App\Livewire\CMS\Product\ProductPage;
use Illuminate\Support\Facades\Route;

Route::any('', ProductPage::class)->name('index')->middleware('permission:product');
Route::any('add', ProductAddPage::class)->name('add')->middleware('permission:product.add');
Route::any('edit/{product}', ProductEditPage::class)->name('edit')->middleware('permission:product.edit');
Route::any('detail/{product}', ProductDetailPage::class)->name('detail')->middleware('permission:product.detail');
