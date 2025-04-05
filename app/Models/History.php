<?php

namespace App\Models;

use App\Observers\HistoryObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

#[ObservedBy([HistoryObserver::class])]
/**
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
 *
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
 *
 * @mixin \Eloquent
 */
class History extends Model
{
    use HasFactory;
    use LogsActivity;
    use SoftDeletes;

    public $fillable = [
        'year',
        'name',
        'name_id',
        'name_zh',
        'description',
        'description_id',
        'description_zh',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'year' => 'integer',
            'name' => 'string',
            'name_id' => 'string',
            'name_zh' => 'string',
            'description' => 'string',
            'description_id' => 'string',
            'description_zh' => 'string',
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
