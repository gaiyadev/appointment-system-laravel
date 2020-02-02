<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // public function showChangePasswordForm(){
    //     return view('auth.changePassword');
    // }

    public function changePassword(Request $request){
        $this->validate($request, [
            'oldPassword' => ['required'],
            'newPassword' => ['required', 'min:8', 'confirmed'],
        ]);
        $hashPassword = Auth::user()->password;        
        //return $hashPassword;
        if (Hash::check($request->oldPassword, $hashPassword)) {
            if(strcmp($request->get('oldPassword'), $request->get('newPassword')) == 0){
                //Current password and new password are same
                return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
            } else {
                $user = User::find(Auth::id());
                $user->password = ($request->newPassword);
                $user->save();
                Auth::logout();
                return redirect()->route('login')->with('success', 'Password changed sucessfully');
            }
        }else {
            return redirect()->back()->with('error', 'Current Password is not correct. Please try again');


        }
}
}


