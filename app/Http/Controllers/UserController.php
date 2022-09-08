<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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

        return redirect('/admin')->with('message', 'User created and logged in');
    }

    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('messagge','you have been logout');
    }

    public function login() {
        return view('users.loginForm');
    }

    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'email' => ['required','email'],
            'password' => 'required',
            'user_type' => 'required'
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message','you are now log in');
        }

        return back()->withErrors(['email' => 'Invalid Credenrials'])->onlyInput('email');

    }
}
