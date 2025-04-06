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
 * @property string $name_id
 * @property string $name_zh
 * @property string|null $description
 * @property string|null $description_id
 * @property string|null $description_zh
 * @property array<array-key, mixed>|null $tags
 * @property array<array-key, mixed>|null $tags_id
 * @property array<array-key, mixed>|null $tags_zh
 * @property \Illuminate\Support\Carbon $date
 * @property string|null $image
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
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read string $image_url
 * @property-read mixed $translate_description
 * @property-read mixed $translate_name
 * @property-read mixed $translate_tags
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\User|null $updatedBy
 * @method static Builder<static>|Article active()
 * @method static \Database\Factories\ArticleFactory factory($count = null, $state = [])
 * @method static Builder<static>|Article inactive()
 * @method static Builder<static>|Article newModelQuery()
 * @method static Builder<static>|Article newQuery()
 * @method static Builder<static>|Article onlyTrashed()
 * @method static Builder<static>|Article query()
 * @method static Builder<static>|Article whereCreatedAt($value)
 * @method static Builder<static>|Article whereCreatedBy($value)
 * @method static Builder<static>|Article whereDate($value)
 * @method static Builder<static>|Article whereDeletedAt($value)
 * @method static Builder<static>|Article whereDeletedBy($value)
 * @method static Builder<static>|Article whereDescription($value)
 * @method static Builder<static>|Article whereDescriptionId($value)
 * @method static Builder<static>|Article whereDescriptionZh($value)
 * @method static Builder<static>|Article whereId($value)
 * @method static Builder<static>|Article whereImage($value)
 * @method static Builder<static>|Article whereIsActive($value)
 * @method static Builder<static>|Article whereName($value)
 * @method static Builder<static>|Article whereNameId($value)
 * @method static Builder<static>|Article whereNameZh($value)
 * @method static Builder<static>|Article whereSlug($value)
 * @method static Builder<static>|Article whereTags($value)
 * @method static Builder<static>|Article whereTagsId($value)
 * @method static Builder<static>|Article whereTagsZh($value)
 * @method static Builder<static>|Article whereUpdatedAt($value)
 * @method static Builder<static>|Article whereUpdatedBy($value)
 * @method static Builder<static>|Article withTrashed()
 * @method static Builder<static>|Article withoutTrashed()
 * @mixin \Eloquent
 */
	class Article extends \Eloquent {}
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
 * @property string|null $location
 * @property string|null $location_id
 * @property string|null $location_zh
 * @property string|null $link
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
 * @property-read mixed $translate_description
 * @property-read mixed $translate_location
 * @property-read mixed $translate_name
 * @property-read \App\Models\User|null $updatedBy
 * @method static Builder<static>|Career active()
 * @method static \Database\Factories\CareerFactory factory($count = null, $state = [])
 * @method static Builder<static>|Career inactive()
 * @method static Builder<static>|Career newModelQuery()
 * @method static Builder<static>|Career newQuery()
 * @method static Builder<static>|Career onlyTrashed()
 * @method static Builder<static>|Career query()
 * @method static Builder<static>|Career whereCreatedAt($value)
 * @method static Builder<static>|Career whereCreatedBy($value)
 * @method static Builder<static>|Career whereDeletedAt($value)
 * @method static Builder<static>|Career whereDeletedBy($value)
 * @method static Builder<static>|Career whereDescription($value)
 * @method static Builder<static>|Career whereDescriptionId($value)
 * @method static Builder<static>|Career whereDescriptionZh($value)
 * @method static Builder<static>|Career whereId($value)
 * @method static Builder<static>|Career whereIsActive($value)
 * @method static Builder<static>|Career whereLink($value)
 * @method static Builder<static>|Career whereLocation($value)
 * @method static Builder<static>|Career whereLocationId($value)
 * @method static Builder<static>|Career whereLocationZh($value)
 * @method static Builder<static>|Career whereName($value)
 * @method static Builder<static>|Career whereNameId($value)
 * @method static Builder<static>|Career whereNameZh($value)
 * @method static Builder<static>|Career whereUpdatedAt($value)
 * @method static Builder<static>|Career whereUpdatedBy($value)
 * @method static Builder<static>|Career withTrashed()
 * @method static Builder<static>|Career withoutTrashed()
 * @mixin \Eloquent
 */
	class Career extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read string $image_url
 * @property-read mixed $translate_description
 * @property-read mixed $translate_name
 * @property-read \App\Models\User|null $updatedBy
 * @method static Builder<static>|CareerBenefit active()
 * @method static \Database\Factories\CareerBenefitFactory factory($count = null, $state = [])
 * @method static Builder<static>|CareerBenefit inactive()
 * @method static Builder<static>|CareerBenefit newModelQuery()
 * @method static Builder<static>|CareerBenefit newQuery()
 * @method static Builder<static>|CareerBenefit onlyTrashed()
 * @method static Builder<static>|CareerBenefit query()
 * @method static Builder<static>|CareerBenefit withTrashed()
 * @method static Builder<static>|CareerBenefit withoutTrashed()
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
 * @method static Builder<static>|CareerBenefit whereCreatedAt($value)
 * @method static Builder<static>|CareerBenefit whereCreatedBy($value)
 * @method static Builder<static>|CareerBenefit whereDeletedAt($value)
 * @method static Builder<static>|CareerBenefit whereDeletedBy($value)
 * @method static Builder<static>|CareerBenefit whereDescription($value)
 * @method static Builder<static>|CareerBenefit whereDescriptionId($value)
 * @method static Builder<static>|CareerBenefit whereDescriptionZh($value)
 * @method static Builder<static>|CareerBenefit whereId($value)
 * @method static Builder<static>|CareerBenefit whereImage($value)
 * @method static Builder<static>|CareerBenefit whereIsActive($value)
 * @method static Builder<static>|CareerBenefit whereName($value)
 * @method static Builder<static>|CareerBenefit whereNameId($value)
 * @method static Builder<static>|CareerBenefit whereNameZh($value)
 * @method static Builder<static>|CareerBenefit whereUpdatedAt($value)
 * @method static Builder<static>|CareerBenefit whereUpdatedBy($value)
 * @mixin \Eloquent
 */
	class CareerBenefit extends \Eloquent {}
}

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
 * @property string $question
 * @property string $question_id
 * @property string $question_zh
 * @property string|null $answer
 * @property string|null $answer_id
 * @property string|null $answer_zh
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
 * @property-read mixed $translate_answer
 * @property-read mixed $translate_question
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\User|null $updatedBy
 * @method static Builder<static>|Faq active()
 * @method static \Database\Factories\FaqFactory factory($count = null, $state = [])
 * @method static Builder<static>|Faq inactive()
 * @method static Builder<static>|Faq newModelQuery()
 * @method static Builder<static>|Faq newQuery()
 * @method static Builder<static>|Faq onlyTrashed()
 * @method static Builder<static>|Faq query()
 * @method static Builder<static>|Faq whereAnswer($value)
 * @method static Builder<static>|Faq whereAnswerId($value)
 * @method static Builder<static>|Faq whereAnswerZh($value)
 * @method static Builder<static>|Faq whereCreatedAt($value)
 * @method static Builder<static>|Faq whereCreatedBy($value)
 * @method static Builder<static>|Faq whereDeletedAt($value)
 * @method static Builder<static>|Faq whereDeletedBy($value)
 * @method static Builder<static>|Faq whereId($value)
 * @method static Builder<static>|Faq whereIsActive($value)
 * @method static Builder<static>|Faq whereQuestion($value)
 * @method static Builder<static>|Faq whereQuestionId($value)
 * @method static Builder<static>|Faq whereQuestionZh($value)
 * @method static Builder<static>|Faq whereUpdatedAt($value)
 * @method static Builder<static>|Faq whereUpdatedBy($value)
 * @method static Builder<static>|Faq withTrashed()
 * @method static Builder<static>|Faq withoutTrashed()
 * @mixin \Eloquent
 */
	class Faq extends \Eloquent {}
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
 * @method static \Database\Factories\GalleryCategoryFactory factory($count = null, $state = [])
 * @mixin \Eloquent
 */
	class GalleryCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $year
 * @property string $name
 * @property string $name_id
 * @property string $name_zh
 * @property string|null $description
 * @property string|null $description_id
 * @property string|null $description_zh
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
 * @property-read mixed $translate_description
 * @property-read mixed $translate_name
 * @property-read \App\Models\User|null $updatedBy
 * @method static Builder<static>|History active()
 * @method static \Database\Factories\HistoryFactory factory($count = null, $state = [])
 * @method static Builder<static>|History inactive()
 * @method static Builder<static>|History newModelQuery()
 * @method static Builder<static>|History newQuery()
 * @method static Builder<static>|History onlyTrashed()
 * @method static Builder<static>|History query()
 * @method static Builder<static>|History whereCreatedAt($value)
 * @method static Builder<static>|History whereCreatedBy($value)
 * @method static Builder<static>|History whereDeletedAt($value)
 * @method static Builder<static>|History whereDeletedBy($value)
 * @method static Builder<static>|History whereDescription($value)
 * @method static Builder<static>|History whereDescriptionId($value)
 * @method static Builder<static>|History whereDescriptionZh($value)
 * @method static Builder<static>|History whereId($value)
 * @method static Builder<static>|History whereIsActive($value)
 * @method static Builder<static>|History whereName($value)
 * @method static Builder<static>|History whereNameId($value)
 * @method static Builder<static>|History whereNameZh($value)
 * @method static Builder<static>|History whereUpdatedAt($value)
 * @method static Builder<static>|History whereUpdatedBy($value)
 * @method static Builder<static>|History whereYear($value)
 * @method static Builder<static>|History withTrashed()
 * @method static Builder<static>|History withoutTrashed()
 * @mixin \Eloquent
 */
	class History extends \Eloquent {}
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
 * @property string|null $link
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
 * @property-read \App\Models\User|null $updatedBy
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Partner active()
 * @method static \Database\Factories\PartnerFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Partner inactive()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Partner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Partner newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Partner onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Partner query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Partner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Partner whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Partner whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Partner whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Partner whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Partner whereDescriptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Partner whereDescriptionZh($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Partner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Partner whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Partner whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Partner whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Partner whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Partner whereNameId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Partner whereNameZh($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Partner whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Partner whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Partner withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Partner withoutTrashed()
 */
	class Partner extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $product_category_id
 * @property string $name
 * @property string $name_id
 * @property string $name_zh
 * @property string|null $description
 * @property string|null $description_id
 * @property string|null $description_zh
 * @property string|null $image
 * @property string|null $file_coa
 * @property string|null $file_msds
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
 * @property-read string $file_coa_url
 * @property-read string $file_msds_url
 * @property-read string $image_url
 * @property-read mixed $translate_description
 * @property-read mixed $translate_name
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
 * @method static Builder<static>|Product whereDescriptionId($value)
 * @method static Builder<static>|Product whereDescriptionZh($value)
 * @method static Builder<static>|Product whereFileCoa($value)
 * @method static Builder<static>|Product whereFileMsds($value)
 * @method static Builder<static>|Product whereId($value)
 * @method static Builder<static>|Product whereImage($value)
 * @method static Builder<static>|Product whereIsActive($value)
 * @method static Builder<static>|Product whereName($value)
 * @method static Builder<static>|Product whereNameId($value)
 * @method static Builder<static>|Product whereNameZh($value)
 * @method static Builder<static>|Product whereProductCategoryId($value)
 * @method static Builder<static>|Product whereSlug($value)
 * @method static Builder<static>|Product whereUpdatedAt($value)
 * @method static Builder<static>|Product whereUpdatedBy($value)
 * @method static Builder<static>|Product withTrashed()
 * @method static Builder<static>|Product withoutTrashed()
 * @mixin \Eloquent
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
 * @property string|null $description
 * @property string|null $description_id
 * @property string|null $description_zh
 * @property-read mixed $translate_description
 * @method static Builder<static>|ProductCategory whereDescription($value)
 * @method static Builder<static>|ProductCategory whereDescriptionId($value)
 * @method static Builder<static>|ProductCategory whereDescriptionZh($value)
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
 * @property string $company
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
 * @method static Builder<static>|Testimony active()
 * @method static \Database\Factories\TestimonyFactory factory($count = null, $state = [])
 * @method static Builder<static>|Testimony inactive()
 * @method static Builder<static>|Testimony newModelQuery()
 * @method static Builder<static>|Testimony newQuery()
 * @method static Builder<static>|Testimony onlyTrashed()
 * @method static Builder<static>|Testimony query()
 * @method static Builder<static>|Testimony whereCompany($value)
 * @method static Builder<static>|Testimony whereCreatedAt($value)
 * @method static Builder<static>|Testimony whereCreatedBy($value)
 * @method static Builder<static>|Testimony whereDeletedAt($value)
 * @method static Builder<static>|Testimony whereDeletedBy($value)
 * @method static Builder<static>|Testimony whereId($value)
 * @method static Builder<static>|Testimony whereIsActive($value)
 * @method static Builder<static>|Testimony whereMessage($value)
 * @method static Builder<static>|Testimony whereName($value)
 * @method static Builder<static>|Testimony whereUpdatedAt($value)
 * @method static Builder<static>|Testimony whereUpdatedBy($value)
 * @method static Builder<static>|Testimony withTrashed()
 * @method static Builder<static>|Testimony withoutTrashed()
 * @mixin \Eloquent
 */
	class Testimony extends \Eloquent {}
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

