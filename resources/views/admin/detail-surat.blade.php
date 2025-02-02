@extends('components.layout')

@section('title', 'Detail Surat')

@section('content')
    <div class="mt-4">
        <div class="caption mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Detail Surat</h1>
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
            </div>
            <div class="mt-4">
                <a href="{{ route('surat.generate', ['id' => $surat->id]) }}"
                    class="inline-block px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">
                    Buat Surat
                </a>
            </div>

        </div>
    </div>
@endsection
