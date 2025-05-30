<?php

namespace App\Models;

use App\Observers\TestimonyObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\App;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

#[ObservedBy([TestimonyObserver::class])]
/**
 * @property int $id
 * @property string $name
 * @property string $company
 * @property string $message
 * @property string|null $message_id
 * @property string|null $message_zh
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
 * @property-read string $translate_name
 * @property-read \App\Models\User|null $updatedBy
 *
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
 * @method static Builder<static>|Testimony whereMessageId($value)
 * @method static Builder<static>|Testimony whereMessageZh($value)
 * @method static Builder<static>|Testimony whereName($value)
 * @method static Builder<static>|Testimony whereUpdatedAt($value)
 * @method static Builder<static>|Testimony whereUpdatedBy($value)
 * @method static Builder<static>|Testimony withTrashed()
 * @method static Builder<static>|Testimony withoutTrashed()
 *
 * @mixin \Eloquent
 */
class Testimony extends Model
{
    use HasFactory;
    use LogsActivity;
    use SoftDeletes;

    public $fillable = [
        'name',
        'company',
        'message',
        'message_id',
        'message_zh',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'name' => 'string',
            'company' => 'string',
            'message' => 'string',
            'message_id' => 'string',
            'message_zh' => 'string',
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
            'en' => $this->message,
            'id' => $this->message_id,
            'zh' => $this->message_zh,
        ];

        return $language[$locale] ?? $this->message;
    }
}
