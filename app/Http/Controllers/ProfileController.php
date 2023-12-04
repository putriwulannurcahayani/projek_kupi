<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
 public function index(){

    $nama = auth()->user()->nama;
    $email = auth()->user()->email;
    $namaUsaha = auth()->user()->nama_usaha;

    return view('user.index',compact('nama','email','namaUsaha'));
 }   

 public function update(Request $request){
    $user = User::where('id',Auth::user()->id)->first();
    $user->update($request->all());
    return redirect()->back();
 }
}
