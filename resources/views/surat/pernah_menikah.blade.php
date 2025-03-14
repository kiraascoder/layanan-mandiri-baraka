@extends('components.layout')

@section('title', 'Surat Ket Pernah Menikah')

@section('content')
    <div class="container mx-auto mt-4 p-6 bg-[#123524] rounded-lg shadow-lg max-w-4xl">
        <h2 class="text-2xl font-semibold mb-6 text-[#EFE3C2]">Surat Keterangan Pernah Menikah</h2>

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
            <input type="hidden" name="jenis_surat" value="pernah_menikah">

            <div id="form_kelahiran">
                <h3 class="text-lg font-semibold text-[#EFE3C2] mb-4">Syarat Surat Keterangan Pernah Menikah</h3>

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm text-[#EFE3C2]">Kartu Keluarga</label>
                        <input type="file" name="file_persyaratan" id="file_persyaratan"
                            class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>

                    <!-- Nomor HP Aktif -->
                    <div>
                        <label class="block text-sm text-[#EFE3C2]">Nomor HP Aktif</label>
                        <input type="text" name="no_hp" id="no_hp"
                            class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Masukkan nomor HP aktif" required>
                    </div>


                    <div>
                        <label class="block text-sm text-[#EFE3C2]">Nama Suami</label>
                        <input type="text" name="data_surat[nama_suami]" id="nama_suami"
                            class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Masukkan Nama Suami" required>
                    </div>


                    <div>
                        <label class="block text-sm text-[#EFE3C2]">Tempat Lahir Suami</label>
                        <input type="text" name="data_surat[tempat_lahir_suami]" id="tempat_lahir_suami"
                            class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Masukkan Tempat Lahir" required>
                    </div>


                    <div>
                        <label class="block text-sm text-[#EFE3C2]">Tanggal Lahir Suami</label>
                        <input type="date" name="data_surat[tanggal_lahir_suami]" id="tanggal_lahir_suami"
                            class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Masukkan Tanggal Lahir" required>
                    </div>

                    <div>
                        <label class="block text-sm text-[#EFE3C2]">Nama Istri</label>
                        <input type="text" name="data_surat[nama_istri]" id="nama_istri"
                            class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Masukkan Nama Istri" required>
                    </div>


                    <div>
                        <label class="block text-sm text-[#EFE3C2]">Tempat Lahir Istri</label>
                        <input type="text" name="data_surat[tempat_lahir_istri]" id="tempat_lahir_istri"
                            class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Masukkan Tempat Lahir" required>
                    </div>


                    <div>
                        <label class="block text-sm text-[#EFE3C2]">Tanggal Lahir Istri</label>
                        <input type="date" name="data_surat[tanggal_lahir_istri]" id="tanggal_lahir_istri"
                            class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Masukkan Tanggal Lahir" required>
                    </div>


                    <div>
                        <label class="block text-sm text-[#EFE3C2]">Lingkungan Asal</label>
                        <input type="text" name="data_surat[alamat]" id="alamat"
                            class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Masukkan Alamat" required>
                    </div>


                    <div>
                        <label class="block text-sm text-[#EFE3C2]">NO KK</label>
                        <input type="text" name="data_surat[no_kk]" id="nok_kk"
                            class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Masukkan Nomor Kartu Keluarga" required>
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
