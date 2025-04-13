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
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

#[ObservedBy([FaqObserver::class])]
/**
 * @property int $id
 * @property string $question
 * @property string $question_id
 * @property string $question_zh
 * @property string|null $answer
 * @property string|null $answer_id
 * @property string|null $answer_zh
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
 * @property-read mixed $translate_answer
 * @property-read mixed $translate_question
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \App\Models\User|null $updatedBy
 *
 * @method static Builder<static>|Faq active()
 * @method static \Database\Factories\FaqFactory factory($count = null, $state = [])
 * @method static Builder<static>|Faq inactive()
 * @method static Builder<static>|Faq newModelQuery()
 * @method static Builder<static>|Faq newQuery()
 * @method static Builder<static>|Faq onlyTrashed()
 * @method static Builder<static>|Faq query()
 * @method static Builder<static>|Faq whereAnswer($value)
 * @method static Builder<static>|Faq whereAnswerId($value)
 * @method static Builder<static>|Faq whereAnswerZh($value)
 * @method static Builder<static>|Faq whereCreatedAt($value)
 * @method static Builder<static>|Faq whereCreatedBy($value)
 * @method static Builder<static>|Faq whereDeletedAt($value)
 * @method static Builder<static>|Faq whereDeletedBy($value)
 * @method static Builder<static>|Faq whereId($value)
 * @method static Builder<static>|Faq whereIsActive($value)
 * @method static Builder<static>|Faq whereQuestion($value)
 * @method static Builder<static>|Faq whereQuestionId($value)
 * @method static Builder<static>|Faq whereQuestionZh($value)
 * @method static Builder<static>|Faq whereUpdatedAt($value)
 * @method static Builder<static>|Faq whereUpdatedBy($value)
 * @method static Builder<static>|Faq withTrashed()
 * @method static Builder<static>|Faq withoutTrashed()
 *
 * @mixin \Eloquent
 */
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

    public function getTranslateQuestionAttribute(): string
    {
        $locale = App::getLocale();
        $language = [
            'en' => $this->question,
            'id' => $this->question_id,
            'zh' => $this->question_zh,
        ];

        return $language[$locale] ?? $this->question;
    }

    public function getTranslateAnswerAttribute(): string
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
