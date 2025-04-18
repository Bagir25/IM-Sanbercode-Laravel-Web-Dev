<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showregister(){
        return view("auth.register");
    }

    public function register(Request $request){
        $request->validate([
            'nama' => 'required|min:5',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $roleData = user::count();

        $User = new user;
        $User->nama = $request -> input("nama");
        $User->email = $request -> input("email");
        $User->password = Hash::make($request->input("password"));
        $User->role = $roleData === 0 ? "admin" : "user";

        $User->save();
        return redirect("/")->with("success","Berhasil Register");
    }

    public function showlogin(){
        return view("auth.login");
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/')->with("success","Berhasil Login");
        }
 
        return back()->withErrors([
            'email' => 'Invalid User',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/')->with("error","Berhasil Logout");
    }

    public function getprofile(){
        $userAuth = Auth::User()->profile;
        $userId = Auth::id();
        $profileData = Profile::where('user_id', $userId)->first();

        if($userAuth){
            return view("profile.edit",["profile"=> $profileData]);
        }else{
            return view("profile.create");
        }
    }

    public function createprofile(Request $request){

            $request->validate([
                'age' => 'required|numeric',
                'address' => 'required|min:5',
            ]);
            $userId = Auth::id();
    
            $profile = new Profile;
            $profile->age = $request -> input("age");
            $profile->address = $request -> input("address");
            $profile->user_id = $userId;

            $profile->save();

            return redirect("/profile");
    }

    public function updateprofile(Request $request,$id){

        $request->validate([
            'age' => 'required|numeric',
            'address' => 'required|min:5',
        ]);
        $profile = Profile::find($id);
        $profile->age = $request -> input("age");
        $profile->address = $request -> input("address");

        $profile->save();

        return redirect("/profile")->with("success","Berhasil Update Profile");
}
}
