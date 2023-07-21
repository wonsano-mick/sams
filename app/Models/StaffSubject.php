<?php

namespace App\Models;

use App\Models\Staff;
use App\Models\Subject;
use App\Models\CurrentClass;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StaffSubject extends Model
{
    use HasFactory;

    protected $table = 'staff_subjects';

    // Relationship with staff
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id'); // Correct the foreign key here
    }

    // Relationship with current_classes
    public function currentClass()
    {
        return $this->belongsTo(CurrentClass::class, 'class_id'); // Correct the foreign key here
    }

    // Relationship with subjects
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id'); // Correct the foreign key here
    }
}
