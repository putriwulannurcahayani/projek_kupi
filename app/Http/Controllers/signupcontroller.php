<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class signupcontroller extends Controller
{
    public function index() : View
{
    return view('auth.signup');
}
}
