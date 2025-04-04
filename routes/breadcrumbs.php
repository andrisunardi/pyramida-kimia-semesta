<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// ERRORS 404
Breadcrumbs::for('errors.404', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.error'), null, ['icon' => 'fas fa-circle-exclamation']);
});

// LIVEWIRE MESSAGE
Breadcrumbs::for('livewire.message', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.message'), null, ['icon' => 'fas fa-message']);
});

// LIVEWWIRE UPDATE
Breadcrumbs::for('livewire.update', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.update'), null, ['icon' => 'fas fa-edit']);
});

// LIVEWIRE PREVIEW FILE
Breadcrumbs::for('livewire.preview-file', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.preview_file'), null, ['icon' => 'fas fa-photo-film']);
});

// TELESCOPE
Breadcrumbs::for('telescope', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.telescope'), null, ['icon' => 'fas fa-telescope']);
});

// HORIZON
Breadcrumbs::for('horizon.index', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.horizon'), null, ['icon' => 'fas fa-cloud-moon']);
});

// LOG VIEWER
Breadcrumbs::for('log-viewer.index', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.log_viewer'), null, ['icon' => 'fas fa-history']);
});

// HOME
Breadcrumbs::for('index', function (BreadcrumbTrail $trail) {
    $trail->push(trans('index.home'), route('index'), ['icon' => 'fas fa-home']);
});

// ABOUT
Breadcrumbs::for('about', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.about'), route('about'), ['icon' => 'fas fa-building']);
});

// PRODUCT
Breadcrumbs::for('product.index', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.product'), route('product.index'), ['icon' => 'fas fa-flask']);
});

Breadcrumbs::for('product.view', function (BreadcrumbTrail $trail, $product) {
    $trail->parent('product.index');
    $trail->push(trans('index.product'), route('product.view', ['product' => $product]), ['icon' => 'fas fa-list']);
});

// ARTICLE
Breadcrumbs::for('article.index', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.article'), route('article.index'), ['icon' => 'fas fa-flask']);
});

Breadcrumbs::for('article.view', function (BreadcrumbTrail $trail, $article) {
    $trail->parent('article.index');
    $trail->push(trans('index.article'), route('article.view', ['article' => $article]), ['icon' => 'fas fa-newspaper']);
});

// GALLERY
Breadcrumbs::for('gallery', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.gallery'), route('gallery'), ['icon' => 'fas fa-images']);
});

// FAQ
Breadcrumbs::for('faq', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.faq'), route('faq'), ['icon' => 'fas fa-question']);
});

// RESOURCE
Breadcrumbs::for('resource', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.resource'), route('resource'), ['icon' => 'fas fa-book']);
});

// TESTIMONY
Breadcrumbs::for('testimony', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.testimony'), route('testimony'), ['icon' => 'fas fa-comments']);
});

// CONTACT
Breadcrumbs::for('contact', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.contact'), route('contact'), ['icon' => 'fas fa-phone']);
});
