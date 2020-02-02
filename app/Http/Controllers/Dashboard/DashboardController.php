<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class DashboardController extends Controller
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
    
    // public function bookAppointment() {
    //     return view('dashboard.bookAppointment');
    // }

    public function profile() {
        return view('dashboard.profile');
    }

    public function showProfile() {
        $user = User::all();
        return view('dashboard.profile')->with('users', $user);
    }
}
