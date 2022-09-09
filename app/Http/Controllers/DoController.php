<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoController extends Controller
{
    public function dashboard(){
        return view ('do.home');
    }    
}
