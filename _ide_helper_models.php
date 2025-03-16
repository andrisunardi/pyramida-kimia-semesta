<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $company
 * @property string $email
 * @property string $phone
 * @property string $subject
 * @property string $message
 * @property bool $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\User|null $updatedBy
 * @method static Builder<static>|Contact active()
 * @method static Builder<static>|Contact inactive()
 * @method static Builder<static>|Contact newModelQuery()
 * @method static Builder<static>|Contact newQuery()
 * @method static Builder<static>|Contact onlyTrashed()
 * @method static Builder<static>|Contact query()
 * @method static Builder<static>|Contact whereCompany($value)
 * @method static Builder<static>|Contact whereCreatedAt($value)
 * @method static Builder<static>|Contact whereCreatedBy($value)
 * @method static Builder<static>|Contact whereDeletedAt($value)
 * @method static Builder<static>|Contact whereDeletedBy($value)
 * @method static Builder<static>|Contact whereEmail($value)
 * @method static Builder<static>|Contact whereId($value)
 * @method static Builder<static>|Contact whereIsActive($value)
 * @method static Builder<static>|Contact whereMessage($value)
 * @method static Builder<static>|Contact whereName($value)
 * @method static Builder<static>|Contact wherePhone($value)
 * @method static Builder<static>|Contact whereSubject($value)
 * @method static Builder<static>|Contact whereUpdatedAt($value)
 * @method static Builder<static>|Contact whereUpdatedBy($value)
 * @method static Builder<static>|Contact withTrashed()
 * @method static Builder<static>|Contact withoutTrashed()
 * @method static \Database\Factories\ContactFactory factory($count = null, $state = [])
 * @mixin \Eloquent
 */
	class Contact extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $gallery_category_id
 * @property string $name
 * @property string $name_id
 * @property string $name_zh
 * @property string|null $description
 * @property string|null $description_id
 * @property string|null $description_zh
 * @property string|null $image
 * @property bool $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\GalleryCategory $category
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read string $image_url
 * @property-read mixed $translate_description
 * @property-read mixed $translate_name
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\User|null $updatedBy
 * @method static Builder<static>|Gallery active()
 * @method static \Database\Factories\GalleryFactory factory($count = null, $state = [])
 * @method static Builder<static>|Gallery inactive()
 * @method static Builder<static>|Gallery newModelQuery()
 * @method static Builder<static>|Gallery newQuery()
 * @method static Builder<static>|Gallery onlyTrashed()
 * @method static Builder<static>|Gallery query()
 * @method static Builder<static>|Gallery whereCreatedAt($value)
 * @method static Builder<static>|Gallery whereCreatedBy($value)
 * @method static Builder<static>|Gallery whereDeletedAt($value)
 * @method static Builder<static>|Gallery whereDeletedBy($value)
 * @method static Builder<static>|Gallery whereDescription($value)
 * @method static Builder<static>|Gallery whereDescriptionId($value)
 * @method static Builder<static>|Gallery whereDescriptionZh($value)
 * @method static Builder<static>|Gallery whereGalleryCategoryId($value)
 * @method static Builder<static>|Gallery whereId($value)
 * @method static Builder<static>|Gallery whereImage($value)
 * @method static Builder<static>|Gallery whereIsActive($value)
 * @method static Builder<static>|Gallery whereName($value)
 * @method static Builder<static>|Gallery whereNameId($value)
 * @method static Builder<static>|Gallery whereNameZh($value)
 * @method static Builder<static>|Gallery whereUpdatedAt($value)
 * @method static Builder<static>|Gallery whereUpdatedBy($value)
 * @method static Builder<static>|Gallery withTrashed()
 * @method static Builder<static>|Gallery withoutTrashed()
 * @mixin \Eloquent
 */
	class Gallery extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $name_id
 * @property string $name_zh
 * @property bool $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Gallery> $galleries
 * @property-read int|null $galleries_count
 * @property-read mixed $translate_name
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\User|null $updatedBy
 * @method static Builder<static>|GalleryCategory active()
 * @method static Builder<static>|GalleryCategory inactive()
 * @method static Builder<static>|GalleryCategory newModelQuery()
 * @method static Builder<static>|GalleryCategory newQuery()
 * @method static Builder<static>|GalleryCategory onlyTrashed()
 * @method static Builder<static>|GalleryCategory query()
 * @method static Builder<static>|GalleryCategory whereCreatedAt($value)
 * @method static Builder<static>|GalleryCategory whereCreatedBy($value)
 * @method static Builder<static>|GalleryCategory whereDeletedAt($value)
 * @method static Builder<static>|GalleryCategory whereDeletedBy($value)
 * @method static Builder<static>|GalleryCategory whereId($value)
 * @method static Builder<static>|GalleryCategory whereIsActive($value)
 * @method static Builder<static>|GalleryCategory whereName($value)
 * @method static Builder<static>|GalleryCategory whereNameId($value)
 * @method static Builder<static>|GalleryCategory whereNameZh($value)
 * @method static Builder<static>|GalleryCategory whereUpdatedAt($value)
 * @method static Builder<static>|GalleryCategory whereUpdatedBy($value)
 * @method static Builder<static>|GalleryCategory withTrashed()
 * @method static Builder<static>|GalleryCategory withoutTrashed()
 * @mixin \Eloquent
 */
	class GalleryCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $product_category_id
 * @property string $name
 * @property string|null $description
 * @property string|null $image
 * @property string|null $image_coa
 * @property string|null $image_msds
 * @property string $slug
 * @property bool $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\ProductCategory $category
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read string $image_coa_url
 * @property-read string $image_msds_url
 * @property-read string $image_url
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\User|null $updatedBy
 * @method static Builder<static>|Product active()
 * @method static Builder<static>|Product inactive()
 * @method static Builder<static>|Product newModelQuery()
 * @method static Builder<static>|Product newQuery()
 * @method static Builder<static>|Product onlyTrashed()
 * @method static Builder<static>|Product query()
 * @method static Builder<static>|Product whereCreatedAt($value)
 * @method static Builder<static>|Product whereCreatedBy($value)
 * @method static Builder<static>|Product whereDeletedAt($value)
 * @method static Builder<static>|Product whereDeletedBy($value)
 * @method static Builder<static>|Product whereDescription($value)
 * @method static Builder<static>|Product whereId($value)
 * @method static Builder<static>|Product whereImage($value)
 * @method static Builder<static>|Product whereImageCoa($value)
 * @method static Builder<static>|Product whereImageMsds($value)
 * @method static Builder<static>|Product whereIsActive($value)
 * @method static Builder<static>|Product whereName($value)
 * @method static Builder<static>|Product whereProductCategoryId($value)
 * @method static Builder<static>|Product whereSlug($value)
 * @method static Builder<static>|Product whereUpdatedAt($value)
 * @method static Builder<static>|Product whereUpdatedBy($value)
 * @method static Builder<static>|Product withTrashed()
 * @method static Builder<static>|Product withoutTrashed()
 * @property-read mixed $translate_description
 * @property-read mixed $translate_name
 * @mixin \Eloquent
 * @property string $name_id
 * @property string $name_zh
 * @property string|null $description_id
 * @property string|null $description_zh
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereDescriptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereDescriptionZh($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereNameId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Product whereNameZh($value)
 */
	class Product extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $name_id
 * @property string $name_zh
 * @property string $slug
 * @property string|null $image
 * @property bool $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read string $image_url
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Product> $products
 * @property-read int|null $products_count
 * @property-read \App\Models\User|null $updatedBy
 * @method static Builder<static>|ProductCategory active()
 * @method static \Database\Factories\ProductCategoryFactory factory($count = null, $state = [])
 * @method static Builder<static>|ProductCategory inactive()
 * @method static Builder<static>|ProductCategory newModelQuery()
 * @method static Builder<static>|ProductCategory newQuery()
 * @method static Builder<static>|ProductCategory onlyTrashed()
 * @method static Builder<static>|ProductCategory query()
 * @method static Builder<static>|ProductCategory whereCreatedAt($value)
 * @method static Builder<static>|ProductCategory whereCreatedBy($value)
 * @method static Builder<static>|ProductCategory whereDeletedAt($value)
 * @method static Builder<static>|ProductCategory whereDeletedBy($value)
 * @method static Builder<static>|ProductCategory whereId($value)
 * @method static Builder<static>|ProductCategory whereImage($value)
 * @method static Builder<static>|ProductCategory whereIsActive($value)
 * @method static Builder<static>|ProductCategory whereName($value)
 * @method static Builder<static>|ProductCategory whereNameId($value)
 * @method static Builder<static>|ProductCategory whereNameZh($value)
 * @method static Builder<static>|ProductCategory whereSlug($value)
 * @method static Builder<static>|ProductCategory whereUpdatedAt($value)
 * @method static Builder<static>|ProductCategory whereUpdatedBy($value)
 * @method static Builder<static>|ProductCategory withTrashed()
 * @method static Builder<static>|ProductCategory withoutTrashed()
 * @property-read mixed $translate_name
 * @mixin \Eloquent
 */
	class ProductCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $name_id
 * @property string $name_zh
 * @property string|null $description
 * @property string|null $description_id
 * @property string|null $description_zh
 * @property string|null $image
 * @property bool $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read string $image_url
 * @property-read mixed $translate_description
 * @property-read mixed $translate_name
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\User|null $updatedBy
 * @method static Builder<static>|Slider active()
 * @method static \Database\Factories\SliderFactory factory($count = null, $state = [])
 * @method static Builder<static>|Slider inactive()
 * @method static Builder<static>|Slider newModelQuery()
 * @method static Builder<static>|Slider newQuery()
 * @method static Builder<static>|Slider onlyTrashed()
 * @method static Builder<static>|Slider query()
 * @method static Builder<static>|Slider whereCreatedAt($value)
 * @method static Builder<static>|Slider whereCreatedBy($value)
 * @method static Builder<static>|Slider whereDeletedAt($value)
 * @method static Builder<static>|Slider whereDeletedBy($value)
 * @method static Builder<static>|Slider whereDescription($value)
 * @method static Builder<static>|Slider whereDescriptionId($value)
 * @method static Builder<static>|Slider whereDescriptionZh($value)
 * @method static Builder<static>|Slider whereId($value)
 * @method static Builder<static>|Slider whereImage($value)
 * @method static Builder<static>|Slider whereIsActive($value)
 * @method static Builder<static>|Slider whereName($value)
 * @method static Builder<static>|Slider whereNameId($value)
 * @method static Builder<static>|Slider whereNameZh($value)
 * @method static Builder<static>|Slider whereUpdatedAt($value)
 * @method static Builder<static>|Slider whereUpdatedBy($value)
 * @method static Builder<static>|Slider withTrashed()
 * @method static Builder<static>|Slider withoutTrashed()
 * @mixin \Eloquent
 */
	class Slider extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $username
 * @property string $password
 * @property string|null $image
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property \Illuminate\Support\Carbon|null $phone_verified_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $actions
 * @property-read int|null $actions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read User|null $createdBy
 * @property-read User|null $deletedBy
 * @property-read string $image_url
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read User|null $updatedBy
 * @method static Builder<static>|User active()
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static Builder<static>|User inactive()
 * @method static Builder<static>|User newModelQuery()
 * @method static Builder<static>|User newQuery()
 * @method static Builder<static>|User onlyTrashed()
 * @method static Builder<static>|User permission($permissions, $without = false)
 * @method static Builder<static>|User query()
 * @method static Builder<static>|User role($roles, $guard = null, $without = false)
 * @method static Builder<static>|User whereCreatedAt($value)
 * @method static Builder<static>|User whereCreatedBy($value)
 * @method static Builder<static>|User whereDeletedAt($value)
 * @method static Builder<static>|User whereDeletedBy($value)
 * @method static Builder<static>|User whereEmail($value)
 * @method static Builder<static>|User whereEmailVerifiedAt($value)
 * @method static Builder<static>|User whereId($value)
 * @method static Builder<static>|User whereImage($value)
 * @method static Builder<static>|User whereIsActive($value)
 * @method static Builder<static>|User whereName($value)
 * @method static Builder<static>|User wherePassword($value)
 * @method static Builder<static>|User wherePhone($value)
 * @method static Builder<static>|User wherePhoneVerifiedAt($value)
 * @method static Builder<static>|User whereRememberToken($value)
 * @method static Builder<static>|User whereUpdatedAt($value)
 * @method static Builder<static>|User whereUpdatedBy($value)
 * @method static Builder<static>|User whereUsername($value)
 * @method static Builder<static>|User withTrashed()
 * @method static Builder<static>|User withoutPermission($permissions)
 * @method static Builder<static>|User withoutRole($roles, $guard = null)
 * @method static Builder<static>|User withoutTrashed()
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

