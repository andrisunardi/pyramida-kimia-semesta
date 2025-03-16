<?php

namespace App\Models;

use App\Observers\ArticleObserver;
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

#[ObservedBy([ArticleObserver::class])]
/**
 * @property int $id
 * @property string $name
 * @property string $name_id
 * @property string $name_zh
 * @property string|null $description
 * @property string|null $description_id
 * @property string|null $description_zh
 * @property array<array-key, mixed>|null $tags
 * @property array<array-key, mixed>|null $tags_id
 * @property array<array-key, mixed>|null $tags_zh
 * @property \Illuminate\Support\Carbon $date
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
 * @property-read mixed $translate_tags
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\User|null $updatedBy
 *
 * @method static Builder<static>|Article active()
 * @method static \Database\Factories\ArticleFactory factory($count = null, $state = [])
 * @method static Builder<static>|Article inactive()
 * @method static Builder<static>|Article newModelQuery()
 * @method static Builder<static>|Article newQuery()
 * @method static Builder<static>|Article onlyTrashed()
 * @method static Builder<static>|Article query()
 * @method static Builder<static>|Article whereCreatedAt($value)
 * @method static Builder<static>|Article whereCreatedBy($value)
 * @method static Builder<static>|Article whereDate($value)
 * @method static Builder<static>|Article whereDeletedAt($value)
 * @method static Builder<static>|Article whereDeletedBy($value)
 * @method static Builder<static>|Article whereDescription($value)
 * @method static Builder<static>|Article whereDescriptionId($value)
 * @method static Builder<static>|Article whereDescriptionZh($value)
 * @method static Builder<static>|Article whereId($value)
 * @method static Builder<static>|Article whereImage($value)
 * @method static Builder<static>|Article whereIsActive($value)
 * @method static Builder<static>|Article whereName($value)
 * @method static Builder<static>|Article whereNameId($value)
 * @method static Builder<static>|Article whereNameZh($value)
 * @method static Builder<static>|Article whereTags($value)
 * @method static Builder<static>|Article whereTagsId($value)
 * @method static Builder<static>|Article whereTagsZh($value)
 * @method static Builder<static>|Article whereUpdatedAt($value)
 * @method static Builder<static>|Article whereUpdatedBy($value)
 * @method static Builder<static>|Article withTrashed()
 * @method static Builder<static>|Article withoutTrashed()
 *
 * @mixin \Eloquent
 */
class Article extends Model
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
        'tags',
        'tags_id',
        'tags_zh',
        'date',
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
            'tags' => 'array',
            'tags_id' => 'array',
            'tags_zh' => 'array',
            'date' => 'date',
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
        return trans('index.article')." - {$this->translate_name} - ".env('APP_TITLE');
    }

    public function checkImage(): bool
    {
        if ($this->image && File::exists(public_path("images/article/{$this->image}"))) {
            return true;
        }

        return false;
    }

    public function assetImage(): string
    {
        if ($this->checkImage()) {
            return asset("images/article/{$this->image}");
        }

        return asset('images/image-not-available.png');
    }

    public function deleteImage(): bool
    {
        if ($this->checkImage()) {
            File::delete(public_path("images/article/{$this->image}"));

            return true;
        }

        return false;
    }

    public function getImageUrlAttribute(): string
    {
        if ($this->checkImage()) {
            return URL::to('/')."/images/article/{$this->image}";
        }

        return '';
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

    public function getTranslateTagsAttribute()
    {
        $locale = App::getLocale();
        $language = [
            'en' => $this->tags,
            'id' => $this->tags_id,
            'zh' => $this->tags_zh,
        ];

        return $language[$locale] ?? $this->tags;
    }
}
