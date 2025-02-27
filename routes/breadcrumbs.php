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

// FAQ
Breadcrumbs::for('faq', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.faq'), route('faq'), ['icon' => 'fas fa-question']);
});

// CONTACT
Breadcrumbs::for('contact', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.contact'), route('contact'), ['icon' => 'fas fa-phone']);
});
