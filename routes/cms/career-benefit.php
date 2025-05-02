<?php

use App\Livewire\CMS\CareerBenefit\CareerBenefitAddPage;
use App\Livewire\CMS\CareerBenefit\CareerBenefitDetailPage;
use App\Livewire\CMS\CareerBenefit\CareerBenefitEditPage;
use App\Livewire\CMS\CareerBenefit\CareerBenefitPage;
use Illuminate\Support\Facades\Route;

Route::any('', CareerBenefitPage::class)->name('index')->middleware('permission:career_benefit');
Route::any('add', CareerBenefitAddPage::class)->name('add')->middleware('permission:career_benefit.add');
Route::any('edit/{careerBenefit}', CareerBenefitEditPage::class)->name('edit')->middleware('permission:career_benefit.edit');
Route::any('detail/{careerBenefit}', CareerBenefitDetailPage::class)->name('detail')->middleware('permission:career_benefit.detail');
