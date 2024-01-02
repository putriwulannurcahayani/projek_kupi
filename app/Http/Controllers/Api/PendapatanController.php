<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pendapatan;
use App\Models\Produk;
use Illuminate\Http\Request;

class PendapatanController extends Controller
{
    public function index() 
    {
        $products = Produk::all(); // Assuming you want to retrieve all products

        return response()->json($products); 
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'tanggal' => 'required',
            'id_produk' => 'required|exists:produks,id', // Make sure the product exists
            'jumlah_produk' => [
                'required',
                'numeric',
                'min:1',
                function ($attribute, $value, $fail) use ($request) {
                    // Custom validation rule to check if the quantity is greater than the available stock
                    $product = Produk::find($request->id_produk);
                    if ($product && $value > $product->stok) {
                        $fail('Jumlah Produk Melebihi Stok Yang Tersedia');
                    }
                },
            ],
            // Sesuaikan validasi dengan kebutuhan Anda
        ]);
    
        $product = Produk::find($validatedData['id_produk']);
    
        $validatedData['total'] = $product->harga * $validatedData['jumlah_produk'];
    
        $stok = $product->stok - $validatedData['jumlah_produk'];
    
        $product->update([
            'stok' => $stok
        ]);
    
        // Simpan data pendapatan baru ke dalam database
        Pendapatan::create($validatedData);
    
        // event(new KurangiStokProduk($produk, $jumlah_produk));
    
        return response()->json(['message'=>'Pendapatan Berhasil Ditambah']); // Redirect ke halaman detail pendapatan dengan pesan sukses
    }
}
