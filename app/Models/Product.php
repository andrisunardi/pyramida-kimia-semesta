<?php

namespace App\Models;

use App\Observers\ProductObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;

#[ObservedBy([ProductObserver::class])]
class Product extends Model
{
    use HasFactory;
    use LogsActivity;
    use SoftDeletes;

    public $fillable = [
        'product_category_id',
        'name',
        'description',
        'image',
        'image_coa',
        'image_msds',
        'slug',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'product_category_id' => 'integer',
            'name' => 'string',
            'description' => 'string',
            'image' => 'string',
            'image_coa' => 'string',
            'image_msds' => 'string',
            'slug' => 'string',
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

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
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

    public function assetImage()
    {
        if ($this->checkImage()) {
            return asset("images/product/{$this->image}");
        } else {
            return asset('images/image-not-available.png');
        }
    }

    public function deleteImage()
    {
        if ($this->checkImage()) {
            File::delete(public_path("images/product/{$this->image}"));
        }
    }

    public function getImageUrlAttribute()
    {
        if ($this->checkImage()) {
            return URL::to('/')."/images/product/{$this->image}";
        }

        return null;
    }

    public function assetImageCoa()
    {
        if ($this->checkImageCoa()) {
            return asset("images/product/coa/{$this->image}");
        } else {
            return asset('images/image-not-available.png');
        }
    }

    public function deleteImageCoa()
    {
        if ($this->checkImageCoa()) {
            File::delete(public_path("images/product/coa/{$this->image}"));
        }
    }

    public function getImageCoaUrlAttribute()
    {
        if ($this->checkImageCoa()) {
            return URL::to('/')."/images/product/coa/{$this->image}";
        }

        return null;
    }

    public function assetImageMsds()
    {
        if ($this->checkImageMsds()) {
            return asset("images/product/msds/{$this->image}");
        } else {
            return asset('images/image-not-available.png');
        }
    }

    public function deleteImageMsds()
    {
        if ($this->checkImageMsds()) {
            File::delete(public_path("images/product/msds/{$this->image}"));
        }
    }

    public function getImageMsdsUrlAttribute()
    {
        if ($this->checkImageMsds()) {
            return URL::to('/')."/images/product/msds/{$this->image}";
        }

        return null;
    }
}
