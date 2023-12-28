<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function profile()
    {
        $nama = auth()->user()->nama;
        $email = auth()->user()->email;
        $namaUsaha = auth()->user()->nama_usaha;
        $alamat = auth()->user()->alamat;
        $noTelepon = auth()->user()->no_telepon;
        $role = auth()->user()->role->nama_role;

        return view('user.edit', compact('nama', 'email', 'namaUsaha', 'alamat', 'noTelepon', 'role'));
    }

    public function index()
    {

        $nama = auth()->user()->nama;
        $email = auth()->user()->email;
        $namaUsaha = auth()->user()->nama_usaha;
        $alamat = auth()->user()->alamat;
        $noTelepon = auth()->user()->no_telepon;
        $role = auth()->user()->role->nama_role;

        return view('user.index', compact('nama', 'email', 'namaUsaha', 'alamat', 'noTelepon', 'role'));
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
            'img_profile' => 'image|mimes:jpg,jpeg,png',
        ];

        $request->validate($rules);
       
        if ($request->file('img_profile')) {
            // Proceed with storing the image if format is valid
            $profile = $request->file('img_profile')->store('images');
            $user->update(["img_profile" => $profile]);
        }

        // Update user information
        $user->update($request->except(['img_profile']));
        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }

    public function password()
    {
        return view('user.password');
    }

    public function gantiPassword(Request $request) {
        // Validasi input
        $validate = $request->validate([
            "old_password" => "required",
            "new_password" => "required|min:8", // Minimal 8 karakter
            "confirm_password" => "required" // Sama dengan password baru
        ]);
    
        // Mendapatkan pengguna yang saat ini login
        $user = User::where('id', Auth::user()->id)->first();
    
        // Memeriksa kecocokan password lama
        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->with('error', 'Password lama tidak sesuai');
        }
        
        if($request->new_password != $request->confirm_password){
            return redirect()->back()->with('error', 'Konfirmasi password salah');
        }
    
        // Mengganti password
        $user->update([
            'password' => Hash::make($request->new_password)
        ]);
    
        return redirect()->route('profile')->with('success', 'Password berhasil diubah');
    }
}
