<?php

namespace App\Models;

use App\Observers\ProductCategoryObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

#[ObservedBy([ProductCategoryObserver::class])]
/**
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
 *
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
 *
 * @mixin \Eloquent
 */
class ProductCategory extends Model
{
    use HasFactory;
    use LogsActivity;
    use SoftDeletes;

    public $fillable = [
        'name',
        'name_id',
        'name_zh',
        'image',
        'slug',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'name' => 'string',
            'name_id' => 'string',
            'name_zh' => 'string',
            'image' => 'string',
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

    public function assetImage(): string
    {
        if ($this->checkImage()) {
            return asset("images/product/category/{$this->image}");
        }

        return asset('images/image-not-available.png');
    }

    public function deleteImage(): bool
    {
        if ($this->checkImage()) {
            File::delete(public_path("images/product/category/{$this->image}"));

            return true;
        }

        return false;
    }

    public function getImageUrlAttribute(): string
    {
        if ($this->checkImage()) {
            return URL::to('/')."/images/product/category/{$this->image}";
        }

        return '';
    }

    public function scopeActive(Builder $query): void
    {
        $query->where('is_active', true);
    }

    public function scopeInactive(Builder $query): void
    {
        $query->where('is_active', false);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
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
}
