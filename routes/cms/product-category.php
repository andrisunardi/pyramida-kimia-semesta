<?php

use App\Livewire\CMS\ProductCategory\ProductCategoryAddPage;
use App\Livewire\CMS\ProductCategory\ProductCategoryDetailPage;
use App\Livewire\CMS\ProductCategory\ProductCategoryEditPage;
use App\Livewire\CMS\ProductCategory\ProductCategoryPage;
use Illuminate\Support\Facades\Route;

Route::any('', ProductCategoryPage::class)->name('index')->middleware('permission:product_category');
Route::any('add', ProductCategoryAddPage::class)->name('add')->middleware('permission:product_category.add');
Route::any('edit/{productCategory}', ProductCategoryEditPage::class)->name('edit')->middleware('permission:product_category.edit');
Route::any('detail/{productCategory}', ProductCategoryDetailPage::class)->name('detail')->middleware('permission:product_category.detail');
