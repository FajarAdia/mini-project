@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Daftar Barang</h1>
        <a href="{{ route('barang.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-semibold shadow">
            + Tambah Barang
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-md rounded-lg overflow-hidden border border-gray-200">
        <table class="min-w-full leading-normal">
            <thead>
                <tr class="bg-gray-100 text-gray-600 uppercase text-xs font-semibold tracking-wider">
                    <th class="px-5 py-3 text-left">No</th>
                    <th class="px-5 py-3 text-left">Kode Barang</th>
                    <th class="px-5 py-3 text-left">Nama Barang</th>
                    <th class="px-5 py-3 text-left">Kategori</th>
                    <th class="px-5 py-3 text-left">Stok</th>
                    <th class="px-5 py-3 text-left">Kondisi</th>
                    <th class="px-5 py-3 text-left">Status</th>
                    <th class="px-5 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 text-sm">
                @forelse($barangs as $index => $item)
                    <tr class="border-b border-gray-200 hover:bg-gray-50">
                        <td class="px-5 py-4">{{ $index + 1 }}</td>
                        <td class="px-5 py-4 font-semibold text-gray-800">{{ $item->kode_barang }}</td>
                        <td class="px-5 py-4 font-medium text-gray-900">{{ $item->nama_barang }}</td>
                        <td class="px-5 py-4">{{ $item->kategori->nama_kategori ?? '-' }}</td>
                        <td class="px-5 py-4">{{ $item->stok }}</td>
                        <td class="px-5 py-4">
                            <span class="px-2 py-1 text-xs font-semibold rounded-full 
                                {{ $item->kondisi == 'Baik' ? 'bg-green-100 text-green-800' : '' }}
                                {{ $item->kondisi == 'Rusak Ringan' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                {{ $item->kondisi == 'Rusak Berat' ? 'bg-red-100 text-red-800' : '' }}">
                                {{ $item->kondisi }}
                            </span>
                        </td>
                        <td class="px-5 py-4">
                            <span class="px-2 py-1 text-xs font-semibold rounded-full 
                                {{ $item->status == 'Tersedia' ? 'bg-green-100 text-green-800' : '' }}
                                {{ $item->status == 'Dipinjam' ? 'bg-red-100 text-red-800' : '' }}
                                {{ $item->status == 'Maintenance' ? 'bg-yellow-100 text-yellow-800' : '' }}">
                                {{ $item->status }}
                            </span>
                        </td>
                        <td class="px-5 py-4 text-center">
                            <a href="{{ route('barang.edit', $item->id) }}" class="text-blue-600 hover:text-blue-900 font-semibold mr-3">
                                Edit
                            </a>
                            <form action="{{ route('barang.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus barang ini?');" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 font-semibold">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="px-5 py-8 text-center text-gray-500">
                            Belum ada data barang. Silakan tambah data baru.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection