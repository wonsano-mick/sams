<?php

namespace App\Models;

use App\Models\StaffSubject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    use HasFactory;

    protected $table = 'subjects';

    // Relationship with staff_subjects
    public function staff()
    {
        return $this->hasMany(StaffSubject::class, 'subject_id');
    }
}
