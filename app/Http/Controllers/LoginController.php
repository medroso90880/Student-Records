<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function dashboard(){
        $user_type = Auth::user()->user_type;
        if($user_type == 'admin')
        {
            return view('admin.home');
        }
        elseif($user_type == 'student')
        {
            return view('student.home');
        }
        elseif($user_type == 'guidance');
        {
            return view('guidance.home');
        }
    }
}
