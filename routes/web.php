<?php

use App\Http\Middleware\Localization;
use App\Livewire\About\AboutPage;
use App\Livewire\Article\ArticlePage;
use App\Livewire\Article\ArticleViewPage;
use App\Livewire\Contact\ContactPage;
use App\Livewire\Faq\FaqPage;
use App\Livewire\Gallery\GalleryPage;
use App\Livewire\Home\HomePage;
use App\Livewire\Product\ProductCategoryPage;
use App\Livewire\Product\ProductPage;
use App\Livewire\Product\ProductViewPage;
use App\Livewire\Testimony\TestimonyPage;
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

    Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
        Route::any('', ProductPage::class)->name('index');
        Route::any('category/{slug}', ProductCategoryPage::class)->name('category');
        Route::any('{slug}', ProductViewPage::class)->name('view');
    });

    Route::group(['prefix' => 'article', 'as' => 'article.'], function () {
        Route::any('', ArticlePage::class)->name('index');
        Route::any('{slug}', ArticleViewPage::class)->name('view');
    });

    Route::any('gallery', GalleryPage::class)->name('gallery');
    Route::any('faq', FaqPage::class)->name('faq');
    Route::any('testimony', TestimonyPage::class)->name('testimony');
    Route::any('contact', ContactPage::class)->name('contact');
});
