<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
        $studentData    = Student::all();
        $Males          = Student::where('gender', 'Male')->count();
        $Females        = Student::where('gender', 'Female')->count();
        $Total          = Student::count();
        $UserId   = Auth::user()->id;
        $UserData = User::find($UserId);
        return view('home', compact('UserData', 'studentData', 'Males', 'Females', 'Total'));
    }
}
