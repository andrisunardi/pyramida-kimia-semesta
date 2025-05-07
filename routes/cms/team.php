<?php

use App\Livewire\CMS\Team\TeamAddPage;
use App\Livewire\CMS\Team\TeamDetailPage;
use App\Livewire\CMS\Team\TeamEditPage;
use App\Livewire\CMS\Team\TeamPage;
use Illuminate\Support\Facades\Route;

Route::any('', TeamPage::class)->name('index')->middleware('permission:team');
Route::any('add', TeamAddPage::class)->name('add')->middleware('permission:team.add');
Route::any('edit/{team}', TeamEditPage::class)->name('edit')->middleware('permission:team.edit');
Route::any('detail/{team}', TeamDetailPage::class)->name('detail')->middleware('permission:team.detail');
