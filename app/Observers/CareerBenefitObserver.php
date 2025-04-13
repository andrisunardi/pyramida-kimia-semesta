<?php

namespace App\Observers;

use App\Models\CareerBenefit;
use Illuminate\Support\Facades\Auth;

class CareerBenefitObserver
{
    public function creating(CareerBenefit $careerBenefit): void
    {
        $careerBenefit->created_by = Auth::user()->id ?? null;
    }

    public function created(CareerBenefit $careerBenefit): void
    {
        $careerBenefit->created_by = Auth::user()->id ?? null;
    }

    public function updating(CareerBenefit $careerBenefit): void
    {
        $careerBenefit->updated_by = Auth::user()->id ?? null;
    }

    public function updated(CareerBenefit $careerBenefit): void
    {
        $careerBenefit->updated_by = Auth::user()->id ?? null;
    }

    public function deleting(CareerBenefit $careerBenefit): void
    {
        $careerBenefit->deleted_by = Auth::user()->id ?? null;
        $careerBenefit->save();
    }

    public function deleted(CareerBenefit $careerBenefit): void
    {
        $careerBenefit->deleted_by = Auth::user()->id ?? null;
        $careerBenefit->save();
    }

    public function restoring(CareerBenefit $careerBenefit): void
    {
        $careerBenefit->deleted_by = null;
        $careerBenefit->save();
    }

    public function restored(CareerBenefit $careerBenefit): void
    {
        $careerBenefit->deleted_by = null;
        $careerBenefit->save();
    }

    public function forceDeleted(CareerBenefit $careerBenefit): void {}
}
