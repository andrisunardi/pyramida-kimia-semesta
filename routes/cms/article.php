<?php

use App\Livewire\CMS\Article\ArticleAddPage;
use App\Livewire\CMS\Article\ArticleDetailPage;
use App\Livewire\CMS\Article\ArticleEditPage;
use App\Livewire\CMS\Article\ArticlePage;
use Illuminate\Support\Facades\Route;

Route::any('', ArticlePage::class)->name('index')->middleware('permission:article');
Route::any('add', ArticleAddPage::class)->name('add')->middleware('permission:article.add');
Route::any('edit/{article}', ArticleEditPage::class)->name('edit')->middleware('permission:article.edit');
Route::any('detail/{article}', ArticleDetailPage::class)->name('detail')->middleware('permission:article.detail');
