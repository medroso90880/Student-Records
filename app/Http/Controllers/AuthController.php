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
    public function googleredirect(Request $request)
    {
        return Socialite::driver('google')->redirect();
    }

    public function googlecallback(Request $request)
    {
        $userdata = Socialite::driver('google')->user();

        $user = User::where('emial', $userdata->email)->where('auth_type', 'google')->first();
        if($user)
        {
            Auth::login($user);
            return redirect('/sample');
        }
        else{
            $uuid =Str::uuid()->toString();

            $user = new User();
            $user->name =$userdata->name;
            $user->email =$userdata->email;
            $user->password = Hash::make($uuid.now());
            $user->auth_type = 'google';
            $user->save();
            Auth::login($user);
            return redirect('/sample');
        }
    }
}
