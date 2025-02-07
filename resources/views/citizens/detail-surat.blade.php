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
                    <p class="text-sm text-gray-600"><strong>NIK:</strong> {{ $surat->citizen->nik }}</p>
                    <p class="text-sm text-gray-600"><strong>Nama:</strong> {{ $surat->citizen->name }}</p>
                    <p class="text-sm text-gray-600 capitalize"><strong>Jenis Surat:</strong>
                        {{ str_replace('_', ' ', $surat->jenis_surat) }}</p>
                    <p class="text-sm text-gray-600 capitalize"><strong>Status Surat:</strong> {{ $surat->status ?? '-' }}
                    </p>
                </div>

                <div>
                    <p class="text-sm text-gray-600"><strong>Dokumen:</strong></p>
                    @if ($surat->file_persyaratan)
                        <div class="space-y-2">
                            @foreach (json_decode($surat->file_persyaratan) as $file)
                                <div class="text-sm">
                                    <a href="{{ $file }}" target="_blank" class="text-blue-500 hover:underline">
                                        Lihat Dokumen
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <span class="text-sm text-gray-500">-</span>
                    @endif
                </div>
                @if (!empty($surat->alasan_reject))
                    <div class="mt-4 p-4 bg-red-100 border-l-4 border-red-500 text-red-700">
                        <p><strong>Alasan Penolakan:</strong> {{ $surat->alasan_reject }}</p>
                    </div>
                @endif
            </div>
            <div class="text-sm mt-2">
                @if ($surat->surat_selesai)
                    <div class="text-sm mt-2">
                        <a href="{{ route('citizen.download.surat', $surat->id) }}" class="text-blue-500 hover:underline">
                            Download Surat
                        </a>
                    </div>
                @else
                    <p class="text-sm text-gray-500">Surat belum tersedia.</p>
                @endif
            </div>
        </div>
    </div>
    </div>
@endsection
