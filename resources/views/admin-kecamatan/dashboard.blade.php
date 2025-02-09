@extends('components.layout')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-semibold mb-4">Admin Dashboard</h1>
        <h1 class="mb-2">Selamat Datang, {{ Auth::user()->name }} Baraka</h1>


        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
            <div class="p-4 bg-white shadow-md rounded-lg flex items-center">
                <div class="p-3 bg-blue-500 text-white rounded-full">
                    📄
                </div>
                <div class="ml-4">
                    <h2 class="text-lg font-semibold text-gray-700">Total Surat</h2>
                    <p class="text-2xl font-bold text-blue-600">{{ $totalSurat }}</p>
                </div>
            </div>
            <div class="p-4 bg-white shadow-md rounded-lg flex items-center">
                <div class="p-3 bg-green-500 text-white rounded-full">
                    👥
                </div>
                <div class="ml-4">
                    <h2 class="text-lg font-semibold text-gray-700">Total Warga</h2>
                    <p class="text-2xl font-bold text-green-600">{{ $totalWarga }}</p>
                </div>
            </div>
            <div class="p-4 bg-white shadow-md rounded-lg flex items-center">
                <div class="p-3 bg-red-500 text-white rounded-full">
                    🏢
                </div>
                <div class="ml-4">
                    <h2 class="text-lg font-semibold text-gray-700">Total Kelurahan</h2>
                    <p class="text-2xl font-bold text-red-600">{{ $totalKelurahan }}</p>
                </div>
            </div>
        </div>


        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
            <div class="p-4 bg-yellow-100 shadow-md rounded-lg">
                <h2 class="text-lg font-semibold text-yellow-700">Surat Pending</h2>
                <p class="text-2xl font-bold text-yellow-600">{{ $pendingSurat }}</p>
            </div>
            <div class="p-4 bg-green-100 shadow-md rounded-lg">
                <h2 class="text-lg font-semibold text-green-700">Surat Disetujui</h2>
                <p class="text-2xl font-bold text-green-600">{{ $approvedSurat }}</p>
            </div>
            <div class="p-4 bg-red-100 shadow-md rounded-lg">
                <h2 class="text-lg font-semibold text-red-700">Surat Ditolak</h2>
                <p class="text-2xl font-bold text-red-600">{{ $rejectedSurat }}</p>
            </div>
        </div>


        @if ($pendingSurat > 0)
            <div class="mt-4 p-4 bg-orange-100 border-l-4 border-orange-500 text-orange-700">
                <p><strong>🔔 Pemberitahuan:</strong> Ada {{ $pendingSurat }} surat yang masih dalam status pending. Segera
                    lakukan verifikasi!</p>
            </div>
        @endif


        <div class="bg-white shadow-md rounded-lg p-6 mt-6">
            <h2 class="text-lg font-semibold text-gray-700 mb-4">Surat Permohonan Terbaru</h2>
            <table class="w-full border-collapse border border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="p-3 border border-gray-300">NIK</th>
                        <th class="p-3 border border-gray-300">Nama</th>
                        <th class="p-3 border border-gray-300">Jenis Surat</th>
                        <th class="p-3 border border-gray-300">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($recentSurats as $surat)
                        <tr class="border border-gray-200 hover:bg-gray-50">
                            <td class="p-3 border border-gray-300">{{ $surat->citizen->nik }}</td>
                            <td class="p-3 border border-gray-300">{{ $surat->citizen->name }}</td>
                            <td class="p-3 border border-gray-300 capitalize">
                                {{ str_replace('_', ' ', $surat->jenis_surat) }}</td>
                            <td class="p-3 border border-gray-300 capitalize">{{ $surat->status ?? '-' }}</td>
                        </tr>
                    @endforeach
                    @if ($recentSurats->isEmpty())
                        <tr>
                            <td colspan="5" class="p-3 text-center text-gray-500">Belum ada surat yang diajukan.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
