<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuidanceController extends Controller
{
    public function dashboard(){
        return view ('guidance.home');
    }
}
