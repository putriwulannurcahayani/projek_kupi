<?php

namespace App\Http\Controllers;

use App\Models\Pendapatan;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PendapatanController extends Controller
{
    public function index():View
    {
        $pendapatans = Pendapatan::all(); // Mengambil semua pendapatan dari database
        return view('pendapatan', compact('pendapatans')); // Mengirimkan pendapatan ke dalam view
    }
    public function pendapatan()
    {
        // Logika untuk menampilkan formulir pembuatan pendapatan
        return view('pendapatan'); // Gantilah 'pendapatan.create' dengan nama view yang sesuai
    }

    public function store(Request $request): RedirectResponse
    {
        // Validasi data yang diterima dari formulir
        $validatedData = $request->validate([
            'tanggal' => 'required',
            'produk' => 'required',
            'jumlah_produk' => 'required|numeric|min:1',
            'total' => 'required|numeric|min:1'
            // Sesuaikan validasi dengan kebutuhan Anda
        ]);

        // Simpan data pendapatan baru ke dalam database
        pendapatan::create($validatedData);

        return redirect()->route('pendapatans')
            ->with('success', 'Transaksi baru berhasil ditambahkan'); // Redirect ke halaman detail pendapatan dengan pesan sukses
    }

    // public function edit($id):View
    // {
    //     $pendapatan = Pendapatan::findOrFail($id); // Mengambil pendapatan berdasarkan ID
    //     return view('pendapatan.edit', compact ('pendapatan')); // Menampilkan formulir untuk mengedit pendapatan
    // }

    // public function update(Request $request, $id): RedirectResponse
    // {
    //     // Validasi data yang diterima dari formulir
    //     $validatedData = $request->validate([
    //         'nama_pendapatan' => 'required',
    //         'harga' => 'required|numeric',
    //         'stok' => 'required|numeric|min:0'
    //         // Sesuaikan validasi dengan kebutuhan Anda
    //     ]);

    //     // Perbarui data pendapatan yang ada di dalam database
    //     $pendapatan = Pendapatan::findOrFail($id);
    //     $pendapatan->update($request->all());

    //     return redirect()->route('pendapatans.index')
    //         ->with('success', 'Produk berhasil diperbarui'); // Redirect ke halaman detail pendapatan dengan pesan sukses
    // }

    // public function destroy($id): RedirectResponse
    // {
    //     // Hapus data pendapatan dari database
    //     $pendapatan = Pendapatan::findOrFail($id);
    //     $pendapatan->delete();

    //     return redirect()->route('pendapatans.index')
    //         ->with('success', 'Produk berhasil dihapus'); // Redirect ke halaman daftar pendapatan dengan pesan sukses
    // }
}
