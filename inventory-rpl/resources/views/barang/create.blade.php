@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Tambah Barang Inventaris Baru</h2>

    <form action="{{ route('barang.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Kode Barang</label>
            <input type="text" name="kode_barang" value="{{ old('kode_barang') }}" class="w-full px-3 py-2 border rounded-lg @error('kode_barang') border-red-500 @enderror" placeholder="LAB-RPL-001">
            @error('kode_barang')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Nama Barang</label>
            <input type="text" name="nama_barang" value="{{ old('nama_barang') }}" class="w-full px-3 py-2 border rounded-lg @error('nama_barang') border-red-500 @enderror">
            @error('nama_barang')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Kategori Aset</label>
            <select name="kategori_id" class="w-full px-3 py-2 border rounded-lg @error('kategori_id') border-red-500 @enderror">
                <option value="">-- Pilih Kategori --</option>
                @foreach($kategori as $kat)
                    <option value="{{ $kat->id }}" {{ old('kategori_id') == $kat->id ? 'selected' : '' }}>{{ $kat->nama_kategori }}</option>
                @endforeach
            </select>
            @error('kategori_id')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Jumlah Stok</label>
            <input type="number" name="stok" value="{{ old('stok', 0) }}" class="w-full px-3 py-2 border rounded-lg @error('stok') border-red-500 @enderror">
            @error('stok')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <div>
                <label class="block text-gray-700 font-bold mb-2">Kondisi</label>
                <select name="kondisi" class="w-full px-3 py-2 border rounded-lg">
                    <option value="Baik" {{ old('kondisi') == 'Baik' ? 'selected' : '' }}>Baik</option>
                    <option value="Rusak Ringan" {{ old('kondisi') == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                    <option value="Rusak Berat" {{ old('kondisi') == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat</option>
                </select>
            </div>
            <div>
                <label class="block text-gray-700 font-bold mb-2">Status</label>
                <select name="status" class="w-full px-3 py-2 border rounded-lg">
                    <option value="Tersedia" {{ old('status') == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                    <option value="Dipinjam" {{ old('status') == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                    <option value="Maintenance" {{ old('status') == 'Maintenance' ? 'selected' : '' }}>Maintenance</option>
                </select>
            </div>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2">Spesifikasi (Opsional)</label>
            <textarea name="spesifikasi" rows="3" class="w-full px-3 py-2 border rounded-lg">{{ old('spesifikasi') }}</textarea>
        </div>

        <div class="flex justify-end space-x-2">
            <a href="{{ route('barang.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">Batal</a>
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">Simpan Barang</button>
        </div>
    </form>
</div>
@endsection