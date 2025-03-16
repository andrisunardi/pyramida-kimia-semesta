<?php

namespace App\Models;

use App\Observers\GalleryObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

#[ObservedBy([GalleryObserver::class])]
/**
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read string $image_url
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\User|null $updatedBy
 *
 * @method static Builder<static>|Gallery active()
 * @method static Builder<static>|Gallery inactive()
 * @method static Builder<static>|Gallery newModelQuery()
 * @method static Builder<static>|Gallery newQuery()
 * @method static Builder<static>|Gallery onlyTrashed()
 * @method static Builder<static>|Gallery query()
 * @method static Builder<static>|Gallery withTrashed()
 * @method static Builder<static>|Gallery withoutTrashed()
 *
 * @property int $id
 * @property int $gallery_category_id
 * @property string $name
 * @property string|null $description
 * @property string|null $image
 * @property bool $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 *
 * @method static Builder<static>|Gallery whereCreatedAt($value)
 * @method static Builder<static>|Gallery whereCreatedBy($value)
 * @method static Builder<static>|Gallery whereDeletedAt($value)
 * @method static Builder<static>|Gallery whereDeletedBy($value)
 * @method static Builder<static>|Gallery whereDescription($value)
 * @method static Builder<static>|Gallery whereGalleryCategoryId($value)
 * @method static Builder<static>|Gallery whereId($value)
 * @method static Builder<static>|Gallery whereImage($value)
 * @method static Builder<static>|Gallery whereIsActive($value)
 * @method static Builder<static>|Gallery whereName($value)
 * @method static Builder<static>|Gallery whereUpdatedAt($value)
 * @method static Builder<static>|Gallery whereUpdatedBy($value)
 *
 * @property-read \App\Models\GalleryCategory $category
 *
 * @method static \Database\Factories\GalleryFactory factory($count = null, $state = [])
 *
 * @mixin \Eloquent
 */
class Gallery extends Model
{
    use HasFactory;
    use LogsActivity;
    use SoftDeletes;

    public $fillable = [
        'name',
        'description',
        'image',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'name' => 'string',
            'description' => 'string',
            'image' => 'string',
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
        return trans('index.gallery')." - {$this->id} - ".env('APP_TITLE');
    }

    public function checkImage(): bool
    {
        if ($this->image && File::exists(public_path("images/gallery/{$this->image}"))) {
            return true;
        }

        return false;
    }

    public function assetImage(): string
    {
        if ($this->checkImage()) {
            return asset("images/gallery/{$this->image}");
        }

        return asset('images/image-not-available.png');
    }

    public function deleteImage(): bool
    {
        if ($this->checkImage()) {
            File::delete(public_path("images/gallery/{$this->image}"));

            return true;
        }

        return false;
    }

    public function getImageUrlAttribute(): string
    {
        if ($this->checkImage()) {
            return URL::to('/')."/images/gallery/{$this->image}";
        }

        return '';
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(GalleryCategory::class, 'gallery_category_id');
    }
}
