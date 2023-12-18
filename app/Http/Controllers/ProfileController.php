<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

 public function profile(){
     $nama = auth()->user()->nama;
     $email = auth()->user()->email;
     $namaUsaha = auth()->user()->nama_usaha;
     $alamat = auth()->user()->alamat;
     $noTelepon = auth()->user()->no_telepon;
     $role = auth()->user()->role->nama_role;
    
     return view('user.edit',compact('nama','email','namaUsaha','alamat','noTelepon','role'));   
 }

 public function index(){

    $nama = auth()->user()->nama;
    $email = auth()->user()->email;
    $namaUsaha = auth()->user()->nama_usaha;
    $alamat = auth()->user()->alamat;
    $noTelepon = auth()->user()->no_telepon;
    $role = auth()->user()->role->nama_role;

    return view('user.index',compact('nama','email','namaUsaha','alamat','noTelepon','role'));
 }   

 public function update(Request $request)
 {
     $user = User::where('id', Auth::user()->id)->first();
 
   //   Validation Rules
     $rules = [
         'nama' => 'required|string',
         'nama_usaha' => 'required|string',
         'email' => 'required|email',
         'alamat' => 'required|string',
         'no_telepon' => 'required|string',
     ];
 
     // If new password is provided, add validation rules for password fields
     if ($request->filled('new_password')) {
         $rules['old_password'] = 'required|string';
         $rules['new_password'] = 'required|string|min:6';
     }
 
     $request->validate($rules);
 
     // Check if the old password matches the current password
     if ($request->filled('old_password') && !Hash::check($request->input('old_password'), $user->password)) {
         dd("password lama salah");
     }
     

    if ($request->filled('new_password')) {
       $user->update(['password' => Hash::make($request->input('new_password'))]);
       dd('passworn sudah diganti');
   }

     // Update user information
     $user->update($request->except(['old_password', 'new_password']));
 
     // If new password is provided, update the password
    
 
     return redirect()->route('profile')->with('success', 'Profile updated successfully.');
 }
}
