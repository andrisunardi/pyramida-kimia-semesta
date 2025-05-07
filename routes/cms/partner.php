<?php

use App\Livewire\CMS\Partner\PartnerAddPage;
use App\Livewire\CMS\Partner\PartnerDetailPage;
use App\Livewire\CMS\Partner\PartnerEditPage;
use App\Livewire\CMS\Partner\PartnerPage;
use Illuminate\Support\Facades\Route;

Route::any('', PartnerPage::class)->name('index')->middleware('permission:partner');
Route::any('add', PartnerAddPage::class)->name('add')->middleware('permission:partner.add');
Route::any('edit/{partner}', PartnerEditPage::class)->name('edit')->middleware('permission:partner.edit');
Route::any('detail/{partner}', PartnerDetailPage::class)->name('detail')->middleware('permission:partner.detail');
