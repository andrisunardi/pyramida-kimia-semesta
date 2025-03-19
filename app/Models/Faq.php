<?php

namespace App\Models;

use App\Observers\FaqObserver;
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

#[ObservedBy([FaqObserver::class])]
class Faq extends Model
{
    use HasFactory;
    use LogsActivity;
    use SoftDeletes;

    public $fillable = [
        'question',
        'question_id',
        'question_zh',
        'answer',
        'answer_id',
        'answer_zh',
        'slug',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'question' => 'string',
            'question_id' => 'string',
            'question_zh' => 'string',
            'answer' => 'string',
            'answer_id' => 'string',
            'answer_zh' => 'string',
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

    public function getTranslateQuestionAttribute()
    {
        $locale = App::getLocale();
        $language = [
            'en' => $this->question,
            'id' => $this->question_id,
            'zh' => $this->question_zh,
        ];

        return $language[$locale] ?? $this->question;
    }

    public function getTranslateDescriptionAttribute()
    {
        $locale = App::getLocale();
        $language = [
            'en' => $this->answer,
            'id' => $this->answer_id,
            'zh' => $this->answer_zh,
        ];

        return $language[$locale] ?? $this->answer;
    }
}
