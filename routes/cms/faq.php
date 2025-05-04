<?php

use App\Livewire\CMS\Faq\FaqAddPage;
use App\Livewire\CMS\Faq\FaqDetailPage;
use App\Livewire\CMS\Faq\FaqEditPage;
use App\Livewire\CMS\Faq\FaqPage;
use Illuminate\Support\Facades\Route;

Route::any('', FaqPage::class)->name('index')->middleware('permission:faq');
Route::any('add', FaqAddPage::class)->name('add')->middleware('permission:faq.add');
Route::any('edit/{faq}', FaqEditPage::class)->name('edit')->middleware('permission:faq.edit');
Route::any('detail/{faq}', FaqDetailPage::class)->name('detail')->middleware('permission:faq.detail');
