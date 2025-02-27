<?php

namespace App\Services;

use App\Models\Contact;

class ContactService
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
        $contacts = Contact::query()
            ->when($search, fn ($q) => $q->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('company', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%")
                    ->orWhere('phone', 'LIKE', "%{$search}%")
                    ->orWhere('subject', 'LIKE', "%{$search}%")
                    ->orWhere('message', 'LIKE', "%{$search}%");
            }))
            ->when($isActive, fn ($q) => $q->whereIn('is_active', $isActive))
            ->when($random, fn ($q) => $q->inRandomOrder())
            ->when($trash, fn ($q) => $q->onlyTrashed())
            ->orderBy($orderBy, $sortBy)
            ->limit($limit);

        if ($first) {
            return $contacts->first();
        }

        if ($count) {
            return $contacts->count();
        }

        if ($paginate) {
            return $contacts->paginate($perPage);
        }

        return $contacts->get();
    }

    public function create(array $data = []): Contact
    {
        return Contact::create($data);
    }

    public function update(Contact $contact, array $data = []): Contact
    {
        $contact->update($data);
        $contact->refresh();

        return $contact;
    }

    public function active(Contact $contact): Contact
    {
        $contact->is_active = ! $contact->is_active;
        $contact->save();
        $contact->refresh();

        return $contact;
    }

    public function delete(Contact $contact): bool
    {
        return $contact->delete();
    }
}
