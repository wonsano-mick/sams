<?php

namespace App\Http\Controllers\backend\setup\academicYear;

use App\Models\AcademicYear;
use Illuminate\Http\Request;
use App\Rules\UniqueInputsMatch;
use App\Http\Controllers\Controller;
use App\Models\Student;
use RealRashid\SweetAlert\Facades\Alert;

class AcademicYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $academicYearData   = AcademicYear::latest()->get();

        return view('backend.setup.academicYear.index', [
            'academicYearData' => $academicYearData
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
        $request->validate([
            'academic_year' => ['required', new UniqueInputsMatch(AcademicYear::class)],
            'term' => ['required', new UniqueInputsMatch(AcademicYear::class)],
        ]);

        $insertData     = new AcademicYear();
        $insertData->academic_year  = $request->academic_year;
        $insertData->term           = $request->term;

        $insertData->save();

        $updateStudent  = Student::query()->update([
            'academic_year' => $request->academic_year,
            'term' => $request->term
        ]);

        Alert::success('Congrats',  $request->academic_year . ' ' . $request->term . ' Successfully Added');
        return redirect()->route('years.index');
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
