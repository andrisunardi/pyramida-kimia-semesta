<?php

namespace App\Models;

use App\Observers\ContactObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

#[ObservedBy([ContactObserver::class])]
/**
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
 *
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
 *
 * @mixin \Eloquent
 */
class Contact extends Model
{
    use HasFactory;
    use LogsActivity;
    use SoftDeletes;

    public $fillable = [
        'name',
        'company',
        'email',
        'phone',
        'subject',
        'message',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'name' => 'string',
            'company' => 'string',
            'email' => 'string',
            'phone' => 'string',
            'subject' => 'string',
            'message' => 'string',
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
}
