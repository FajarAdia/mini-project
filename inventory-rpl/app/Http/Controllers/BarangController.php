<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function dashboard()
    {
        $totalBarang = Barang::count();
        $barangTersedia = Barang::where('status', 'Tersedia')->count();
        $barangDipinjam = Barang::where('status', 'Dipinjam')->count();
        $barangMaintenance = Barang::where('status', 'Maintenance')->count();

        return view('dashboard', compact('totalBarang', 'barangTersedia', 'barangDipinjam', 'barangMaintenance'));
    }

    public function index()
    {
        $barangs = Barang::with('kategori')->latest()->get();
        return view('barang.index', compact('barangs'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('barang.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_barang' => 'required|string|max:20|unique:barangs,kode_barang',
            'nama_barang' => 'required|string|min:3|max:150',
            'kategori_id' => 'required|exists:kategoris,id',
            'stok'        => 'required|integer|min:0',
            'kondisi'     => 'required|in:Baik,Rusak Ringan,Rusak Berat',
            'status'      => 'required|in:Tersedia,Dipinjam,Maintenance',
            'spesifikasi' => 'nullable|string',
        ]);

        Barang::create($validated);

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil disimpan!');
    }

    public function edit(Barang $barang)
    {
        $kategori = Kategori::all();
        return view('barang.edit', compact('barang', 'kategori'));
    }

    public function update(Request $request, Barang $barang)
    {
        $validated = $request->validate([
            'kode_barang' => 'required|string|max:20|unique:barangs,kode_barang,' . $barang->id,
            'nama_barang' => 'required|string|min:3|max:150',
            'kategori_id' => 'required|exists:kategoris,id',
            'stok'        => 'required|integer|min:0',
            'kondisi'     => 'required|in:Baik,Rusak Ringan,Rusak Berat',
            'status'      => 'required|in:Tersedia,Dipinjam,Maintenance',
            'spesifikasi' => 'nullable|string',
        ]);

        $barang->update($validated);

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil diperbarui!');
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil dihapus!');
    }
}