@extends('components.layout')

@section('title', 'Surat Ket Tidak Mampu')

@section('content')
    <div class="container mx-auto mt-4 p-6 bg-[#123524] rounded-lg shadow-lg max-w-4xl">
        <h2 class="text-2xl font-semibold mb-6 text-[#EFE3C2]">Surat Keterangan Tidak Mampu</h2>

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
            <input type="hidden" name="jenis_surat" value="ket_tidak_mampu">

            <div id="form_kematian">
                <h3 class="text-lg font-semibold text-[#EFE3C2] mb-4">Syarat Surat Keterangan Kematian</h3>

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm text-[#EFE3C2]">Kartu Keluarga</label>
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


                    <div>
                        <label class="block text-sm text-[#EFE3C2]">Nama Anak</label>
                        <input type="text" name="data_surat[nama_anak]" id="nama_anak"
                            class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Masukkan nama" required>
                    </div>


                    <div>
                        <label class="block text-sm text-[#EFE3C2]">Tempat Lahir</label>
                        <input type="text" name="data_surat[tempat_lahir]" id="tempat_lahir"
                            class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Masukkan Tempat Lahir" required>
                    </div>


                    <div>
                        <label class="block text-sm text-[#EFE3C2]">Tanggal Lahir</label>
                        <input type="date" name="data_surat[tanggal_lahir]" id="tanggal_lahir"
                            class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Masukkan Tanggal Lahir" required>
                    </div>


                    <div>
                        <label class="block text-sm text-[#EFE3C2]">NIK</label>
                        <input type="text" name="data_surat[nik]" id="nik"
                            class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Masukkan NIK" required>
                    </div>

                    <div>
                        <label class="block text-sm text-[#EFE3C2]">Jenis Kelamin</label>
                        <select name="data_surat[jenis_kelamin]" id="jenis_kelamin"
                            class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                            <option value="" selected>-- Pilih Jenis Kelamin --</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>


                    <div>
                        <label class="block text-sm text-[#EFE3C2]">Pekerjaan</label>
                        <input type="text" name="data_surat[pekerjaan]" id="pekerjaan"
                            class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Masukkan Pekerjaan" required>
                    </div>

                    <div>
                        <label class="block text-sm text-[#EFE3C2]">Lingkungan Asal</label>
                        <input type="text" name="data_surat[alamat]" id="alamat"
                            class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Masukkan Alamat" required>
                    </div>

                    <div>
                        <label class="block text-sm text-[#EFE3C2]">Nama Ayah</label>
                        <input type="text" name="data_surat[nama_ayah]" id="nama_ayah"
                            class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Masukkan Nama Ayah" required>
                    </div>

                    <div>
                        <label class="block text-sm text-[#EFE3C2]">Umur</label>
                        <input type="text" name="data_surat[umur]" id="umur"
                            class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Masukkan Umur" required>
                    </div>

                    <div>
                        <label class="block text-sm text-[#EFE3C2]">Pekerjaan</label>
                        <input type="text" name="data_surat[pekerjaan_ortu]" id="pekerjaan_ortu"
                            class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Masukkan Pekerjaan Orang tua" required>
                    </div>

                    <div>
                        <label class="block text-sm text-[#EFE3C2]">Lingkungan Anda Berasal</label>
                        <input type="text" name="data_surat[alamat_ortu]" id="alamat_ortu"
                            class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Masukkan Lingkungan Asal" required>
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
