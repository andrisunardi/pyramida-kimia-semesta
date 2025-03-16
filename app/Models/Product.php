<?php

namespace App\Models;

use App\Observers\ProductObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

#[ObservedBy([ProductObserver::class])]
/**
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
 *
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
 *
 * @property-read mixed $translate_description
 * @property-read mixed $translate_name
 *
 * @mixin \Eloquent
 */
class Product extends Model
{
    use HasFactory;
    use LogsActivity;
    use SoftDeletes;

    public $fillable = [
        'product_category_id',
        'name',
        'description',
        'image',
        'image_coa',
        'image_msds',
        'slug',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'product_category_id' => 'integer',
            'name' => 'string',
            'description' => 'string',
            'image' => 'string',
            'image_coa' => 'string',
            'image_msds' => 'string',
            'slug' => 'string',
            'is_active' => 'boolean',
        ];
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->useLogName($this->table)
            ->logFillable()
            ->logOnlyDirty()
            ->dontSubmitEmptyLogs()
            ->setDescriptionForEvent(fn (string $eventName) => ":subject.name has been {$eventName} by :causer.name");
    }

    public function scopeActive(Builder $query): void
    {
        $query->where('is_active', true);
    }

    public function scopeInactive(Builder $query): void
    {
        $query->where('is_active', false);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function deletedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }

    public function assetImage(): string
    {
        if ($this->checkImage()) {
            return asset("images/product/{$this->image}");
        }

        return asset('images/image-not-available.png');
    }

    public function deleteImage(): bool
    {
        if ($this->checkImage()) {
            File::delete(public_path("images/product/{$this->image}"));

            return true;
        }

        return false;
    }

    public function getImageUrlAttribute(): string
    {
        if ($this->checkImage()) {
            return URL::to('/')."/images/product/{$this->image}";
        }

        return '';
    }

    public function assetImageCoa(): string
    {
        if ($this->checkImageCoa()) {
            return asset("images/product/coa/{$this->image}");
        }

        return asset('images/image-not-available.png');
    }

    public function deleteImageCoa(): bool
    {
        if ($this->checkImageCoa()) {
            File::delete(public_path("images/product/coa/{$this->image}"));

            return true;
        }

        return false;
    }

    public function getImageCoaUrlAttribute(): string
    {
        if ($this->checkImageCoa()) {
            return URL::to('/')."/images/product/coa/{$this->image}";
        }

        return '';
    }

    public function assetImageMsds(): string
    {
        if ($this->checkImageMsds()) {
            return asset("images/product/msds/{$this->image}");
        } else {
            return asset('images/image-not-available.png');
        }
    }

    public function deleteImageMsds(): bool
    {
        if ($this->checkImageMsds()) {
            File::delete(public_path("images/product/msds/{$this->image}"));

            return true;
        }

        return false;
    }

    public function getImageMsdsUrlAttribute(): string
    {
        if ($this->checkImageMsds()) {
            return URL::to('/')."/images/product/msds/{$this->image}";
        }

        return '';
    }

    public function getTranslateNameAttribute()
    {
        $locale = App::getLocale();
        $language = [
            'en' => $this->name,
            'id' => $this->name_id,
            'zh' => $this->name_zh,
        ];

        return $language[$locale] ?? $this->name;
    }

    public function getTranslateDescriptionAttribute()
    {
        $locale = App::getLocale();
        $language = [
            'en' => $this->description,
            'id' => $this->description_id,
            'zh' => $this->description_zh,
        ];

        return $language[$locale] ?? $this->description;
    }
}
