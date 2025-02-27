<?php

use App\Http\Middleware\Localization;
use App\Livewire\About\AboutPage;
use App\Livewire\Contact\ContactPage;
use App\Livewire\Home\HomePage;
use App\Livewire\Faq\FaqPage;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

Route::any('locale/{locale}', function ($locale) {
    Session::put('locale', $locale);
    App::setlocale(Session::get('locale'));

    return redirect()->back();
})->name('locale');

Route::group(['middleware' => [Localization::class]], function () {
    Route::any('', HomePage::class)->name('index');
    Route::any('about', AboutPage::class)->name('about');
    Route::any('faq', FaqPage::class)->name('faq');
    Route::any('contact', ContactPage::class)->name('contact');
});
