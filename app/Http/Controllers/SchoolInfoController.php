<?php

namespace App\Http\Controllers;

use App\Models\Fees;
use App\Models\SchoolInfo;
use App\Models\StudentLedger;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class SchoolInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $SchoolInfo     = SchoolInfo::latest()->first();
        if ($SchoolInfo !== null) {
            Alert::info('School Register', 'Please Login');
            return redirect('/login');
        }
        return view('backend.school.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $SchoolInfo      = SchoolInfo::latest()->first();
        if ($SchoolInfo !== null) {
            Alert::info('School Registered', 'Please Login');
            return redirect('/login');
        }
        return view('backend.school.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->logo_of_school);
        $request->validate([
            'name_of_school' => 'required',
            'town_and_region_location_of_school' => 'required',
            'digital_address_of_school' => 'required',
            'phone_number_of_school' => 'required',
            'email_of_school' => 'required',
            'logo_of_school' => 'required'
        ]);

        DB::transaction(function () use ($request) {

            if ($request->hasFile('logo_of_school')) {
                $image          = $request->file('logo_of_school');
                $newImageName   = Str::slug($request->name_of_school) . '.' . $image->getClientOriginalExtension();
                // dd($newImageName);
                $location       = public_path('/images/logo');
                $image->move($location, $newImageName);
            } else {
                $newImageName   = 'avatar.png';
                // dd($newImageName);
            }

            $InsertSchoolInfo   = new SchoolInfo;
            $InsertSchoolInfo->name_of_school                       = ucwords($request->name_of_school);
            $InsertSchoolInfo->landmark_location_of_school          = ucwords($request->landmark_location_of_school);
            $InsertSchoolInfo->town_and_region_location_of_school   = ucwords($request->town_and_region_location_of_school);
            $InsertSchoolInfo->digital_address_of_school            = $request->digital_address_of_school;
            $InsertSchoolInfo->phone_number_of_school               = $request->phone_number_of_school;
            $InsertSchoolInfo->email_of_school                      = ucwords($request->email_of_school);
            $InsertSchoolInfo->logo_of_school                       = $newImageName;

            $InsertSchoolInfo->save();
        });

        Alert::success('Congrats', 'School Successfully Registered');
        return redirect('/home');
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

    // public function updateall()
    // {
    //     $ledgerData = Fees::all();
    //     foreach ($ledgerData as $data) {
    //         Fees::where('id', $data->id)->update([
    //             'month_of_payment' => date('m', strtotime($data->date_of_payment)),
    //             'year_of_payment' => date('Y', strtotime($data->date_of_payment)),
    //             'created_at' => date('Y-m-d', strtotime($data->date_of_payment)),
    //             'updated_at' => date('Y-m-d', strtotime($data->date_of_payment))
    //         ]);
    //     }
    //     echo "Updated successfully";
    // }
}
