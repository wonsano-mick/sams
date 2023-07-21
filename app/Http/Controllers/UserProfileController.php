<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserProfileController extends Controller
{
    public function ProfileView()
    {

        $UserId     = Auth::user()->id;
        $UserData   = User::find($UserId);
        return view('profiles.profile_view', compact('UserData'));
    }

    public function PersonalInfomationUpdate(Request $request)
    {
        $UserId     = Auth::user()->id;
        $userImage = User::where('id', '=', $UserId)->first();

        if ($request->hasFile('user_img')) {
            $image          = $request->file('user_img');
            $newImageName   = uniqid() . '-' . Str::slug($request->name) . '.' . $image->getClientOriginalExtension();
            $location       = public_path('/images/userImages');
            $image->move($location, $newImageName);
            if ($userImage->user_img != 'avatar.PNG') {
                $OldImage       = public_path('images/userImages/' . $userImage->user_img);
                unlink($OldImage);
            }
        } else {
            $newImageName   = $request->user_img1;
        }

        $UserData   = User::find($UserId);
        $UserData->name     = ucwords($request->name);
        $UserData->username = ucwords($request->username);
        $UserData->email    = ucwords($request->email);
        $UserData->user_img = $newImageName;

        $UserData->save();

        Alert::success('Congrats', ucwords($request->name) . '\'s Profile Information Updated Successfully');
        return back();
    }

    public function PasswordView()
    {
        $UserId     = Auth::user()->id;
        $UserData   = User::find($UserId);
        return view('profiles.profile_password', compact(
            'UserData',
            'UserId'
        ));
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);

        Alert::success('Congrats', 'User Password Changed Successfully');
        return redirect()->route('profiles.view');
    }
}
