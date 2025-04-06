<?php

namespace App\Models;

use App\Observers\OfficeObserver;
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

#[ObservedBy([OfficeObserver::class])]
/**
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $maps
 * @property string $phone
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
 * @property-read \App\Models\User|null $updatedBy
 *
 * @method static Builder<static>|Office active()
 * @method static \Database\Factories\OfficeFactory factory($count = null, $state = [])
 * @method static Builder<static>|Office inactive()
 * @method static Builder<static>|Office newModelQuery()
 * @method static Builder<static>|Office newQuery()
 * @method static Builder<static>|Office onlyTrashed()
 * @method static Builder<static>|Office query()
 * @method static Builder<static>|Office whereAddress($value)
 * @method static Builder<static>|Office whereCreatedAt($value)
 * @method static Builder<static>|Office whereCreatedBy($value)
 * @method static Builder<static>|Office whereDeletedAt($value)
 * @method static Builder<static>|Office whereDeletedBy($value)
 * @method static Builder<static>|Office whereId($value)
 * @method static Builder<static>|Office whereImage($value)
 * @method static Builder<static>|Office whereIsActive($value)
 * @method static Builder<static>|Office whereMaps($value)
 * @method static Builder<static>|Office whereName($value)
 * @method static Builder<static>|Office wherePhone($value)
 * @method static Builder<static>|Office whereUpdatedAt($value)
 * @method static Builder<static>|Office whereUpdatedBy($value)
 * @method static Builder<static>|Office withTrashed()
 * @method static Builder<static>|Office withoutTrashed()
 *
 * @mixin \Eloquent
 */
class Office extends Model
{
    use HasFactory;
    use LogsActivity;
    use SoftDeletes;

    public $fillable = [
        'name',
        'address',
        'maps',
        'phone',
        'image',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'name' => 'string',
            'address' => 'string',
            'maps' => 'string',
            'phone' => 'string',
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
        return trans('index.office')." - {$this->name} - ".env('APP_TITLE');
    }

    public function checkImage(): bool
    {
        if ($this->image && File::exists(public_path("images/office/{$this->image}"))) {
            return true;
        }

        return false;
    }

    public function assetImage(): string
    {
        if ($this->checkImage()) {
            return asset("images/office/{$this->image}");
        }

        return asset('images/image-not-available.png');
    }

    public function deleteImage(): bool
    {
        if ($this->checkImage()) {
            File::delete(public_path("images/office/{$this->image}"));

            return true;
        }

        return false;
    }

    public function getImageUrlAttribute(): string
    {
        if ($this->checkImage()) {
            return URL::to('/')."/images/office/{$this->image}";
        }

        return '';
    }
}
