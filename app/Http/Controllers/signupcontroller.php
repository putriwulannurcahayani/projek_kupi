<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\pegawai;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class signupController extends Controller
{

    public function daftarPegawai() {
        $daftarPegawai = User::where('id_role', 2)->get();
        // dd($daftarPegawai);
        return view('pegawai.tampilan',compact('daftarPegawai'));
    }

    public function print() {
        $daftarPegawai = User::where('id_role', 2)->get();
        // dd($daftarPegawai);
        return view('pegawai.laporan',compact('daftarPegawai'));
    }
    
    public function index() : View  
{
    return view('pegawai');
}
public function laporan(){
    // dd("tes");
    return view('tampilanpegawai',compact('pegawais'));
}

public function register(Request $request)
{
    $validate = $request->validate([
        "nama" => "required",
        "alamat" => "required",
        "no_telepon" => "required",
        "email" => "required|email|unique:users",
        "password" => "required",
    ]);

    $validate["id_role"] = 2;   
    $validate["nama_usaha"] = auth()->user()->nama_usaha;

    // dd($validate["id_role"]);    

    User::create($validate);
    return redirect()->route("daftarPegawai")->with('successAddSekolah', "Sekolah Berhasil Register");
}

public function logout(Request $request)
{
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect('/login');
}
public function destroy($id)
    {
        // Hapus data produk dari database
        $produk = User::findOrFail($id);
        $produk->delete();

        return redirect()->route('daftarPegawai')
            ->with('success', 'Data Pegawai berhasil dihapus'); // Redirect ke halaman daftar produk dengan pesan sukses
    }
}
    