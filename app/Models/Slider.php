<?php

namespace App\Models;

use App\Observers\SliderObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

#[ObservedBy([SliderObserver::class])]
/**
 * @property int $id
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
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $deletedBy
 * @property-read mixed $image_url
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\User|null $updatedBy
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider active()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider inactive()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider withoutTrashed()
 *
 * @mixin \Eloquent
 */
class Slider extends Model
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

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeInactive($query)
    {
        return $query->where('is_active', false);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function deletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }

    public function altImage()
    {
        return trans('index.slider')." - {$this->id} - ".env('APP_TITLE');
    }

    public function checkImage()
    {
        if ($this->image && File::exists(public_path("images/slider/{$this->image}"))) {
            return true;
        }
    }

    public function assetImage()
    {
        if ($this->checkImage()) {
            return asset("images/slider/{$this->image}");
        } else {
            return asset('images/image-not-available.png');
        }
    }

    public function deleteImage()
    {
        if ($this->checkImage()) {
            File::delete(public_path("images/slider/{$this->image}"));
        }
    }

    public function getImageUrlAttribute()
    {
        if ($this->checkImage()) {
            return URL::to('/')."/images/slider/{$this->image}";
        }

        return null;
    }
}
