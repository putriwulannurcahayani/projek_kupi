<?php

namespace App\Http\Controllers;

use App\Models\jenisBarang;
use App\Models\Produk;
use Illuminate\Http\Request;

class jenisBarangController extends Controller
{
    public function index()
    {
        // return view('beban.kategori');
        $produk = Produk::all();
        $jenis_barangs = jenisBarang::all();

        return view('produk.jenisBarang', compact('produk', 'jenis_barangs'));
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            "nama" => "required"
        ]);

        $validate['id_usaha'] = auth()->user()->id_usaha;

        jenisBarang::create($validate);
        return redirect()->route('produks.create')
        ->with('tambah', 'Kategori berhasil ditambahkan');;
    
    }

}
