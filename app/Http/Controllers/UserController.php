<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view ('users.signinForm');
    }
    public function sample()
    {
        return view ('sample');
    }

}
