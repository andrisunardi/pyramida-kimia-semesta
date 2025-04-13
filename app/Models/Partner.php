<?php

namespace App\Models;

use App\Observers\PartnerObserver;
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

#[ObservedBy([PartnerObserver::class])]
/**
 * @property int $id
 * @property string $name
 * @property string $name_id
 * @property string $name_zh
 * @property string|null $description
 * @property string|null $description_id
 * @property string|null $description_zh
 * @property string|null $link
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
 * @property-read mixed $translate_description
 * @property-read mixed $translate_name
 * @property-read \App\Models\User|null $updatedBy
 *
 * @method static Builder<static>|Partner active()
 * @method static \Database\Factories\PartnerFactory factory($count = null, $state = [])
 * @method static Builder<static>|Partner inactive()
 * @method static Builder<static>|Partner newModelQuery()
 * @method static Builder<static>|Partner newQuery()
 * @method static Builder<static>|Partner onlyTrashed()
 * @method static Builder<static>|Partner query()
 * @method static Builder<static>|Partner whereCreatedAt($value)
 * @method static Builder<static>|Partner whereCreatedBy($value)
 * @method static Builder<static>|Partner whereDeletedAt($value)
 * @method static Builder<static>|Partner whereDeletedBy($value)
 * @method static Builder<static>|Partner whereDescription($value)
 * @method static Builder<static>|Partner whereDescriptionId($value)
 * @method static Builder<static>|Partner whereDescriptionZh($value)
 * @method static Builder<static>|Partner whereId($value)
 * @method static Builder<static>|Partner whereImage($value)
 * @method static Builder<static>|Partner whereIsActive($value)
 * @method static Builder<static>|Partner whereLink($value)
 * @method static Builder<static>|Partner whereName($value)
 * @method static Builder<static>|Partner whereNameId($value)
 * @method static Builder<static>|Partner whereNameZh($value)
 * @method static Builder<static>|Partner whereUpdatedAt($value)
 * @method static Builder<static>|Partner whereUpdatedBy($value)
 * @method static Builder<static>|Partner withTrashed()
 * @method static Builder<static>|Partner withoutTrashed()
 *
 * @mixin \Eloquent
 */
class Partner extends Model
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
        'link',
        'image',
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
            'link' => 'string',
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
        return trans('index.partner')." - {$this->translate_name} - ".env('APP_TITLE');
    }

    public function checkImage(): bool
    {
        if ($this->image && File::exists(public_path("images/partner/{$this->image}"))) {
            return true;
        }

        return false;
    }

    public function assetImage(): string
    {
        if ($this->checkImage()) {
            return asset("images/partner/{$this->image}");
        }

        return asset('images/image-not-available.png');
    }

    public function deleteImage(): bool
    {
        if ($this->checkImage()) {
            File::delete(public_path("images/partner/{$this->image}"));

            return true;
        }

        return false;
    }

    public function getImageUrlAttribute(): string
    {
        if ($this->checkImage()) {
            return URL::to('/')."/images/partner/{$this->image}";
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
