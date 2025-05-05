<?php

use App\Livewire\CMS\Gallery\GalleryAddPage;
use App\Livewire\CMS\Gallery\GalleryDetailPage;
use App\Livewire\CMS\Gallery\GalleryEditPage;
use App\Livewire\CMS\Gallery\GalleryPage;
use Illuminate\Support\Facades\Route;

Route::any('', GalleryPage::class)->name('index')->middleware('permission:gallery');
Route::any('add', GalleryAddPage::class)->name('add')->middleware('permission:gallery.add');
Route::any('edit/{gallery}', GalleryEditPage::class)->name('edit')->middleware('permission:gallery.edit');
Route::any('detail/{gallery}', GalleryDetailPage::class)->name('detail')->middleware('permission:gallery.detail');
