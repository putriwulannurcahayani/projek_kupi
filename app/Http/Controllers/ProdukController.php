<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index():View
    {
        $produks = Produk::all(); // Mengambil semua produk dari database
        return view('produk/index', compact('produks')); // Mengirimkan produk ke dalam view
    }

    public function show($id): View
    {
        $produk = Produk::findOrFail($id); // Mengambil produk berdasarkan ID
        return view('produks.show', compact('produk')); // Menampilkan detail produk ke dalam view
        // return view('produk.tampilan', compact('produk'));
    }

    public function laporan(){
        // dd("tes");
         $produks = Produk::all(); 
        return view('produk.tampilan',compact('produks'));
    }

    public function cetak(){
        // dd("tes");
         $produks = Produk::all(); 
        return view('produk.cetak',compact('produks'));
    }

    public function createproduk()
    {
        // Logika untuk menampilkan formulir pembuatan produk
        return view('produk.create'); // Gantilah 'produk.create' dengan nama view yang sesuai
    }

    public function store(Request $request): RedirectResponse
    {
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'kode_produk' => 'required',
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric|min:1'
            // Sesuaikan validasi dengan kebutuhan Anda
        ]);
        
        $existingProduk = Produk::where('nama_produk', $request->input('nama_produk'))->first();

        if ($existingProduk) {
            // Update the existing product's information if needed
            $existingProduk->update([
                // 'harga' => $existingProduk->harga + $request->input('harga'), // Add prices if needed
                'stok' => $existingProduk->stok + $request->input('stok'),    // Add stock if needed
            ]);
    
            return redirect()->route('produks.index')
                ->with('success', 'Produk berhasil diperbarui'); // Redirect ke halaman detail produk dengan pesan sukses
        } else {
            // Create a new product if no existing product is found
            Produk::create($validatedData);
    
            return redirect()->route('produks.index')
                ->with('success', 'Produk berhasil ditambahkan'); // Redirect ke halaman detail produk dengan pesan sukses
        }

    }

    public function edit($id):View
    {
        $produk = Produk::findOrFail($id); // Mengambil produk berdasarkan ID
        return view('produk.edit', compact ('produk')); // Menampilkan formulir untuk mengedit produk
    }

    public function update(Request $request, $id): RedirectResponse
    {
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'nama_produk' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric|min:0'
            // Sesuaikan validasi dengan kebutuhan Anda
        ]);

        // Perbarui data produk yang ada di dalam database
        $produk = Produk::findOrFail($id);
        $produk->update($request->all());

        return redirect()->route('produks.index')
            ->with('success', 'Produk berhasil diperbarui'); // Redirect ke halaman detail produk dengan pesan sukses
    }

    public function destroy($id): RedirectResponse
    {
        // Hapus data produk dari database
        $produk = Produk::findOrFail($id);
        $produk->delete();

        return redirect()->route('produks.index')
            ->with('success', 'Produk berhasil dihapus'); // Redirect ke halaman daftar produk dengan pesan sukses
    }
}