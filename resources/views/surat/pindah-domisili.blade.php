@extends('components.layout')

@section('title', 'Surat Ket Domisili')

@section('content')
    <div class="container mx-auto mt-4 p-6 bg-[#123524] rounded-lg shadow-lg max-w-4xl">
        <h2 class="text-2xl font-semibold mb-6 text-[#EFE3C2]">Surat Keterangan Pindah Domisili</h2>

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
            <input type="hidden" name="jenis_surat" value="pindah_domisili">

            <div id="form_pindah_domisili">
                <h3 class="text-lg font-semibold text-[#EFE3C2] mb-4">Syarat Surat Keterangan Pindah Domisili</h3>

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


                    <!-- Alamat Asal -->
                    <div>
                        <label class="block text-sm text-[#EFE3C2]">Alamat Asal</label>
                        <input type="text" name="data_surat[alamat_asal]" id="alamat_asal"
                            class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Masukkan Alamat Asal" required>
                    </div>

                    <!-- ALamat Tujuan -->
                    <div>
                        <label class="block text-sm text-[#EFE3C2]">Alamat Tujuan</label>
                        <input type="text" name="data_surat[alamat_tujuan]" id="alamat_tujuan"
                            class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Masukkan Alamat Tujuan" required>
                    </div>

                    <!-- Alasan Pindah -->
                    <div>
                        <label class="block text-sm text-[#EFE3C2]">Alasan Pindah</label>
                        <input type="text" name="data_surat[alasan_pindah]" id="alasan_pindah"
                            class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Masukkan Alasan Pindah" required>
                    </div>

                    <!-- Jumlah Anggota -->
                    <div>
                        <label class="block text-sm text-[#EFE3C2]">Jumlah Anggota</label>
                        <input type="text" name="data_surat[jumlah_anggota]" id="jumlah_anggota"
                            class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Masukkan Jumlah Anggota" required>
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
