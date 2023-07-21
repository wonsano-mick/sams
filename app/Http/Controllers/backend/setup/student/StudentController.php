<?php

namespace App\Http\Controllers\backend\setup\student;

use App\Models\House;
use App\Models\Program;
use App\Models\Student;
use Illuminate\Support\Str;
use App\Models\CurrentClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpParser\Node\Expr\New_;
use RealRashid\SweetAlert\Facades\Alert;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studentData    = Student::latest()->get();
        return view('backend.setup.student.index', [
            'studentData' => $studentData
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $houseData          = House::all();
        $programData        = Program::all();
        return view('backend.setup.student.add', [
            'houseData' => $houseData,
            'programData' => $programData
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'surname' => 'required',
            'other_names' => 'required',
            'date_of_birth' => 'required|before:today',
            'current_class' => 'required',
            'house' => 'required',
            'residential_status' => 'required'
        ]);
        // $actualClass   = $request->current_class . ' ' . $request->sub_class;
        // Student Image
        if ($request->hasFile('student_image')) {
            $image          = $request->file('student_image');
            $newImageName   = uniqid() . '_' . Str::slug($request->surname . '_' . $request->other_names) . '.' . $image->getClientOriginalExtension();
            $location       = public_path('/images/studentImages');
            $image->move($location, $newImageName);
        } else {
            $newImageName   = 'avatar.png';
        }

        $RegisterStudent    = new Student;
        $RegisterStudent->sur_name              = ucwords($request->surname);
        $RegisterStudent->other_names           = ucwords($request->other_names);
        $RegisterStudent->gender                = $request->gender;
        $RegisterStudent->date_of_birth         = $request->date_of_birth;
        $RegisterStudent->current_class         = $request->current_class;
        $RegisterStudent->house                 = $request->house;
        $RegisterStudent->residential_status    = $request->residential_status;
        // $RegisterStudent->actual_class          = $request->current_class;
        $RegisterStudent->term                  = $request->term;
        $RegisterStudent->academic_year         = $request->academic_year;
        $RegisterStudent->guardian_name         = ucwords($request->name_of_guardian);
        $RegisterStudent->mobile_number         = $request->contact_number;
        $RegisterStudent->student_image         = $newImageName;

        $RegisterStudent->save();

        // dd($Actual_Class);
        // $ActualClass    = CurrentClass::where('current_class', $actualClass)->first();
        // if ($ActualClass === null) {
        //     $InsertActualClass         = new CurrentClass;
        //     $InsertActualClass->current_class  = $actualClass;
        //     $InsertActualClass->save();
        // }
        Alert::success('Congrats', ucwords($request->surname) . ' ' . ucwords($request->other_names) . ' is Successfully Registered');
        return redirect()->route('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
