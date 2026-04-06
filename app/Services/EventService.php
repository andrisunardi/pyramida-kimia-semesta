<?php

namespace App\Services;

use Andrisunardi\Library\Libraries\LivewireUpload;
use App\Models\Event;

class EventService
{
    public function index(
        ?string $search = '',
        array $isActive = [],
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
        $events = Event::query()
            ->when($search, fn ($q) => $q->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('name_id', 'LIKE', "%{$search}%")
                    ->orWhere('name_zh', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%")
                    ->orWhere('description_id', 'LIKE', "%{$search}%")
                    ->orWhere('description_zh', 'LIKE', "%{$search}%");
            }))
            ->when($isActive, fn ($q) => $q->whereIn('is_active', $isActive))
            ->when($random, fn ($q) => $q->inRandomOrder())
            ->when($trash, fn ($q) => $q->onlyTrashed())
            ->orderBy($orderBy, $sortBy)
            ->limit($limit);

        if ($first) {
            return $events->first();
        }

        if ($count) {
            return $events->count();
        }

        if ($paginate) {
            return $events->paginate($perPage);
        }

        return $events->get();
    }

    public function create(array $data = []): Event
    {
        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: $data['name'],
            disk: 'images',
            directory: 'event',
            deleteAsset: false,
        );

        $data['video'] = LivewireUpload::upload(
            file: $data['video'],
            name: $data['name'],
            disk: 'videos',
            directory: 'event',
            deleteAsset: false,
        );

        return Event::create($data);
    }

    public function update(Event $event, array $data = []): Event
    {
        $data['image'] = LivewireUpload::upload(
            file: $data['image'],
            name: $data['name'],
            disk: 'images',
            directory: 'event',
            checkAsset: $event->checkImage(),
            fileAsset: $event->image,
            deleteAsset: true,
        );

        $data['video'] = LivewireUpload::upload(
            file: $data['video'],
            name: $data['name'],
            disk: 'videos',
            directory: 'event',
            checkAsset: $event->checkVideo(),
            fileAsset: $event->video,
            deleteAsset: true,
        );

        $event->update($data);
        $event->refresh();

        return $event;
    }

    public function active(Event $event): Event
    {
        $event->is_active = ! $event->is_active;
        $event->save();
        $event->refresh();

        return $event;
    }

    public function deleteImage(Event $event)
    {
        $event->deleteImage();

        $event->image = null;
        $event->save();
        $event->refresh();

        return $event;
    }

    public function deleteVideo(Event $event)
    {
        $event->deleteVideo();

        $event->video = null;
        $event->save();
        $event->refresh();

        return $event;
    }

    public function delete(Event $event): bool
    {
        return $event->delete();
    }

    public function deleteAll(array $events = []): bool
    {
        return Event::when($events, fn ($q) => $q->whereIn('id', $events))->delete();
    }

    public function restore(Event $event): bool
    {
        return $event->restore();
    }

    public function restoreAll(array $events = []): bool
    {
        return Event::when($events, fn ($q) => $q->whereIn('id', $events))->onlyTrashed()->restore();
    }

    public function deletePermanent(Event $event): bool
    {
        $event->deleteImage();
        $event->deleteVideo();

        return $event->forceDelete();
    }

    public function deletePermanentAll(array $events = []): bool
    {
        $events = Event::when($events, fn ($q) => $q->whereIn('id', $events))->onlyTrashed()->get();

        foreach ($events as $event) {
            $event->deleteImage();
            $event->deleteVideo();
            $event->forceDelete();
        }

        return true;
    }
}
