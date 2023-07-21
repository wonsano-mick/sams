<?php

namespace App\Http\Controllers\backend\setup\house;

use App\Models\House;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class HouseController extends Controller
{
    public function index()
    {

        $allData = House::orderBy('house', 'ASC')->get();
        return view('backend.setup.house.index', [
            'allData' => $allData
        ]);
    }

    public function create()
    {

        $allData  = House::latest()->get();
        return view('backend.setup.house.create', [
            'title' => 'Add House',
            'allData' => $allData
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'house' => 'required'
        ]);

        $InsertData         = new House;
        $InsertData->house  = ucwords($request->house);

        $InsertData->save();

        Alert::success('Congrats', 'House Added Successfully');
        return back();
    }

    public function edit($id)
    {
        $editData    = House::find($id);
        return view('backend.setup.house.update', [
            'title' => 'Update House',
            'editData' => $editData
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'house' => 'required'
        ]);

        $UpdateData         = House::find($id);
        $UpdateData->house  = ucwords($request->house);

        $UpdateData->save();

        Alert::success('Congrats', 'House Details Updated Successfully');
        return redirect()->route('houses.index');
    }

    public function delete($id)
    {

        $Product        = House::find($id);
        $Product->delete();

        Alert::warning('Done', 'House Details Successfully Deleted');
        return redirect()->route('houses.index');
    }

    public function students($house)
    {
        $houseData    = Student::where('house', $house)->get();
        return view('backend.setup.house.members', [
            'houseData' => $houseData,
            'House' => $house
        ]);
    }
}
