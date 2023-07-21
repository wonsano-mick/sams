<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function UserView()
    {
        $allData['allData'] = User::all();
        return view('backend.user.view_user', $allData);
    }

    public function UserAdd()
    {

        return view('backend.user.add_user', [
            'title' => 'Add User'
        ]);
    }

    public function UserStore(Request $request)
    {

        $request->validate([
            'user_type' => 'required',
            'username' => 'bail|required|unique:users,username',
            'email' => 'bail|required|email|unique:users,email',
            'password' => 'bail|required|confirmed|min:8'

        ]);

        $InsertData     = new User;
        $InsertData->name       = ucwords($request->name);
        $InsertData->user_type  = $request->user_type;
        $InsertData->username   = ucwords($request->username);
        $InsertData->email      = ucwords($request->email);
        $InsertData->password   = Hash::make($request->password);

        $InsertData->save();

        Alert::success('Congrats', ucwords($request->username) . ' is Successfully Registered');
        return redirect()->route('users.view');
    }

    public function UserEdit($id)
    {

        $editData   = User::find($id);
        return view('backend.user.edit_user', compact('editData'));
    }

    public function UserUpdate(Request $request, $id)
    {

        $User   = User::find($id);
        if ($User->email != $request->email) {
            $request->validate([
                'email' => 'bail|required|email|unique:users,email'
            ]);
        }
        if ($User->username != $request->username) {
            $request->validate([
                'username' => 'bail|required|unique:users,username'
            ]);
        }
        $User               = User::find($id);
        $User->name         = ucwords($request->name);
        $User->email        = ucwords($request->email);
        $User->username     = ucwords($request->username);
        $User->user_type    = $request->user_type;
        if (empty($request->password)) {
            $User->password  = $User->password;
        } else {
            $User->password = Hash::make($request->password);
        }
        $Result         = $User->save();

        if ($Result) {

            Alert::Info('Congrats', 'User Details Successfully Updated');
            return redirect()->route('users.view');
        } else {

            Alert::error('Error', 'Oops... User Details Update Failed. Try again!!!');
            return redirect()->route('users.view');
        }
    }

    public function UserDelete($id)
    {

        $User   = User::find($id);
        if ($User->user_img != 'avatar.png') {
            $OldImage       = public_path('images/userImages/' . $User->user_img);
            unlink($OldImage);
        }

        $User->delete();

        Alert::Info('Congrats', 'User Account Successfully Deleted');
        return redirect()->route('users.view');
    }
}
