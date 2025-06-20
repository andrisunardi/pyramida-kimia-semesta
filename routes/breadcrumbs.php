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
Breadcrumbs::for('livewire.predetail-file', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.predetail_file'), null, ['icon' => 'fas fa-photo-film']);
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
Breadcrumbs::for('log-detailer.index', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.log_detailer'), null, ['icon' => 'fas fa-history']);
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

// HISTORY
Breadcrumbs::for('history', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.history'), route('history'), ['icon' => 'fas fa-scroll']);
});

// RESOURCE
Breadcrumbs::for('resource', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.resource'), route('resource'), ['icon' => 'fas fa-book']);
});

// TEAM
Breadcrumbs::for('team', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.team'), route('team'), ['icon' => 'fas fa-user-circle']);
});

// PARTNER
Breadcrumbs::for('partner', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.partner'), route('partner'), ['icon' => 'fas fa-users']);
});

// TESTIMONY
Breadcrumbs::for('testimony', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.testimony'), route('testimony'), ['icon' => 'fas fa-comments']);
});

// PRODUCT
Breadcrumbs::for('product.index', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.product'), route('product.index'), ['icon' => 'fas fa-flask']);
});

Breadcrumbs::for('product.detail', function (BreadcrumbTrail $trail, $product) {
    $trail->parent('product.index');
    $trail->push(trans('index.product'), route('product.detail', ['product' => $product]), ['icon' => 'fas fa-list']);
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

// CAREER
Breadcrumbs::for('career', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.career'), route('career'), ['icon' => 'fas fa-briefcase']);
});

// ARTICLE
Breadcrumbs::for('article.index', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.article'), route('article.index'), ['icon' => 'fas fa-newspaper']);
});

Breadcrumbs::for('article.detail', function (BreadcrumbTrail $trail, $article) {
    $trail->parent('article.index');
    $trail->push(trans('index.article'), route('article.detail', ['article' => $article]), ['icon' => 'fas fa-newspaper']);
});

// CONTACT
Breadcrumbs::for('contact', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.contact'), route('contact'), ['icon' => 'fas fa-phone']);
});

// ENQUIRE
Breadcrumbs::for('enquire', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push(trans('index.enquire'), route('enquire'), ['icon' => 'fas fa-pencil']);
});

// CMS
// HOME
Breadcrumbs::for('cms.index', function (BreadcrumbTrail $trail) {
    $trail->push(trans('index.home'), route('cms.index'), ['icon' => 'fas fa-home']);
});

// CONTACT
Breadcrumbs::for('cms.contact.index', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.index');
    $trail->push(trans('index.contact'), route('cms.contact.index'), ['icon' => 'fas fa-phone']);
});

Breadcrumbs::for('cms.contact.detail', function (BreadcrumbTrail $trail, $contact) {
    $trail->parent('cms.contact.index');
    $trail->push(trans('index.detail'), route('cms.contact.detail', ['contact' => $contact]), ['icon' => 'fas fa-list']);
});

// ARTICLE
Breadcrumbs::for('cms.article.index', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.index');
    $trail->push(trans('index.article'), route('cms.article.index'), ['icon' => 'fas fa-newspaper']);
});

Breadcrumbs::for('cms.article.add', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.article.index');
    $trail->push(trans('index.add'), route('cms.article.add'), ['icon' => 'fas fa-plus']);
});

Breadcrumbs::for('cms.article.edit', function (BreadcrumbTrail $trail, $article) {
    $trail->parent('cms.article.index');
    $trail->push(trans('index.edit'), route('cms.article.edit', ['article' => $article]), ['icon' => 'fas fa-edit']);
});

Breadcrumbs::for('cms.article.detail', function (BreadcrumbTrail $trail, $article) {
    $trail->parent('cms.article.index');
    $trail->push(trans('index.detail'), route('cms.article.detail', ['article' => $article]), ['icon' => 'fas fa-list']);
});

// PRODUCT
Breadcrumbs::for('cms.product.index', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.index');
    $trail->push(trans('index.product'), route('cms.product.index'), ['icon' => 'fas fa-flask']);
});

Breadcrumbs::for('cms.product.add', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.product.index');
    $trail->push(trans('index.add'), route('cms.product.add'), ['icon' => 'fas fa-plus']);
});

Breadcrumbs::for('cms.product.edit', function (BreadcrumbTrail $trail, $product) {
    $trail->parent('cms.product.index');
    $trail->push(trans('index.edit'), route('cms.product.edit', ['product' => $product]), ['icon' => 'fas fa-edit']);
});

Breadcrumbs::for('cms.product.detail', function (BreadcrumbTrail $trail, $product) {
    $trail->parent('cms.product.index');
    $trail->push(trans('index.detail'), route('cms.product.detail', ['product' => $product]), ['icon' => 'fas fa-list']);
});

// PRODUCT CATEGORY
Breadcrumbs::for('cms.product-category.index', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.index');
    $trail->push(trans('index.product-category'), route('cms.product-category.index'), ['icon' => 'fas fa-newspaper']);
});

Breadcrumbs::for('cms.product-category.add', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.product-category.index');
    $trail->push(trans('index.add'), route('cms.product-category.add'), ['icon' => 'fas fa-plus']);
});

Breadcrumbs::for('cms.product-category.edit', function (BreadcrumbTrail $trail, $productCategory) {
    $trail->parent('cms.product-category.index');
    $trail->push(trans('index.edit'), route('cms.product-category.edit', ['productCategory' => $productCategory]), ['icon' => 'fas fa-edit']);
});

Breadcrumbs::for('cms.product-category.detail', function (BreadcrumbTrail $trail, $productCategory) {
    $trail->parent('cms.product-category.index');
    $trail->push(trans('index.detail'), route('cms.product-category.detail', ['productCategory' => $productCategory]), ['icon' => 'fas fa-list']);
});

// GALLERY
Breadcrumbs::for('cms.gallery.index', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.index');
    $trail->push(trans('index.gallery'), route('cms.gallery.index'), ['icon' => 'fas fa-images']);
});

Breadcrumbs::for('cms.gallery.add', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.gallery.index');
    $trail->push(trans('index.add'), route('cms.gallery.add'), ['icon' => 'fas fa-plus']);
});

Breadcrumbs::for('cms.gallery.edit', function (BreadcrumbTrail $trail, $gallery) {
    $trail->parent('cms.gallery.index');
    $trail->push(trans('index.edit'), route('cms.gallery.edit', ['gallery' => $gallery]), ['icon' => 'fas fa-edit']);
});

Breadcrumbs::for('cms.gallery.detail', function (BreadcrumbTrail $trail, $gallery) {
    $trail->parent('cms.gallery.index');
    $trail->push(trans('index.detail'), route('cms.gallery.detail', ['gallery' => $gallery]), ['icon' => 'fas fa-list']);
});

// GALLERY CATEGORY
Breadcrumbs::for('cms.gallery-category.index', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.index');
    $trail->push(trans('index.gallery_category'), route('cms.gallery-category.index'), ['icon' => 'fas fa-tags']);
});

Breadcrumbs::for('cms.gallery-category.add', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.gallery-category.index');
    $trail->push(trans('index.add'), route('cms.gallery-category.add'), ['icon' => 'fas fa-plus']);
});

Breadcrumbs::for('cms.gallery-category.edit', function (BreadcrumbTrail $trail, $galleryCategory) {
    $trail->parent('cms.gallery-category.index');
    $trail->push(trans('index.edit'), route('cms.gallery-category.edit', ['galleryCategory' => $galleryCategory]), ['icon' => 'fas fa-edit']);
});

Breadcrumbs::for('cms.gallery-category.detail', function (BreadcrumbTrail $trail, $galleryCategory) {
    $trail->parent('cms.gallery-category.index');
    $trail->push(trans('index.detail'), route('cms.gallery-category.detail', ['galleryCategory' => $galleryCategory]), ['icon' => 'fas fa-list']);
});

// SLIDER
Breadcrumbs::for('cms.slider.index', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.index');
    $trail->push(trans('index.slider'), route('cms.slider.index'), ['icon' => 'fas fa-sliders']);
});

Breadcrumbs::for('cms.slider.add', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.slider.index');
    $trail->push(trans('index.add'), route('cms.slider.add'), ['icon' => 'fas fa-plus']);
});

Breadcrumbs::for('cms.slider.edit', function (BreadcrumbTrail $trail, $slider) {
    $trail->parent('cms.slider.index');
    $trail->push(trans('index.edit'), route('cms.slider.edit', ['slider' => $slider]), ['icon' => 'fas fa-edit']);
});

Breadcrumbs::for('cms.slider.detail', function (BreadcrumbTrail $trail, $slider) {
    $trail->parent('cms.slider.index');
    $trail->push(trans('index.detail'), route('cms.slider.detail', ['slider' => $slider]), ['icon' => 'fas fa-list']);
});

// TESTIMONY
Breadcrumbs::for('cms.testimony.index', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.index');
    $trail->push(trans('index.testimony'), route('cms.testimony.index'), ['icon' => 'fas fa-comments']);
});

Breadcrumbs::for('cms.testimony.add', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.testimony.index');
    $trail->push(trans('index.add'), route('cms.testimony.add'), ['icon' => 'fas fa-plus']);
});

Breadcrumbs::for('cms.testimony.edit', function (BreadcrumbTrail $trail, $testimony) {
    $trail->parent('cms.testimony.index');
    $trail->push(trans('index.edit'), route('cms.testimony.edit', ['testimony' => $testimony]), ['icon' => 'fas fa-edit']);
});

Breadcrumbs::for('cms.testimony.detail', function (BreadcrumbTrail $trail, $testimony) {
    $trail->parent('cms.testimony.index');
    $trail->push(trans('index.detail'), route('cms.testimony.detail', ['testimony' => $testimony]), ['icon' => 'fas fa-list']);
});

// TEAM
Breadcrumbs::for('cms.team.index', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.index');
    $trail->push(trans('index.team'), route('cms.team.index'), ['icon' => 'fas fa-user-tie']);
});

Breadcrumbs::for('cms.team.add', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.team.index');
    $trail->push(trans('index.add'), route('cms.team.add'), ['icon' => 'fas fa-plus']);
});

Breadcrumbs::for('cms.team.edit', function (BreadcrumbTrail $trail, $team) {
    $trail->parent('cms.team.index');
    $trail->push(trans('index.edit'), route('cms.team.edit', ['team' => $team]), ['icon' => 'fas fa-edit']);
});

Breadcrumbs::for('cms.team.detail', function (BreadcrumbTrail $trail, $team) {
    $trail->parent('cms.team.index');
    $trail->push(trans('index.detail'), route('cms.team.detail', ['team' => $team]), ['icon' => 'fas fa-list']);
});

// PARTNER
Breadcrumbs::for('cms.partner.index', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.index');
    $trail->push(trans('index.partner'), route('cms.partner.index'), ['icon' => 'fas fa-users']);
});

Breadcrumbs::for('cms.partner.add', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.partner.index');
    $trail->push(trans('index.add'), route('cms.partner.add'), ['icon' => 'fas fa-plus']);
});

Breadcrumbs::for('cms.partner.edit', function (BreadcrumbTrail $trail, $partner) {
    $trail->parent('cms.partner.index');
    $trail->push(trans('index.edit'), route('cms.partner.edit', ['partner' => $partner]), ['icon' => 'fas fa-edit']);
});

Breadcrumbs::for('cms.partner.detail', function (BreadcrumbTrail $trail, $partner) {
    $trail->parent('cms.partner.index');
    $trail->push(trans('index.detail'), route('cms.partner.detail', ['partner' => $partner]), ['icon' => 'fas fa-list']);
});

// HISTORY
Breadcrumbs::for('cms.history.index', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.index');
    $trail->push(trans('index.history'), route('cms.history.index'), ['icon' => 'fas fa-scroll']);
});

Breadcrumbs::for('cms.history.add', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.history.index');
    $trail->push(trans('index.add'), route('cms.history.add'), ['icon' => 'fas fa-plus']);
});

Breadcrumbs::for('cms.history.edit', function (BreadcrumbTrail $trail, $history) {
    $trail->parent('cms.history.index');
    $trail->push(trans('index.edit'), route('cms.history.edit', ['history' => $history]), ['icon' => 'fas fa-edit']);
});

Breadcrumbs::for('cms.history.detail', function (BreadcrumbTrail $trail, $history) {
    $trail->parent('cms.history.index');
    $trail->push(trans('index.detail'), route('cms.history.detail', ['history' => $history]), ['icon' => 'fas fa-list']);
});

// CAREER
Breadcrumbs::for('cms.career.index', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.index');
    $trail->push(trans('index.career'), route('cms.career.index'), ['icon' => 'fas fa-briefcase']);
});

Breadcrumbs::for('cms.career.add', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.career.index');
    $trail->push(trans('index.add'), route('cms.career.add'), ['icon' => 'fas fa-plus']);
});

Breadcrumbs::for('cms.career.edit', function (BreadcrumbTrail $trail, $career) {
    $trail->parent('cms.career.index');
    $trail->push(trans('index.edit'), route('cms.career.edit', ['career' => $career]), ['icon' => 'fas fa-edit']);
});

Breadcrumbs::for('cms.career.detail', function (BreadcrumbTrail $trail, $career) {
    $trail->parent('cms.career.index');
    $trail->push(trans('index.detail'), route('cms.career.detail', ['career' => $career]), ['icon' => 'fas fa-list']);
});

// CAREER BENEFIT
Breadcrumbs::for('cms.career-benefit.index', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.index');
    $trail->push(trans('index.career_benefit'), route('cms.career-benefit.index'), ['icon' => 'fas fa-gift']);
});

Breadcrumbs::for('cms.career-benefit.add', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.career-benefit.index');
    $trail->push(trans('index.add'), route('cms.career-benefit.add'), ['icon' => 'fas fa-plus']);
});

Breadcrumbs::for('cms.career-benefit.edit', function (BreadcrumbTrail $trail, $careerBenefit) {
    $trail->parent('cms.career-benefit.index');
    $trail->push(trans('index.edit'), route('cms.career-benefit.edit', ['careerBenefit' => $careerBenefit]), ['icon' => 'fas fa-edit']);
});

Breadcrumbs::for('cms.career-benefit.detail', function (BreadcrumbTrail $trail, $careerBenefit) {
    $trail->parent('cms.career-benefit.index');
    $trail->push(trans('index.detail'), route('cms.career-benefit.detail', ['careerBenefit' => $careerBenefit]), ['icon' => 'fas fa-list']);
});

// FAQ
Breadcrumbs::for('cms.faq.index', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.index');
    $trail->push(trans('index.faq'), route('cms.faq.index'), ['icon' => 'fas fa-question']);
});

Breadcrumbs::for('cms.faq.add', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.faq.index');
    $trail->push(trans('index.add'), route('cms.faq.add'), ['icon' => 'fas fa-plus']);
});

Breadcrumbs::for('cms.faq.edit', function (BreadcrumbTrail $trail, $faq) {
    $trail->parent('cms.faq.index');
    $trail->push(trans('index.edit'), route('cms.faq.edit', ['faq' => $faq]), ['icon' => 'fas fa-edit']);
});

Breadcrumbs::for('cms.faq.detail', function (BreadcrumbTrail $trail, $faq) {
    $trail->parent('cms.faq.index');
    $trail->push(trans('index.detail'), route('cms.faq.detail', ['faq' => $faq]), ['icon' => 'fas fa-list']);
});

// OFFICE
Breadcrumbs::for('cms.office.index', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.index');
    $trail->push(trans('index.office'), route('cms.office.index'), ['icon' => 'fas fa-building']);
});

Breadcrumbs::for('cms.office.add', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.office.index');
    $trail->push(trans('index.add'), route('cms.office.add'), ['icon' => 'fas fa-plus']);
});

Breadcrumbs::for('cms.office.edit', function (BreadcrumbTrail $trail, $office) {
    $trail->parent('cms.office.index');
    $trail->push(trans('index.edit'), route('cms.office.edit', ['office' => $office]), ['icon' => 'fas fa-edit']);
});

Breadcrumbs::for('cms.office.detail', function (BreadcrumbTrail $trail, $office) {
    $trail->parent('cms.office.index');
    $trail->push(trans('index.detail'), route('cms.office.detail', ['office' => $office]), ['icon' => 'fas fa-list']);
});

// CONFIGURATION
Breadcrumbs::for('cms.configuration.index', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.index');
    $trail->push(trans('index.configuration'), route('cms.configuration.index'), ['icon' => 'fas fa-cogs']);
});

// ACTIVITY
Breadcrumbs::for('cms.configuration.activity', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.configuration.index');
    $trail->push(trans('index.activity'), route('cms.configuration.activity'), ['icon' => 'fas fa-clock-rotate-left']);
});

// USER
Breadcrumbs::for('cms.configuration.user.index', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.configuration.index');
    $trail->push(trans('index.user'), route('cms.configuration.user.index'), ['icon' => 'fas fa-user']);
});

Breadcrumbs::for('cms.configuration.user.add', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.configuration.user.index');
    $trail->push(trans('index.add'), route('cms.configuration.user.add'), ['icon' => 'fas fa-plus']);
});

Breadcrumbs::for('cms.configuration.user.clone', function (BreadcrumbTrail $trail, $user) {
    $trail->parent('cms.configuration.user.index');
    $trail->push(trans('index.clone'), route('cms.configuration.user.clone', ['user' => $user]), ['icon' => 'fas fa-clone']);
});

Breadcrumbs::for('cms.configuration.user.edit', function (BreadcrumbTrail $trail, $user) {
    $trail->parent('cms.configuration.user.index');
    $trail->push(trans('index.edit'), route('cms.configuration.user.edit', ['user' => $user]), ['icon' => 'fas fa-edit']);
});

Breadcrumbs::for('cms.configuration.user.detail', function (BreadcrumbTrail $trail, $user) {
    $trail->parent('cms.configuration.user.index');
    $trail->push(trans('index.detail'), route('cms.configuration.user.detail', ['user' => $user]), ['icon' => 'fas fa-list']);
});

Breadcrumbs::for('cms.configuration.user.trash', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.configuration.user.index');
    $trail->push(trans('index.trash'), route('cms.configuration.user.trash'), ['icon' => 'fas fa-dumpster']);
});

// ROLE
Breadcrumbs::for('cms.configuration.role.index', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.configuration.index');
    $trail->push(trans('index.role'), route('cms.configuration.role.index'), ['icon' => 'fas fa-suitcase']);
});

Breadcrumbs::for('cms.configuration.role.add', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.configuration.role.index');
    $trail->push(trans('index.add'), route('cms.configuration.role.add'), ['icon' => 'fas fa-plus']);
});

Breadcrumbs::for('cms.configuration.role.clone', function (BreadcrumbTrail $trail, $role) {
    $trail->parent('cms.configuration.role.index');
    $trail->push(trans('index.clone'), route('cms.configuration.role.clone', ['role' => $role]), ['icon' => 'fas fa-clone']);
});

Breadcrumbs::for('cms.configuration.role.edit', function (BreadcrumbTrail $trail, $role) {
    $trail->parent('cms.configuration.role.index');
    $trail->push(trans('index.edit'), route('cms.configuration.role.edit', ['role' => $role]), ['icon' => 'fas fa-edit']);
});

Breadcrumbs::for('cms.configuration.role.detail', function (BreadcrumbTrail $trail, $role) {
    $trail->parent('cms.configuration.role.index');
    $trail->push(trans('index.detail'), route('cms.configuration.role.detail', ['role' => $role]), ['icon' => 'fas fa-list']);
});

// PERMISSION
Breadcrumbs::for('cms.configuration.permission.index', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.configuration.index');
    $trail->push(trans('index.permission'), route('cms.configuration.permission.index'), ['icon' => 'fas fa-key']);
});

Breadcrumbs::for('cms.configuration.permission.add', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.configuration.permission.index');
    $trail->push(trans('index.add'), route('cms.configuration.permission.add'), ['icon' => 'fas fa-plus']);
});

Breadcrumbs::for('cms.configuration.permission.clone', function (BreadcrumbTrail $trail, $permission) {
    $trail->parent('cms.configuration.permission.index');
    $trail->push(trans('index.clone'), route('cms.configuration.permission.clone', ['permission' => $permission]), ['icon' => 'fas fa-clone']);
});

Breadcrumbs::for('cms.configuration.permission.edit', function (BreadcrumbTrail $trail, $permission) {
    $trail->parent('cms.configuration.permission.index');
    $trail->push(trans('index.edit'), route('cms.configuration.permission.edit', ['permission' => $permission]), ['icon' => 'fas fa-edit']);
});

Breadcrumbs::for('cms.configuration.permission.detail', function (BreadcrumbTrail $trail, $permission) {
    $trail->parent('cms.configuration.permission.index');
    $trail->push(trans('index.detail'), route('cms.configuration.permission.detail', ['permission' => $permission]), ['icon' => 'fas fa-list']);
});

// SETTING
Breadcrumbs::for('cms.configuration.setting.index', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.configuration.index');
    $trail->push(trans('index.setting'), route('cms.configuration.setting.index'), ['icon' => 'fas fa-gear']);
});

Breadcrumbs::for('cms.configuration.setting.add', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.configuration.setting.index');
    $trail->push(trans('index.add'), route('cms.configuration.setting.add'), ['icon' => 'fas fa-plus']);
});

Breadcrumbs::for('cms.configuration.setting.clone', function (BreadcrumbTrail $trail, $setting) {
    $trail->parent('cms.configuration.setting.index');
    $trail->push(trans('index.clone'), route('cms.configuration.setting.clone', ['setting' => $setting]), ['icon' => 'fas fa-clone']);
});

Breadcrumbs::for('cms.configuration.setting.edit', function (BreadcrumbTrail $trail, $setting) {
    $trail->parent('cms.configuration.setting.index');
    $trail->push(trans('index.edit'), route('cms.configuration.setting.edit', ['setting' => $setting]), ['icon' => 'fas fa-edit']);
});

Breadcrumbs::for('cms.configuration.setting.detail', function (BreadcrumbTrail $trail, $setting) {
    $trail->parent('cms.configuration.setting.index');
    $trail->push(trans('index.detail'), route('cms.configuration.setting.detail', ['setting' => $setting]), ['icon' => 'fas fa-list']);
});

Breadcrumbs::for('cms.configuration.setting.trash', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.configuration.setting.index');
    $trail->push(trans('index.trash'), route('cms.configuration.setting.trash'), ['icon' => 'fas fa-dumpster']);
});

// PROFILE
Breadcrumbs::for('cms.profile.index', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.index');
    $trail->push(trans('index.profile'), route('cms.profile.index'), ['icon' => 'fas fa-user-circle']);
});

Breadcrumbs::for('cms.profile.activity-log', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.profile.index');
    $trail->push(trans('index.activity_log'), route('cms.profile.activity-log'), ['icon' => 'fas fa-user-clock']);
});

Breadcrumbs::for('cms.profile.edit-profile', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.profile.index');
    $trail->push(trans('index.edit_profile'), route('cms.profile.edit-profile'), ['icon' => 'fas fa-user-edit']);
});

Breadcrumbs::for('cms.profile.change-password', function (BreadcrumbTrail $trail) {
    $trail->parent('cms.profile.index');
    $trail->push(trans('index.change_password'), route('cms.profile.change-password'), ['icon' => 'fas fa-user-lock']);
});
