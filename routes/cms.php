<?php

use App\Livewire\CMS\ForgotPassword\ForgotPasswordPage;
use App\Livewire\CMS\Login\LoginPage;
use Illuminate\Support\Facades\Route;

Route::any('login', LoginPage::class)->name('login');
Route::any('forgot-password', ForgotPasswordPage::class)->name('forgot-password');
