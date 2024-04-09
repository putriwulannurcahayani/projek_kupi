<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index()
    {
        // return view('beban.kategori');
        $produk = Produk::all();
        $sizes = Size::all();

        return view('produk.size', compact('produk', 'sizes'));
    }
    public function store(Request $request)
    {
        $validate = $request->validate([
            "nama" => "required"
        ]);

        $validate['id_usaha'] = auth()->user()->id_usaha;

        Size::create($validate);
        return redirect()->route('produks.create')
        ->with('tambah', 'Kategori berhasil ditambahkan');;
    
    }
}
