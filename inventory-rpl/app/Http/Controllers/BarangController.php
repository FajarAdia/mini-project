<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function index()
    {
        return view('barang.index');
    }

    public function create()
    {
        return view('barang.create');
    }

    public function store(Request $request)
    {
    }

    public function edit(Barang $barang)
    {
        return view('barang.edit');
    }

    public function update(Request $request, Barang $barang)
    {
    }

    public function destroy(Barang $barang)
    {
    }
}