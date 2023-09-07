<?php

namespace App\Http\Controllers\backend\setup\sba;

use App\Models\Student;
use App\Models\AcademicYear;
use App\Models\StaffSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ContinuousAssessment;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class SBAController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffData = StaffSubject::where('staff_id', Auth::user()->staff_id)
            ->with(['staff', 'currentClass', 'subject'])
            ->latest()->get();
        $groupedClasses = DB::table('staff_subjects')
            ->where('staff_id', Auth::user()->staff_id)
            ->join('current_classes', 'staff_subjects.class_id', '=', 'current_classes.id')
            ->join('subjects', 'staff_subjects.subject_id', '=', 'subjects.id')
            ->select('current_classes.current_class', 'subjects.name')
            ->orderBy('current_classes.current_class')
            ->orderBy('subjects.name')
            ->get()
            ->groupBy('current_class');

        $uniqueSubjects = DB::table('staff_subjects')
            ->where('staff_id', Auth::user()->staff_id)
            ->join('subjects', 'staff_subjects.subject_id', '=', 'subjects.id')
            ->select('subjects.name')
            ->distinct()
            ->orderBy('subjects.name')
            ->get();
        $students       = [];
        $currentClass   = [];
        $subjectName    = [];
        $academicYear = AcademicYear::where('active', 'Yes')->first();

        return view('backend.setup.sba.index', [
            'groupedClasses' => $groupedClasses,
            'students' => $students,
            'academicYear' => $academicYear,
            'staffData' => $staffData,
            'uniqueSubjects' => $uniqueSubjects,
            'currentClass' => $currentClass,
            'subjectName' => $subjectName
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if (isset($data['studentName'])) {

            foreach ($data['studentName'] as $key => $studentName) {

                $continuousAssessment = new ContinuousAssessment();

                $continuousAssessment->academic_year     = $data['academicYear'][$key];
                $continuousAssessment->term              = $data['term'][$key];
                $continuousAssessment->subject_name      = $data['subject'][$key];
                $continuousAssessment->current_class     = $data['currentClass'][$key];
                $continuousAssessment->student_id        = $studentName;
                $continuousAssessment->class_score_1     = $data['classScore1'][$key];
                $continuousAssessment->class_score_2     = $data['classScore2'][$key];
                $continuousAssessment->class_score_3     = $data['classScore3'][$key];
                $continuousAssessment->class_score_4     = $data['classScore4'][$key];
                $continuousAssessment->total_class_score = $data['totalClassScore'][$key];
                $continuousAssessment->exams_score       = $data['examScore'][$key];
                $continuousAssessment->total_exams_score = $data['totalExamScore'][$key];
                $continuousAssessment->total_score       = $data['totalScore'][$key];
                $continuousAssessment->position          = $data['position'][$key];

                $continuousAssessment->save();
            }

            Alert::success('Congrats', 'Continuous Assessment Successfully Saved');
            return redirect()->route('academics.sba');
        } else {
            Alert::error('Oops', 'Student data not found');
            return redirect()->back();
        }
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

    //Load Continuous Assessment
    public function load(Request $request)
    {
        $currentClass = $request->input('current_class');
        $selectedSubject = $request->input('subj_name');
        // dd($selectedSubject);
        session(['selected_subject' => $selectedSubject]);
        $subject = session('selected_subject');
        $subject = (string) $subject;
        // dd($subject);
        $students = Student::where('current_class', $currentClass)->get();

        $staffData = StaffSubject::where('staff_id', Auth::user()->staff_id)
            ->with(['staff', 'currentClass', 'subject'])
            ->latest()->get();

        $groupedClasses = DB::table('staff_subjects')
            ->where('staff_id', Auth::user()->staff_id)
            ->join('current_classes', 'staff_subjects.class_id', '=', 'current_classes.id')
            ->join('subjects', 'staff_subjects.subject_id', '=', 'subjects.id')
            ->select('current_classes.current_class', 'subjects.name')
            ->orderBy('current_classes.current_class')
            ->orderBy('subjects.name')
            ->get()
            ->groupBy('current_class');

        $uniqueSubjects = DB::table('staff_subjects')
            ->where('staff_id', Auth::user()->staff_id)
            ->join('subjects', 'staff_subjects.subject_id', '=', 'subjects.id')
            ->select('subjects.name')
            ->distinct()
            ->orderBy('subjects.name')
            ->get();
        // dd($uniqueSubjects);
        $academicYear = AcademicYear::where('active', 'Yes')->first();

        return view('backend.setup.sba.student_table', [
            'students' => $students,
            'staffData' => $staffData,
            'groupedClasses' => $groupedClasses,
            'uniqueSubjects' => $uniqueSubjects,
            'academicYear' => $academicYear,
            'subjectName' => $subject,
            'currentClass' => $currentClass
        ]);
    }
}
