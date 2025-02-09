@extends('components.layout')

@section('title', 'Tambah Penduduk')

@section('content')
    <div class="container mx-auto mt-4 p-6 bg-[#123524] rounded-lg shadow-lg max-w-4xl">
        <h2 class="text-2xl font-semibold mb-6 text-[#EFE3C2]">Tambah Penduduk</h2>

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

        <form action="{{ route('admin.daftar-penduduk.tambah.submit') }}" method="POST" class="space-y-4">
            @csrf
            <!-- NIK -->
            <div>
                <label class="block text-sm text-[#EFE3C2]">NIK</label>
                <input type="text" name="nik" id="nik"
                    class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan NIK" required>
            </div>

            <!-- Nama -->
            <div>
                <label class="block text-sm text-[#EFE3C2]">Nama</label>
                <input type="text" name="name" id="name"
                    class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan Nama" required>
            </div>

            <!-- Tempat Lahir -->
            <div>
                <label class="block text-sm text-[#EFE3C2]">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" id="tempat_lahir"
                    class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan Tempat Lahir" required>
            </div>

            <!-- Tanggal Lahir -->
            <div>
                <label class="block text-sm text-[#EFE3C2]">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                    class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <!-- Jenis Kelamin -->
            <div>
                <label class="block text-sm text-[#EFE3C2]">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin"
                    class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                    <option value="" selected>-- Pilih Jenis Kelamin --</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>

            <!-- Alamat -->
            <div>
                <label class="block text-sm text-[#EFE3C2]">Alamat</label>
                <input type="text" name="alamat" id="alamat"
                    class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan Alamat" required>
            </div>

            <!-- Agama -->
            <div>
                <label class="block text-sm text-[#EFE3C2]">Agama</label>
                <select name="agama" id="agama"
                    class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                    <option value="" selected>-- Pilih Agama --</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Konghucu">Konghucu</option>
                </select>
            </div>

            <!-- Status Perkawinan -->
            <div>
                <label class="block text-sm text-[#EFE3C2]">Status Perkawinan</label>
                <select name="status_perkawinan" id="status_perkawinan"
                    class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                    <option value="" selected>-- Pilih Status --</option>
                    <option value="Belum Kawin">Belum Kawin</option>
                    <option value="Kawin">Kawin</option>
                    <option value="Cerai Hidup">Cerai Hidup</option>
                    <option value="Cerai Mati">Cerai Mati</option>
                </select>
            </div>

            <!-- Pekerjaan -->
            <div>
                <label class="block text-sm text-[#EFE3C2]">Pekerjaan</label>
                <input type="text" name="pekerjaan" id="pekerjaan"
                    class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan Pekerjaan" required>
            </div>

            <!-- Kewarganegaraan -->
            <div>
                <label class="block text-sm text-[#EFE3C2]">Kewarganegaraan</label>
                <input type="text" name="kewarganegaraan" id="kewarganegaraan"
                    class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan Kewarganegaraan" required>
            </div>

            <!-- Golongan Darah -->
            <div>
                <label class="block text-sm text-[#EFE3C2]">Golongan Darah</label>
                <select name="golongan_darah" id="golongan_darah"
                    class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                    <option value="" selected>-- Pilih Golongan Darah --</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="AB">AB</option>
                    <option value="O">O</option>
                </select>
            </div>

            <!-- Password -->
            <div>
                <label class="block text-sm text-[#EFE3C2]">Password</label>
                <input type="password" name="password" id="password"
                    class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan Password" required>
            </div>

            <!-- Konfirmasi Password -->
            <div>
                <label class="block text-sm text-[#EFE3C2]">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Konfirmasi Password" required>
            </div>

            <!-- Tombol Simpan -->
            <button type="submit"
                class="w-full py-2 px-4 bg-[#3E7B27] text-white font-semibold rounded-lg focus:outline-none focus:ring-2  hover:bg-gray-700 mt-4">
                Simpan
            </button>
        </form>
    </div>
@endsection
