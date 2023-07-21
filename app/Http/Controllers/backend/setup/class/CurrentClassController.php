<?php

namespace App\Http\Controllers\backend\setup\class;

use App\Models\Student;
use App\Models\CurrentClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FormMaster;
use RealRashid\SweetAlert\Facades\Alert;

use function GuzzleHttp\Promise\all;

class CurrentClassController extends Controller
{
    public function students($class)
    {
        $studentData    = Student::where('current_class', $class)->get();

        return view('backend.setup.student.members', [
            'studentData' => $studentData,
            'Class' => $class
        ]);
    }

    public function classStore(Request $request)
    {
        $request->validate([
            'current_class' => 'required|unique:current_classes,current_class'
        ]);
        $insertClass    = new CurrentClass();
        $insertClass->current_class = ucwords($request->current_class);

        $insertClass->save();

        Alert::success('Congrats', ucwords($request->current_class) . ' Successfully Added');
        return redirect()->route('classes.list');
    }

    public function classList(Request $request)
    {
        $classData    = CurrentClass::with('formMaster')->get();
        return view('backend.setup.classes.index', [
            'classData' => $classData,
        ]);
    }

    public function formMastersstore(Request $request)
    {

        $updateData     = CurrentClass::where('id', $request->current_class)->update([
            'form_master' => $request->staff
        ]);

        Alert::success('Congrats', 'Class Master Successfully Added');
        return redirect()->route('classes.list');
    }
}
