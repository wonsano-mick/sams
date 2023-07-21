<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\ProspectusItem;
use App\Models\ReleaseItem;
use RealRashid\SweetAlert\Facades\Alert;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allData    = ProspectusItem::all();
        return view('backend.setup.item.index', [
            'allData' => $allData
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
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
            'item' => 'required|unique:prospectus_items,name_of_item'
        ]);

        $AddItem    = new ProspectusItem;
        $AddItem->name_of_item  = ucwords($request->item);

        $AddItem->save();

        Alert::success('Congrats', 'Item Added Successfully');
        return redirect()->back();
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

    public function students()
    {
        $studentData    = Student::latest()->get();
        return view('backend.setup.item.student', [
            'studentData' => $studentData
        ]);
    }

    public function add($id)
    {
        $studentData    = Student::find($id);
        $Items          = ProspectusItem::all();
        return view('backend.setup.item.add', [
            'studentData' => $studentData,
            'Items' => $Items
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeItems(Request $request)
    {
        $request->validate([
            'item_id' => 'required',
            'quantity' => 'required'
        ]);

        for ($item_id = 0; $item_id < count($request->item_id); $item_id++) {

            $AddItems   = new Item;
            $AddItems->student_id   = $request->student_id;
            $AddItems->item_id      = $request->item_id[$item_id];
            $AddItems->quantity     = $request->quantity[$item_id];

            $AddItems->save();

            $Quantity       = ProspectusItem::where('id', $request->item_id[$item_id])->first();
            $Item       = ProspectusItem::where('id', $request->item_id[$item_id])->update([
                'items_in_store' => $Quantity->items_in_store + $request->quantity[$item_id]
            ]);
        }

        Alert::success('Congrats', 'Items Added Successfully');
        return redirect()->route('items.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function release(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name_of_student' => 'required',
            'class' => 'required',
            'item' => 'required',
            'quantity' => 'required'
        ]);

        $AddItems   = new ReleaseItem;
        $AddItems->name_of_student  = $request->name_of_student;
        $AddItems->class            = $request->class;
        $AddItems->name_of_item     = $request->item;
        $AddItems->quantity         = $request->quantity;

        $AddItems->save();

        $Quantity   = ProspectusItem::where('name_of_item', $request->item)->first();
        $Item       = ProspectusItem::where('name_of_item', $request->item)->update([
            'items_in_store' => $Quantity->items_in_store - $request->quantity,
            'items_in_use' => $Quantity->items_in_use + $request->quantity
        ]);

        Alert::success('Congrats', 'Item Released Successfully');
        return redirect()->back();
    }
}
