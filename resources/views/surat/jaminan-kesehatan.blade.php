@extends('components.layout')

@section('title', 'Surat Jaminan Kesehatan')

@section('content')
    <div class="container mx-auto mt-4 p-6 bg-[#123524] rounded-lg shadow-lg max-w-4xl">
        <h2 class="text-2xl font-semibold mb-6 text-[#EFE3C2]">Surat Jaminan Kesehatan</h2>

        {{-- Alert Error --}}
        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 border-l-4 border-red-500 text-red-700">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('citizen.buat-surat.submit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="jenis_surat" value="jaminan_kesehatan">

            <div id="form_jaminan_kematian">
                <h3 class="text-lg font-semibold text-[#EFE3C2] mb-4">Syarat Surat Keterangan Jaminan Kesehatan</h3>

                <div class="space-y-4">
                    <!-- Dokumen Pendukung -->
                    <div>
                        <label class="block text-sm text-[#EFE3C2]">Dokumen Pendukung</label>
                        <input type="file" name="file_persyaratan" id="file_persyaratan"
                            class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>

                    <div>
                        <label class="block text-sm text-[#EFE3C2]">Nomor HP Aktif</label>
                        <input type="text" name="no_hp" id="no_hp"
                            class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Masukkan nomor HP aktif" required>
                    </div>


                    <!-- Nama Pemohon -->
                    <div>
                        <label class="block text-sm text-[#EFE3C2]">Nama Pemohon</label>
                        <input type="text" name="data_surat[nama_pemohon]" id="nama_pemohon"
                            class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Masukkan Nama Pemohon" required>
                    </div>

                    <!-- NIK -->
                    <div>
                        <label class="block text-sm text-[#EFE3C2]">NIK</label>
                        <input type="text" name="data_surat[nik]" id="nik"
                            class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Masukkan NIK" required>
                    </div>

                    <!-- Alamat -->
                    <div>
                        <label class="block text-sm text-[#EFE3C2]">Alamat</label>
                        <input type="text" name="data_surat[alamat]" id="alamat"
                            class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Masukkan Alamat" required>
                    </div>

                    <!-- Keterangan Kesehatan -->
                    <div>
                        <label class="block text-sm text-[#EFE3C2]">Keterangan Kesehatan</label>
                        <input type="text" name="data_surat[keterangan_kesehatan]" id="keterangan_kesehatan"
                            class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Masukkan Keterangan Kesehatan" required>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full py-2 px-4 bg-[#3E7B27] text-white font-semibold rounded-lg focus:outline-none focus:ring-2  hover:bg-gray-700 mt-4">
                Kirim Permohonan
            </button>
        </form>
    </div>
@endsection
