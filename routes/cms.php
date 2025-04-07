<?php

use App\Livewire\CMS\ForgotPassword\ForgotPasswordPage;
use App\Livewire\CMS\Home\HomePage;
use App\Livewire\CMS\Login\LoginPage;
use Illuminate\Support\Facades\Route;

Route::any('login', LoginPage::class)->name('login');
Route::any('forgot-password', ForgotPasswordPage::class)->name('forgot-password');

Route::group(['middleware' => ['auth', 'role:'.config('app.route_cms_roles')]], function () {
    Route::any('', HomePage::class)->name('index');
});
