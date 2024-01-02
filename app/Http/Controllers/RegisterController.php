<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.signup');
    }

    public function register(Request $request)
    {
        $validate = $request->validate([
            "nama" => "required",
            "alamat" => "required",
            "nama_usaha" => "required",
            "no_telepon" => "required|min:12|max:13",
            "email" => "required|email|unique:users",
            "password" => "required",
        ]);
    
        $validate["id_role"] = 1;       
        // dd($validate["id_role"]);    
    
        User::create($validate);
        
        return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }
}
