<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::all();
        return view('buku.lihat_buku', compact('buku'));
    }
    
    public function lihat_buku_anggota()
    {
        $buku = Buku::all();
        return view('anggota.lihat_buku_anggota', compact('buku'));
    }

    public function create()
    {
        return view('buku.tambah_buku');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'kode_buku' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'nama_penerbit' => 'required|string|max:255',
            'judul_buku' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer',
        ]);

        // Simpan data buku
        Buku::create($request->all());

        // Redirect ke halaman lihat_buku dengan pesan sukses
        return redirect()->route('lihat_buku')->with('success', 'Buku berhasil ditambahkan');
    }

    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        return view('buku.edit_buku', compact('buku'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_buku' => 'required|string|max:255|unique:bukus,kode_buku,' . $id,
            'kategori' => 'required|string|max:255',
            'nama_penerbit' => 'required|string|max:255',
            'judul_buku' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer',
        ]);

        $buku = Buku::findOrFail($id);
        $buku->update($request->all());

        Alert::success('Sukses', 'Buku berhasil diperbarui');
        return redirect()->route('lihat_buku');
    }

    public function destroy($id)
    {
        $buku = Buku::findOrFail($id);
        $buku->delete();

        Alert::success('Sukses', 'Buku berhasil dihapus');
        return redirect()->route('lihat_buku');
    }
}