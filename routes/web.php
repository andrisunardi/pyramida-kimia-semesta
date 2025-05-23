<?php

use App\Http\Middleware\Localization;
use App\Livewire\About\AboutPage;
use App\Livewire\Article\ArticlePage;
use App\Livewire\Article\ArticleViewPage;
use App\Livewire\Career\CareerPage;
use App\Livewire\Contact\ContactPage;
use App\Livewire\Enquire\EnquirePage;
use App\Livewire\Faq\FaqPage;
use App\Livewire\Gallery\GalleryPage;
use App\Livewire\History\HistoryPage;
use App\Livewire\Home\HomePage;
use App\Livewire\Partner\PartnerPage;
use App\Livewire\Product\ProductCategoryPage;
use App\Livewire\Product\ProductPage;
use App\Livewire\Product\ProductViewPage;
use App\Livewire\Resource\ResourcePage;
use App\Livewire\Team\TeamPage;
use App\Livewire\Team\TeamViewPage;
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
    Route::any('history', HistoryPage::class)->name('history');
    Route::any('resource', ResourcePage::class)->name('resource');

    Route::group(['prefix' => 'team', 'as' => 'team.'], function () {
        Route::any('', TeamPage::class)->name('index');
        Route::any('{slug}', TeamViewPage::class)->name('view');
    });

    Route::any('partner', PartnerPage::class)->name('partner');
    Route::any('testimony', TestimonyPage::class)->name('testimony');

    Route::group(['prefix' => 'product', 'as' => 'product.'], function () {
        Route::any('', ProductPage::class)->name('index');
        Route::any('category/{slug}', ProductCategoryPage::class)->name('category');
        Route::any('{slug}', ProductViewPage::class)->name('view');
    });

    Route::any('gallery', GalleryPage::class)->name('gallery');
    Route::any('faq', FaqPage::class)->name('faq');
    Route::any('career', CareerPage::class)->name('career');

    Route::group(['prefix' => 'article', 'as' => 'article.'], function () {
        Route::any('', ArticlePage::class)->name('index');
        Route::any('{slug}', ArticleViewPage::class)->name('view');
    });

    Route::any('contact', ContactPage::class)->name('contact');
    Route::any('enquire', EnquirePage::class)->name('enquire');

    Route::prefix('cms')->name('cms.')->as('cms.')->group(base_path('routes/cms.php'));
});
