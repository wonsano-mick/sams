<?php

namespace App\Models;

use App\Models\Staff;
use App\Models\StaffSubject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CurrentClass extends Model
{
    use HasFactory;

    protected $table = 'current_classes';

    // Relationship with staff_subjects
    public function subjects()
    {
        return $this->hasMany(StaffSubject::class, 'class_id');
    }

    //Relationship with Staff
    public function formMaster()
    {
        return $this->belongsTo(Staff::class, 'form_master');
    }
}
