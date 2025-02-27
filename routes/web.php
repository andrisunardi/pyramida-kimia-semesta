<?php

use App\Livewire\Contact\ContactPage;
use App\Livewire\Home\HomePage;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::any('locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    App::setlocale(Session::get('locale'));

    return redirect()->back();
})->name('locale');

Route::any('', HomePage::class)->name('index');
Route::any('contact', ContactPage::class)->name('contact');
