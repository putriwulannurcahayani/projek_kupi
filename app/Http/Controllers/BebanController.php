<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Beban;
use App\Models\Kategori;

class BebanController extends Controller
{
    public function index():View
    { 
       
        // Get all categories and beban data
        $kategoris = Kategori::all();
        $bebans = Beban::orderBy('tanggal', 'desc')->get();

        // Render the view
        return view('beban.index', compact('kategoris', 'bebans'));

    }

    public function show($id): View
    
    {
        $beban = Beban::findOrFail($id); // Mengambil beban berdasarkan ID
        return view('beban.show', compact('beban')); // Menampilkan detail beban ke dalam view
        // return view('beban.tampilan', compact('beban'));
    }

    public function tampilan(){
        // dd("tes");
         $beban = Beban::all(); 
        return view('beban.tampilan',compact('beban'));
    }

    public function createbeban()
    {
        // Logika untuk menampilkan formulir pembuatan beban
        return view('beban.create'); // Gantilah 'beban.create' dengan nama view yang sesuai
    }

    public function store(Request $request): RedirectResponse
    {
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'tanggal' => 'required',
            'nama' => 'required',
            'id_kategori' => 'required',
            'jumlah' => 'required|numeric|min:1',
            'harga' => 'required|numeric'
            // Sesuaikan validasi dengan kebutuhan Anda
        ]);

        // Simpan data beban baru ke dalam database
        beban::create($validatedData);

        return redirect()->route('beban.index')
            ->with('success', 'pengeluaran berhasil ditambahkan'); // Redirect ke halaman detail beban dengan pesan sukses
    }
}
