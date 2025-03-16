<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Observers\UserObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\CausesActivity;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;

#[ObservedBy([UserObserver::class])]
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $username
 * @property string $password
 * @property string|null $image
 * @property bool $is_active
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property \Illuminate\Support\Carbon|null $phone_verified_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $actions
 * @property-read int|null $actions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read User|null $createdBy
 * @property-read User|null $deletedBy
 * @property-read string $image_url
 * @property-read \App\Models\TFactory|null $use_factory
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read User|null $updatedBy
 *
 * @method static Builder<static>|User active()
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static Builder<static>|User inactive()
 * @method static Builder<static>|User newModelQuery()
 * @method static Builder<static>|User newQuery()
 * @method static Builder<static>|User onlyTrashed()
 * @method static Builder<static>|User permission($permissions, $without = false)
 * @method static Builder<static>|User query()
 * @method static Builder<static>|User role($roles, $guard = null, $without = false)
 * @method static Builder<static>|User whereCreatedAt($value)
 * @method static Builder<static>|User whereCreatedBy($value)
 * @method static Builder<static>|User whereDeletedAt($value)
 * @method static Builder<static>|User whereDeletedBy($value)
 * @method static Builder<static>|User whereEmail($value)
 * @method static Builder<static>|User whereEmailVerifiedAt($value)
 * @method static Builder<static>|User whereId($value)
 * @method static Builder<static>|User whereImage($value)
 * @method static Builder<static>|User whereIsActive($value)
 * @method static Builder<static>|User whereName($value)
 * @method static Builder<static>|User wherePassword($value)
 * @method static Builder<static>|User wherePhone($value)
 * @method static Builder<static>|User wherePhoneVerifiedAt($value)
 * @method static Builder<static>|User whereRememberToken($value)
 * @method static Builder<static>|User whereUpdatedAt($value)
 * @method static Builder<static>|User whereUpdatedBy($value)
 * @method static Builder<static>|User whereUsername($value)
 * @method static Builder<static>|User withTrashed()
 * @method static Builder<static>|User withoutPermission($permissions)
 * @method static Builder<static>|User withoutRole($roles, $guard = null)
 * @method static Builder<static>|User withoutTrashed()
 *
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use CausesActivity;
    use HasFactory;
    use HasRoles;
    use LogsActivity;
    use Notifiable;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'username',
        'password',
        'image',
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'name' => 'string',
            'email' => 'string',
            'phone' => 'string',
            'username' => 'string',
            'password' => 'hashed',
            'image' => 'string',
            'is_active' => 'boolean',
            'email_verified_at' => 'datetime',
            'phone_verified_at' => 'datetime',
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
        return trans('index.user')." - {$this->id} - ".env('APP_TITLE');
    }

    public function checkImage(): bool
    {
        if ($this->image && File::exists(public_path("images/user/{$this->image}"))) {
            return true;
        }

        return false;
    }

    public function assetImage(): string
    {
        if ($this->checkImage()) {
            return asset("images/user/{$this->image}");
        }

        return asset('images/image-not-available.png');
    }

    public function deleteImage(): bool
    {
        if ($this->checkImage()) {
            File::delete(public_path("images/user/{$this->image}"));

            return true;
        }

        return false;
    }

    public function getImageUrlAttribute(): string
    {
        if ($this->checkImage()) {
            return URL::to('/')."/images/user/{$this->image}";
        }

        return '';
    }
}
