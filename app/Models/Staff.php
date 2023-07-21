<?php

namespace App\Models;

use App\Models\CurrentClass;
use App\Models\StaffSubject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Staff extends Model
{
    use HasFactory;

    protected $table = 'staff';

    // Relationship with staff_subjects
    public function subjects()
    {
        return $this->hasMany(StaffSubject::class, 'staff_id');
    }

    // Relationship with Current Class
    public function currentClasses()
    {
        return $this->hasMany(CurrentClass::class, 'form_master');
    }
}
