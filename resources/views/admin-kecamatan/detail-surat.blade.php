@extends('components.layout')

@section('title', 'Detail Surat')

@section('content')
    <div class="mt-4">
        <div class="caption mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Detail Surat</h1>
            @if ($errors->any())
                <div class="mb-4 p-3 bg-red-100 border-l-4 border-red-500 text-red-700">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <p class="text-lg text-gray-500">Informasi lengkap mengenai surat permohonan</p>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <p class="text-sm text-gray-600"><strong>NIK Pemohon:</strong> {{ $surat->citizen->nik }}</p>
                    <p class="text-sm text-gray-600"><strong>Nama Pemohon:</strong> {{ $surat->citizen->name }}</p>
                    <p class="text-sm text-gray-600"><strong>Nomor Surat:</strong> {{ $surat->no_surat ?? '-' }}</p>
                    <p class="text-sm text-gray-600 capitalize"><strong>Jenis Surat:</strong>
                        {{ str_replace('_', ' ', $surat->jenis_surat) }}</p>
                    <p class="text-sm text-gray-600"><strong>Asal Kelurahan:</strong> {{ $surat->kelurahan->nama }}</p>
                    <p class="text-sm text-gray-600"><strong>No HP Pemohon:</strong> {{ $surat->no_hp ?? '-' }}</p>
                    <p class="text-sm text-gray-600"><strong>Alamat Pemohon:</strong> {{ $surat->citizen->alamat ?? '-' }}
                    </p>
                </div>
            </div>

            <div class="text-sm mt-2">
                @if ($surat->surat_selesai)
                    <div class="text-sm mt-2">
                        <a href="{{ route('admin.download.surat', $surat->id) }}" class="text-blue-500 hover:underline">
                            Download Surat
                        </a>
                    </div>
                @else
                    <p class="text-sm text-gray-500">Surat belum tersedia.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
