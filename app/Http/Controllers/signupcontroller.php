<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class signupController extends Controller
{
    public function index() : View
{
    return view('pegawai');
}

public function register(Request $request)
{
    $validate = $request->validate([
        "nama" => "required",
        "email" => "required|email|unique:users",
        "password" => "required",
    ]);

    $validate["id_role"] = 2;   
    $validate["nama_usaha"] = auth()->user()->nama_usaha;

    // dd($validate["id_role"]);    

    User::create($validate);
    return redirect()->route("tambah-pegawai")->with('successAddSekolah', "Sekolah Berhasil Register");
}

public function logout(Request $request)
{
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect('/login');
}
}
    