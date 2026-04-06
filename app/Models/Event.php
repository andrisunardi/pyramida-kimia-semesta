<?php

namespace App\Models;

use App\Observers\EventObserver;
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

#[ObservedBy([EventObserver::class])]
/**
 * @property int $id
 * @property string $name
 * @property string $name_id
 * @property string $name_zh
 * @property string|null $description
 * @property string|null $description_id
 * @property string|null $description_zh
 * @property string|null $image
 * @property string|null $video
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
 * @property-read string $translate_description
 * @property-read string $translate_name
 * @property-read string $video_url
 * @property-read \App\Models\User|null $updatedBy
 *
 * @method static Builder<static>|Event active()
 * @method static \Database\Factories\EventFactory factory($count = null, $state = [])
 * @method static Builder<static>|Event inactive()
 * @method static Builder<static>|Event newModelQuery()
 * @method static Builder<static>|Event newQuery()
 * @method static Builder<static>|Event onlyTrashed()
 * @method static Builder<static>|Event query()
 * @method static Builder<static>|Event whereCreatedAt($value)
 * @method static Builder<static>|Event whereCreatedBy($value)
 * @method static Builder<static>|Event whereDeletedAt($value)
 * @method static Builder<static>|Event whereDeletedBy($value)
 * @method static Builder<static>|Event whereDescription($value)
 * @method static Builder<static>|Event whereDescriptionId($value)
 * @method static Builder<static>|Event whereDescriptionZh($value)
 * @method static Builder<static>|Event whereId($value)
 * @method static Builder<static>|Event whereImage($value)
 * @method static Builder<static>|Event whereIsActive($value)
 * @method static Builder<static>|Event whereName($value)
 * @method static Builder<static>|Event whereNameId($value)
 * @method static Builder<static>|Event whereNameZh($value)
 * @method static Builder<static>|Event whereUpdatedAt($value)
 * @method static Builder<static>|Event whereUpdatedBy($value)
 * @method static Builder<static>|Event whereVideo($value)
 * @method static Builder<static>|Event withTrashed(bool $withTrashed = true)
 * @method static Builder<static>|Event withoutTrashed()
 *
 * @mixin \Eloquent
 */
class Event extends Model
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
        'image',
        'video',
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
            'image' => 'string',
            'video' => 'string',
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
        return trans('index.event')." - {$this->translate_name} - ".env('APP_TITLE');
    }

    public function checkImage(): bool
    {
        if ($this->image && File::exists(public_path("images/event/{$this->image}"))) {
            return true;
        }

        return false;
    }

    public function assetImage(): string
    {
        if ($this->checkImage()) {
            return asset("images/event/{$this->image}");
        }

        return asset('images/image-not-available.png');
    }

    public function deleteImage(): bool
    {
        if ($this->checkImage()) {
            File::delete(public_path("images/event/{$this->image}"));

            return true;
        }

        return false;
    }

    public function getImageUrlAttribute(): string
    {
        if ($this->checkImage()) {
            return URL::to('/')."/images/event/{$this->image}";
        }

        return '';
    }

    public function altVideo(): string
    {
        return trans('index.event')." - {$this->translate_name} - ".env('APP_TITLE');
    }

    public function checkVideo(): bool
    {
        if ($this->video && File::exists(public_path("videos/event/{$this->video}"))) {
            return true;
        }

        return false;
    }

    public function assetVideo(): string
    {
        if ($this->checkVideo()) {
            return asset("videos/event/{$this->video}");
        }

        return '';
    }

    public function deleteVideo(): bool
    {
        if ($this->checkVideo()) {
            File::delete(public_path("videos/event/{$this->video}"));

            return true;
        }

        return false;
    }

    public function getVideoUrlAttribute(): string
    {
        if ($this->checkVideo()) {
            return URL::to('/')."/videos/event/{$this->video}";
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
