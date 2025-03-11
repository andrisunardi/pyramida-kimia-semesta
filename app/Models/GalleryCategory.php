<?php

namespace App\Models;

use App\Observers\GalleryCategoryObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

#[ObservedBy([GalleryCategoryObserver::class])]
/**
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Gallery> $galleries
 * @property-read int|null $galleries_count
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\User|null $updatedBy
 *
 * @method static Builder<static>|GalleryCategory active()
 * @method static Builder<static>|GalleryCategory inactive()
 * @method static Builder<static>|GalleryCategory newModelQuery()
 * @method static Builder<static>|GalleryCategory newQuery()
 * @method static Builder<static>|GalleryCategory onlyTrashed()
 * @method static Builder<static>|GalleryCategory query()
 * @method static Builder<static>|GalleryCategory withTrashed()
 * @method static Builder<static>|GalleryCategory withoutTrashed()
 *
 * @property int $id
 * @property string $name
 * @property bool $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 *
 * @method static Builder<static>|GalleryCategory whereCreatedAt($value)
 * @method static Builder<static>|GalleryCategory whereCreatedBy($value)
 * @method static Builder<static>|GalleryCategory whereDeletedAt($value)
 * @method static Builder<static>|GalleryCategory whereDeletedBy($value)
 * @method static Builder<static>|GalleryCategory whereId($value)
 * @method static Builder<static>|GalleryCategory whereIsActive($value)
 * @method static Builder<static>|GalleryCategory whereName($value)
 * @method static Builder<static>|GalleryCategory whereUpdatedAt($value)
 * @method static Builder<static>|GalleryCategory whereUpdatedBy($value)
 *
 * @mixin \Eloquent
 */
class GalleryCategory extends Model
{
    use HasFactory;
    use LogsActivity;
    use SoftDeletes;

    public $fillable = [
        'name',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'name' => 'string',
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

    public function galleries(): HasMany
    {
        return $this->hasMany(Gallery::class);
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
