<?php

namespace App\Http\Controllers\backend\setup\Program;

use App\Models\Program;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class ProgramController extends Controller
{
    public function index()
    {

        $allData['allData'] = Program::all();
        return view('backend.setup.program.index', $allData);
    }

    public function add()
    {
        return view('backend.setup.program.create', [
            'title' => 'Add Program'
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'program' => 'required'
        ]);

        $InsertData     = new Program;
        $InsertData->program      = ucwords($request->program);

        $InsertData->save();

        Alert::success('Congrats', ucwords($request->program) . ' is Successfully Created');
        return redirect()->route('programs.list');
    }

    public function edit($id)
    {

        $editData   = Program::find($id);
        return view('backend.setup.program.update', compact('editData'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'program' => 'required'
        ]);

        $Program      = Program::find($id);
        $Program->program   = ucwords($request->program);

        $Program->save();

        Alert::info('Congrats', ucwords($request->program) . ' is Successfully Updated');
        return redirect()->route('programs.list');
    }

    public function delete($id)
    {

        $Program       = Program::find($id);
        $Program->delete();

        Alert::warning('Done', $Program->program . '\'s Details Successfully Deleted');
        return redirect()->route('programs.list');
    }
}
