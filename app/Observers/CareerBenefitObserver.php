<?php

namespace App\Observers;

use App\Models\CareerBenefit;
use Illuminate\Support\Facades\Auth;

class CareerBenefitObserver
{
    public function creating(CareerBenefit $careerBenefit)
    {
        $careerBenefit->created_by = Auth::user()->id ?? null;
    }

    public function created(CareerBenefit $careerBenefit)
    {
        $careerBenefit->created_by = Auth::user()->id ?? null;
    }

    public function updating(CareerBenefit $careerBenefit)
    {
        $careerBenefit->updated_by = Auth::user()->id ?? null;
    }

    public function updated(CareerBenefit $careerBenefit)
    {
        $careerBenefit->updated_by = Auth::user()->id ?? null;
    }

    public function deleting(CareerBenefit $careerBenefit)
    {
        $careerBenefit->deleted_by = Auth::user()->id ?? null;
        $careerBenefit->save();
    }

    public function deleted(CareerBenefit $careerBenefit)
    {
        $careerBenefit->deleted_by = Auth::user()->id ?? null;
        $careerBenefit->save();
    }

    public function restoring(CareerBenefit $careerBenefit)
    {
        $careerBenefit->deleted_by = null;
        $careerBenefit->save();
    }

    public function restored(CareerBenefit $careerBenefit)
    {
        $careerBenefit->deleted_by = null;
        $careerBenefit->save();
    }

    public function forceDeleted(CareerBenefit $careerBenefit) {}
}
