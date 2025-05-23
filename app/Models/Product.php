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
        'name_id',
        'name_zh',
        'description',
        'description_id',
        'description_zh',
        'image',
        'file_coa',
        'file_msds',
        'slug',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'product_category_id' => 'integer',
            'name' => 'string',
            'name_id' => 'string',
            'name_zh' => 'string',
            'description' => 'string',
            'description_id' => 'string',
            'description_zh' => 'string',
            'image' => 'string',
            'file_coa' => 'string',
            'file_msds' => 'string',
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

    public function altImage(): string
    {
        return trans('index.product')." - {$this->translate_name} - ".env('APP_TITLE');
    }

    public function checkImage(): bool
    {
        if ($this->image && File::exists(public_path("images/product/{$this->image}"))) {
            return true;
        }

        return false;
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

    public function altFileCoa(): string
    {
        return trans('index.product')." - {$this->translate_name} - ".env('APP_TITLE');
    }

    public function checkFileCoa()
    {
        if ($this->file_coa && File::exists(public_path("files/product/coa/{$this->file_coa}"))) {
            return true;
        }

        return false;
    }

    public function assetFileCoa(): string
    {
        if ($this->checkFileCoa()) {
            return asset("files/product/coa/{$this->file_coa}");
        }

        return asset('files/file-not-available.pdf');
    }

    public function deleteFileCoa(): bool
    {
        if ($this->checkFileCoa()) {
            File::delete(public_path("files/product/coa/{$this->file_coa}"));

            return true;
        }

        return false;
    }

    public function getFileCoaUrlAttribute(): string
    {
        if ($this->checkFileCoa()) {
            return URL::to('/')."/files/product/coa/{$this->file_coa}";
        }

        return '';
    }

    public function altFileMsds(): string
    {
        return trans('index.product')." - {$this->translate_name} - ".env('APP_TITLE');
    }

    public function checkFileMsds(): bool
    {
        if ($this->file_msds && File::exists(public_path("files/product/msds/{$this->file_msds}"))) {
            return true;
        }

        return false;
    }

    public function assetFileMsds(): string
    {
        if ($this->checkFileMsds()) {
            return asset("files/product/msds/{$this->file_msds}");
        } else {
            return asset('files/file-not-available.pdf');
        }
    }

    public function deleteFileMsds(): bool
    {
        if ($this->checkFileMsds()) {
            File::delete(public_path("files/product/msds/{$this->file_msds}"));

            return true;
        }

        return false;
    }

    public function getFileMsdsUrlAttribute(): string
    {
        if ($this->checkFileMsds()) {
            return URL::to('/')."/files/product/msds/{$this->file_msds}";
        }

        return '';
    }

    public function getTranslateNameAttribute(): string
    {
        $locale = App::getLocale();
        $language = [
            'en' => $this->name,
            'id' => $this->name_id,
            'zh' => $this->name_zh,
        ];

        return $language[$locale] ?? $this->name;
    }

    public function getTranslateDescriptionAttribute(): string
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
