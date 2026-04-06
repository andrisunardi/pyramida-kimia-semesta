<?php

use App\Livewire\CMS\Event\EventAddPage;
use App\Livewire\CMS\Event\EventDetailPage;
use App\Livewire\CMS\Event\EventEditPage;
use App\Livewire\CMS\Event\EventPage;
use Illuminate\Support\Facades\Route;

Route::any('', EventPage::class)->name('index')->middleware('permission:event');
Route::any('add', EventAddPage::class)->name('add')->middleware('permission:event.add');
Route::any('edit/{event}', EventEditPage::class)->name('edit')->middleware('permission:event.edit');
Route::any('detail/{event}', EventDetailPage::class)->name('detail')->middleware('permission:event.detail');
