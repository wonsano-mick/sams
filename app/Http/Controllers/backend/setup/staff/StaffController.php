<?php

namespace App\Http\Controllers\backend\setup\staff;

use App\Models\Staff;
use App\Models\Subject;
use Illuminate\Support\Str;
use App\Models\CurrentClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\StaffSubject;
use RealRashid\SweetAlert\Facades\Alert;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource. 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffData    = Staff::latest()->get();
        return view('backend.setup.staff.index', [
            'staffData' => $staffData
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.setup.staff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'surname' => 'required',
            'other_names' => 'required',
            'date_of_birth' => 'required|before:tomorrow',
            'gender' => 'required',
            'department' => 'required',
            'date_of_employment' => 'required',
        ]);

        DB::transaction(function () use ($request) {
            $cutDateOfEmployment    = substr(date('d-m-Y', strtotime($request->date_employed)), 8, 2);

            // $LastIdQuery            = Staff::latest('id')->first();
            // // $LastId                 = $LastIdQuery->SN;
            // if ($LastIdQuery === null) {
            //     $SId                = 1;
            //     $sch_id             = 'WKL';
            //     $spri_id            = sprintf("%03d", $SId);
            //     $staff_id           = "$sch_id" . "$spri_id" . "$cutDateOfEmployment";
            // } else {
            //     $LastId             = $LastIdQuery->id;
            //     $sch_id             = 'WKL';
            //     $cut_sch_id         = substr($LastId, 3, 3);
            //     if ($LastId    >= 999) {
            //         $cut_sch_id++;
            //         $SId = 1;
            //     } else {
            //         $pre_sid        = $LastId;
            //         $SId            = $pre_sid + 1;
            //     }
            //     $spri_id            = sprintf("%03d", $SId);
            //     $staff_id           = "$sch_id" . "$spri_id" . "$cutDateOfEmployment";
            // }

            if ($request->hasFile('staff_image')) {
                $image          = $request->file('staff_image');
                $newImageName   = uniqid() . '-' . Str::slug($request->surname . '_' . $request->other_names) . '.' . $image->getClientOriginalExtension();
                $location       = public_path('/staffImages');
                $image->move($location, $newImageName);
            } else {
                $newImageName   = 'avatar.png';
            }
            $InsertEmployee     = new Staff();

            // $InsertEmployee->staff_id           = $staff_id;
            $InsertEmployee->sur_name           = ucwords($request->surname);
            $InsertEmployee->other_names        = ucwords($request->other_names);
            $InsertEmployee->date_of_birth      = $request->date_of_birth;
            $InsertEmployee->gender             = $request->gender;
            $InsertEmployee->phone_number       = $request->phone_number;
            $InsertEmployee->mobile_number      = $request->mobile_number;
            $InsertEmployee->email              = $request->email;
            $InsertEmployee->residential_address = $request->residential_address;
            $InsertEmployee->department         = $request->department;
            $InsertEmployee->job_title          = $request->job_title;
            $InsertEmployee->date_of_employment = $request->date_employed;
            $InsertEmployee->staff_image        = $newImageName;

            $InsertEmployee->save();
        });

        Alert::success('Success', 'Staff Successfully Registered');
        return redirect()->route('staff.list');
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

    public function staffSubjects()
    {
        $subjectsData   = Subject::all();
        $staffData      = Staff::all();
        $classData      = CurrentClass::all();

        return view('backend.setup.staff.subjects', [
            'subjectsData' => $subjectsData,
            'staffData' => $staffData,
            'classData' => $classData
        ]);
    }

    public function staffSubjectsStore(Request $request)
    {
        for ($i = 0; $i < count($request->staff_id); $i++) {

            $insertData = new StaffSubject();
            $insertData->staff_id = $request->staff_id[$i];
            $insertData->class_id = $request->class_id[$i];
            $insertData->subject_id = $request->subject_id[$i];

            $insertData->save();
        }

        Alert::success('Congrats', 'Staff Assigned Subject(s) Successfully');
        return redirect()->route('staff.subjects.list');
    }

    public function staffSubjectsList()
    {
        $staffSubjects = StaffSubject::with(['staff', 'currentClass', 'subject'])
            ->latest()->get();

        return view('backend.setup.staff.assigned-subject', [
            'staffSubjects' => $staffSubjects
        ]);
    }

    public function staffSubjectsEdit($subjectId)
    {
        $subjectData = StaffSubject::where('id', $subjectId)->with(['staff', 'currentClass', 'subject'])->first();
        $subjectsData   = Subject::all();
        $staffData      = Staff::all();
        $classData      = CurrentClass::all();

        return view('backend.setup.staff.subjectEdit', [
            'subjectData' => $subjectData,
            'subjectsData' => $subjectsData,
            'staffData' => $staffData,
            'classData' => $classData
        ]);
    }

    public function staffSubjectsUpdate(Request $request, $id)
    {
        $updateData     = StaffSubject::where('id', $id)->update([
            'class_id' => $request->class_id,
            'subject_id' => $request->subject_id
        ]);

        Alert::success('Congrats', 'Staff Assigned Subject Updated Successfully');
        return redirect()->route('staff.subjects.list');
    }

    public function staffSubjectDestroy($id)
    {
        $assignedSubjectData   = StaffSubject::find($id);
        $assignedSubjectData->delete();

        Alert::success('Congrats', 'Staff Assigned Subject Deleted Successfully');
        return redirect()->route('staff.subjects.list');
    }
}
