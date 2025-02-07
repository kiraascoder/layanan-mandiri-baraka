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

            <!-- Form untuk Update Status Surat -->
            <div class="mt-6">
                <form action="{{ route('admin.surat.updateStatus', $surat->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <label for="status" class="block text-sm font-medium text-gray-700">Pilih Status:</label>
                    <select name="status" id="status"
                        class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                        <option value="pending" {{ $surat->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="diproses" {{ $surat->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                        <option value="selesai" {{ $surat->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        <option value="ditolak" {{ $surat->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                    </select>

                    <!-- Alasan Reject jika status adalah ditolak -->
                    <div id="alasan_reject_div" class="mt-4" style="display: none;">
                        <label for="alasan_reject" class="block text-sm font-medium text-gray-700">Alasan Penolakan:</label>
                        <textarea name="alasan_reject" id="alasan_reject" rows="3"
                            class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">{{ old('alasan_reject', $surat->alasan_reject) }}</textarea>
                    </div>

                    <button type="submit" id="updateStatusButton"
                        class="mt-4 inline-block px-4 py-2 bg-[#3E7B27] text-white rounded-md hover:bg-gray-600">
                        Update Status
                    </button>
                </form>
            </div>

            <!-- Upload Surat -->
            <div id="uploadSuratDiv" class="mt-4" style="display: block;">
                <form action="{{ route('admin.surat.upload', $surat->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="file_surat" class="block text-sm font-medium text-gray-700">Upload Surat:</label>
                    <input type="file" name="surat_selesai" id="surat_selesai"
                        class="mt-2 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border file:border-gray-300 file:text-sm file:bg-gray-50 file:hover:bg-gray-100">

                    <button type="submit"
                        class="inline-block px-4 py-2 bg-[#3E7B27] text-white rounded-md hover:bg-gray-600 mt-4">
                        Upload Surat
                    </button>
                </form>
            </div>

            <div class="mt-4">
                <a href="{{ route('admin.surat.generate', ['id' => $surat->id]) }}"
                    class="inline-block px-4 py-2 bg-[#3E7B27] text-white rounded-md hover:bg-gray-600">
                    Buat Surat
                </a>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const statusSelect = document.getElementById('status');
            const alasanRejectDiv = document.getElementById('alasan_reject_div');
            const updateStatusButton = document.getElementById('updateStatusButton');

            function toggleAlasanReject() {
                alasanRejectDiv.style.display = (statusSelect.value === 'ditolak') ? 'block' : 'none';
            }
            statusSelect.addEventListener('change', function() {
                toggleAlasanReject();

            });

            toggleAlasanReject();
            hideUpdateStatusButton();
        });
    </script>
@endsection
