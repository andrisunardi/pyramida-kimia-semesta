<?php

namespace App\Services;

use Andrisunardi\Library\Libraries\LivewireUpload;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserService
{
    public function index(
        ?string $search = '',
        array $isActive = [],
        string|int $roleId = '',
        string $permissionName = '',
        bool $random = false,
        bool $trash = false,
        string $orderBy = 'id',
        string $sortBy = 'desc',
        int|string|null $limit = null,
        bool $first = false,
        bool $count = false,
        bool $paginate = true,
        int $perPage = 10,
    ): object {
        $users = User::with('roles.permissions', 'roles', 'permissions')
            ->when($search, fn ($q) => $q->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%")
                    ->orWhere('phone', 'LIKE', "%{$search}%")
                    ->orWhere('username', 'LIKE', "%{$search}%");
            }))
            ->when($isActive, fn ($q) => $q->whereIn('is_active', $isActive))
            ->when($roleId, fn ($q) => $q->role($roleId))
            ->when($permissionName, fn ($q) => $q->permission($permissionName))
            ->when($random, fn ($q) => $q->inRandomOrder())
            ->when($trash, fn ($q) => $q->onlyTrashed())
            ->orderBy($orderBy, $sortBy)
            ->limit($limit);

        if ($first) {
            return $users->first();
        }

        if ($count) {
            return $users->count();
        }

        if ($paginate) {
            return $users->paginate($perPage);
        }

        return $users->get();
    }

    public function create(array $data = []): User
    {
        $roleIds = $data['role_ids'];
        Arr::pull($data, 'role_ids');

        $data['password'] = Hash::make($data['password']);

        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: $data['name'],
            disk: 'images',
            directory: 'user',
            deleteAsset: false,
        );

        $user = User::create($data);
        $user->assignRole($roleIds);

        return $user;
    }

    public function update(User $user, array $data = []): User
    {
        $roleIds = $data['role_ids'];
        Arr::pull($data, 'role_ids');

        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: $data['name'],
            disk: 'images',
            directory: 'user',
            checkAsset: $user->checkImage(),
            fileAsset: $user->image,
            deleteAsset: true,
        );

        if ($data['password']) {
            $data['password'] = Hash::make($data['password']);
        } else {
            Arr::pull($data, 'password');
        }

        $user->update($data);
        $user->syncRoles($roleIds);
        $user->refresh();

        return $user;
    }

    public function active(User $user): User
    {
        $user->is_active = ! $user->is_active;
        $user->save();
        $user->refresh();

        return $user;
    }

    public function deleteImage(User $user)
    {
        $user->deleteImage();

        $user->image = null;
        $user->save();
        $user->refresh();

        return $user;
    }

    public function delete(User $user): bool
    {
        return $user->delete();
    }

    public function deleteAll(array $users = []): bool
    {
        return User::when($users, fn ($q) => $q->whereIn('id', $users))->delete();
    }

    public function restore(User $user): bool
    {
        return $user->restore();
    }

    public function restoreAll(array $users = []): bool
    {
        return User::when($users, fn ($q) => $q->whereIn('id', $users))->onlyTrashed()->restore();
    }

    public function deletePermanent(User $user): bool
    {
        $user->deleteImage();

        return $user->forceDelete();
    }

    public function deletePermanentAll(array $users = []): bool
    {
        $users = User::when($users, fn ($q) => $q->whereIn('id', $users))->onlyTrashed()->get();

        foreach ($users as $user) {
            $user->deleteImage();
            $user->forceDelete();
        }

        return true;
    }

    public function editProfile(User $user, array $data = []): User
    {
        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: $data['name'],
            disk: 'images',
            directory: 'user',
            checkAsset: $user->checkImage(),
            fileAsset: $user->image,
            deleteAsset: false,
        );

        $user->update($data);
        $user->refresh();

        return $user;
    }

    public function changePassword(User $user, array $data = []): User
    {
        $user->update(['password' => Hash::make($data['new_password'])]);
        $user->refresh();

        return $user;
    }

    public function resetPassword(User $user): string
    {
        $password = Str::random(5);
        $user->update(['password' => Hash::make($password)]);
        $user->refresh();

        return $password;
    }
}
