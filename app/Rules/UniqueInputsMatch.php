<?php

namespace App\Rules;

use App\Models\AcademicYear;
use Illuminate\Contracts\Validation\Rule;

class UniqueInputsMatch implements Rule
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function passes($attribute, $value)
    {
        $academic_year = request()->academic_year;
        $term = request()->term;

        $existingData = AcademicYear::where('academic_year', $academic_year)
            ->where('term', $term)
            ->exists();

        return !$existingData;
    }

    public function message()
    {
        return 'The selected inputs already exist.';
    }
}
