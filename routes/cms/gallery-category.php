<?php

use App\Livewire\CMS\GalleryCategory\GalleryCategoryAddPage;
use App\Livewire\CMS\GalleryCategory\GalleryCategoryDetailPage;
use App\Livewire\CMS\GalleryCategory\GalleryCategoryEditPage;
use App\Livewire\CMS\GalleryCategory\GalleryCategoryPage;
use Illuminate\Support\Facades\Route;

Route::any('', GalleryCategoryPage::class)->name('index')->middleware('permission:gallery_category');
Route::any('add', GalleryCategoryAddPage::class)->name('add')->middleware('permission:gallery_category.add');
Route::any('edit/{galleryCategory}', GalleryCategoryEditPage::class)->name('edit')->middleware('permission:gallery_category.edit');
Route::any('detail/{galleryCategory}', GalleryCategoryDetailPage::class)->name('detail')->middleware('permission:gallery_category.detail');
