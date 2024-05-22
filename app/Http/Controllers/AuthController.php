<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show login page
    public function showLogin(){
        return view('pages.components.home.login');
    }

    // Show register page

    public function showRegister(){
        return view('pages.components.home.register');
    }

    //Register User

    
    public function postRegister(Request $request) {

        $request->validate([ // Validation
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8|confirmed'
        ]);

        $user = User::create([ // Registration
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password), //Hash::make() --Returns an encrypted password
        ]);

        //Login 

        Auth::login($user);

        return back()->with('success', "Successfully Logged In!");
        //return redirect()->route('home');


    
    }

    //Login User
    public function postLogin(Request $request) {
        
        //Validate

        $details = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //Login

            if(Auth::attempt($details)){ //If we are able to authenticate the user, then the user (once logged in), is able to access the page that they were trying to use with a logged account. 
                return redirect() -> intended('/'); //intended('/') will take user to the last route that they were on before logging in. 
            }

            return back()->withErrors([
                'email' => 'Invalid Login Details'
            ]);

        //Return
    }

    //Reset Password

    // Logout
    public function logout() {
        
        Auth::logout();
        return back(); 
    }
}

