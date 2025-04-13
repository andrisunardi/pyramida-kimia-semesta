<?php

namespace App\Models;

use App\Observers\CareerObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

#[ObservedBy([CareerObserver::class])]
/**
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
 *
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
 *
 * @mixin \Eloquent
 */
class Career extends Model
{
    use HasFactory;
    use LogsActivity;
    use SoftDeletes;

    public $fillable = [
        'name',
        'name_id',
        'name_zh',
        'description',
        'description_id',
        'description_zh',
        'location',
        'location_id',
        'location_zh',
        'link',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'name' => 'string',
            'name_id' => 'string',
            'name_zh' => 'string',
            'description' => 'string',
            'description_id' => 'string',
            'description_zh' => 'string',
            'location' => 'string',
            'location_id' => 'string',
            'location_zh' => 'string',
            'link' => 'string',
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

    public function getTranslateLocationAttribute(): string
    {
        $locale = App::getLocale();
        $language = [
            'en' => $this->location,
            'id' => $this->location_id,
            'zh' => $this->location_zh,
        ];

        return $language[$locale] ?? $this->location;
    }
}
