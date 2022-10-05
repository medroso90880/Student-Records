<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function logout(){
        Auth::logout();
        return redirect('/');    
    }

    public function redirect(){
        return Socialite::driver('google')->redirect();
    }

    public function callback(){
        $user= Socialite::driver('google')->user();
        $user = User::firstOrCreate([
            'email' => $user->email
        ], [
            'name'=>$user->name,
            'password' =>Hash::make(Str::random(24))
        ]);

        Auth::login($user, true);

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
        elseif($user_type == 'registrar')
        {
            return redirect('/registrar-home');
        }
        elseif($user_type==null)
        {
            return redirect('/sample');
        }
        
    }
}

