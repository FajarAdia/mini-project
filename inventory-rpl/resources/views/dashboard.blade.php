@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">Dashboard SIMLAB-RPL</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-blue-500">
            <p class="text-sm text-gray-500 uppercase font-semibold">Total Barang</p>
            <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalBarang }}</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-green-500">
            <p class="text-sm text-gray-500 uppercase font-semibold">Tersedia</p>
            <p class="text-3xl font-bold text-green-600 mt-2">{{ $barangTersedia }}</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-red-500">
            <p class="text-sm text-gray-500 uppercase font-semibold">Dipinjam</p>
            <p class="text-3xl font-bold text-red-600 mt-2">{{ $barangDipinjam }}</p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-yellow-500">
            <p class="text-sm text-gray-500 uppercase font-semibold">Maintenance</p>
            <p class="text-3xl font-bold text-yellow-600 mt-2">{{ $barangMaintenance }}</p>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-md border border-gray-200">
        <h2 class="text-xl font-bold text-gray-800 mb-2">Selamat Datang di Sistem Informasi Laboratorium RPL</h2>
        <p class="text-gray-600">Gunakan menu navigasi untuk mengelola inventaris data barang laboratorium secara efisien.</p>
        <div class="mt-4">
            <a href="{{ route('barang.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-semibold shadow inline-block">
                Kelola Data Barang &rarr;
            </a>
        </div>
    </div>
</div>
@endsection