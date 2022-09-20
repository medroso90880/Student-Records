<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function signin() {
        return view('users.signinForm');
    }

    public function register() {
        return view('users.createUser');
    }

    //store user
    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'user_type' => 'required',
            'password' => 'required|confirmed|min:6'
        ]); 

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create User
        $user = User::create($formFields);

        // Login
        auth()->login($user);

        $user_type = $user->user_type;
        if($user_type == 'admin')
        {
            return redirect('/admin-home');
        }
        elseif($user_type == 'student')
        {
            return redirect('/student-home');
        }
        elseif($user_type == 'guidance')
        {
            return redirect('/guidance-home');
        }
        elseif($user_type == 'do')
        {
            return redirect('/decipline-officer-home');
        }
        else
        {
            return redirect('/registrar-home');
        }
    }   

    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('messagge','you have been logout');
    }

    public function logoutform(){
        return view('users.logout');
    }

    public function login() {
        return view('users.loginForm');
        return back();
    }

    public function authenticate(Request $request) { 
        $formFields = $request->validate([
            'email' => ['required','email'],
            'password' => 'required',
            'user_type' => 'required'
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            $user_type = Auth::user()->user_type;
            if($user_type == 'admin')
            {
                return redirect('/admin-home');
            }
            elseif($user_type == 'student')
            {
                return redirect('/student-home');
            }
            elseif($user_type == 'guidance')
            {
                return redirect('/guidace-home');
            }
            elseif($user_type == 'do')
            {
                return redirect('/decipline-officer-home');
            }
            else
            {
                return redirect('/registrar-home');
            }
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');

    }
    public function sample(){
        return view('sample');
    }
}
