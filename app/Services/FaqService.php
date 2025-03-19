<?php

namespace App\Services;

use App\Models\Faq;

class FaqService
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
        $faqs = Faq::query()
            ->when($search, fn ($q) => $q->where(function ($query) use ($search) {
                $query->where('question', 'LIKE', "%{$search}%")
                    ->orWhere('question_id', 'LIKE', "%{$search}%")
                    ->orWhere('question_zh', 'LIKE', "%{$search}%")
                    ->orWhere('answer', 'LIKE', "%{$search}%")
                    ->orWhere('answer_id', 'LIKE', "%{$search}%")
                    ->orWhere('answer_zh', 'LIKE', "%{$search}%");
            }))
            ->when($isActive, fn ($q) => $q->whereIn('is_active', $isActive))
            ->when($random, fn ($q) => $q->inRandomOrder())
            ->when($trash, fn ($q) => $q->onlyTrashed())
            ->orderBy($orderBy, $sortBy)
            ->limit($limit);

        if ($first) {
            return $faqs->first();
        }

        if ($count) {
            return $faqs->count();
        }

        if ($paginate) {
            return $faqs->paginate($perPage);
        }

        return $faqs->get();
    }

    public function create(array $data = []): Faq
    {
        return Faq::create($data);
    }

    public function update(Faq $faq, array $data = []): Faq
    {
        $faq->update($data);
        $faq->refresh();

        return $faq;
    }

    public function active(Faq $faq): Faq
    {
        $faq->is_active = ! $faq->is_active;
        $faq->save();
        $faq->refresh();

        return $faq;
    }

    public function delete(Faq $faq): bool
    {
        return $faq->delete();
    }

    public function deleteAll(array $faqs = []): bool
    {
        return Faq::when($faqs, fn ($q) => $q->whereIn('id', $faqs))->delete();
    }

    public function restore(Faq $faq): bool
    {
        return $faq->restore();
    }

    public function restoreAll(array $faqs = []): bool
    {
        return Faq::when($faqs, fn ($q) => $q->whereIn('id', $faqs))->onlyTrashed()->restore();
    }

    public function deletePermanent(Faq $faq): bool
    {
        return $faq->forceDelete();
    }

    public function deletePermanentAll(array $faqs = []): bool
    {
        $faqs = Faq::when($faqs, fn ($q) => $q->whereIn('id', $faqs))->onlyTrashed()->get();

        foreach ($faqs as $faq) {
            $faq->forceDelete();
        }

        return true;
    }
}
