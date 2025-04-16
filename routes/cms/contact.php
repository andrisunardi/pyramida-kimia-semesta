<?php

use App\Livewire\CMS\Contact\ContactAddPage;
use App\Livewire\CMS\Contact\ContactClonePage;
use App\Livewire\CMS\Contact\ContactDelete;
use App\Livewire\CMS\Contact\ContactDeletePermanent;
use App\Livewire\CMS\Contact\ContactDeletePermanentAll;
use App\Livewire\CMS\Contact\ContactDetailPage;
use App\Livewire\CMS\Contact\ContactEditPage;
use App\Livewire\CMS\Contact\ContactPage;
use App\Livewire\CMS\Contact\ContactRestore;
use App\Livewire\CMS\Contact\ContactRestoreAll;
use App\Livewire\CMS\Contact\ContactTrashPage;
use Illuminate\Support\Facades\Route;

Route::any('', ContactPage::class)->name('index')->middleware('permission:contact');
Route::any('add', ContactAddPage::class)->name('add')->middleware('permission:contact.add');
Route::any('clone/{contact}', ContactClonePage::class)->name('clone')->middleware('permission:contact.clone');
Route::any('edit/{contact}', ContactEditPage::class)->name('edit')->middleware('permission:contact.edit');
Route::any('delete/{contact}', ContactDelete::class)->name('delete')->middleware('permission:contact.delete');
Route::any('detail/{contact}', ContactDetailPage::class)->name('detail')->middleware('permission:contact.detail');
Route::any('trash', ContactTrashPage::class)->name('trash')->middleware('permission:contact.trash');
Route::any('restore/{contact}', ContactRestore::class)->name('restore')->middleware('permission:contact.restore');
Route::any('delete-permanent/{contact}', ContactDeletePermanent::class)->name('delete-permanent')->middleware('permission:contact.delete_permanent');
Route::any('restore-all', ContactRestoreAll::class)->name('restore-all')->middleware('permission:contact.restore_all');
Route::any('delete-permanent-all', ContactDeletePermanentAll::class)->name('delete-permanent-all')->middleware('permission:contact.delete_permanent_all');
