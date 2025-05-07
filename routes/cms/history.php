<?php

use App\Livewire\CMS\History\HistoryAddPage;
use App\Livewire\CMS\History\HistoryDetailPage;
use App\Livewire\CMS\History\HistoryEditPage;
use App\Livewire\CMS\History\HistoryPage;
use Illuminate\Support\Facades\Route;

Route::any('', HistoryPage::class)->name('index')->middleware('permission:history');
Route::any('add', HistoryAddPage::class)->name('add')->middleware('permission:history.add');
Route::any('edit/{history}', HistoryEditPage::class)->name('edit')->middleware('permission:history.edit');
Route::any('detail/{history}', HistoryDetailPage::class)->name('detail')->middleware('permission:history.detail');
