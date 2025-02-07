@extends('components.layout')

@section('title', 'Edit Penduduk')

@section('content')
    <div class="container mx-auto mt-4 p-6 bg-[#123524] rounded-lg shadow-lg max-w-4xl">
        <h2 class="text-2xl font-semibold mb-6 text-[#EFE3C2]">Edit Penduduk</h2>

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
        <form action="{{ route('admin.daftar-penduduk.edit-penduduk.submit', $citizen->nik) }}" method="POST">
            @csrf
            @method('PUT')
            <!-- Form fields -->
            <!-- NIK -->
            <div>
                <label class="block text-sm text-[#EFE3C2]">NIK</label>
                <input type="text" name="nik" id="nik"
                    class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ $citizen->nik }}" placeholder="Masukkan NIK" required>
            </div>

            <!-- Nama -->
            <div>
                <label class="block text-sm text-[#EFE3C2]">Nama</label>
                <input type="text" name="name" id="name"
                    class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    value="{{ $citizen->name }}" placeholder="Masukkan Nama" required>
            </div>

            <!-- Tempat Lahir -->
            <div>
                <label class="block text-sm text-[#EFE3C2]">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" id="tempat_lahir" value="{{ $citizen->tempat_lahir }}"
                    class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan Tempat Lahir" required>
            </div>

            <!-- Tanggal Lahir -->
            <div>
                <label class="block text-sm text-[#EFE3C2]">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ $citizen->tanggal_lahir }}"
                    class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <!-- Jenis Kelamin -->
            <div>
                <label class="block text-sm text-[#EFE3C2]">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin"
                    class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                    <option value="" {{ empty($citizen->jenis_kelamin) ? 'selected' : '' }}>-- Pilih Jenis Kelamin --
                    </option>
                    <option value="Laki-laki" {{ $citizen->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                    </option>
                    <option value="Perempuan" {{ $citizen->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan
                    </option>
                </select>

            </div>

            <!-- Alamat -->
            <div>
                <label class="block text-sm text-[#EFE3C2]">Alamat</label>
                <input type="text" name="alamat" id="alamat" value="{{ $citizen->alamat }}"
                    class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan Alamat" required>
            </div>

            <!-- Agama -->
            <div>
                <label class="block text-sm text-[#EFE3C2]">Agama</label>
                <select name="agama" id="agama"
                    class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                    <option value="Islam" {{ $citizen->agama == 'Islam' ? 'selected' : '' }}>Islam</option>
                    <option value="Kristen" {{ $citizen->agama == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                    <option value="Katolik" {{ $citizen->agama == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                    <option value="Hindu" {{ $citizen->agama == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                    <option value="Buddha" {{ $citizen->agama == 'Buddha' ? 'selected' : '' }}>Buddha</option>

                </select>

            </div>

            <!-- Status Perkawinan -->
            <div>
                <label class="block text-sm text-[#EFE3C2]">Status Perkawinan</label>
                <select name="status_perkawinan" id="status_perkawinan"
                    class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                    <option value="" {{ empty($citizen->status_perkawinan) ? 'selected' : '' }}>-- Pilih Status --
                    </option>
                    <option value="Belum Kawin" {{ $citizen->status_perkawinan == 'Belum Kawin' ? 'selected' : '' }}>Belum
                        Kawin</option>
                    <option value="Kawin" {{ $citizen->status_perkawinan == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                    <option value="Cerai Hidup" {{ $citizen->status_perkawinan == 'Cerai Hidup' ? 'selected' : '' }}>Cerai
                        Hidup</option>
                    <option value="Cerai Mati" {{ $citizen->status_perkawinan == 'Cerai Mati' ? 'selected' : '' }}>Cerai
                        Mati</option>
                </select>

            </div>

            <!-- Pekerjaan -->
            <div>
                <label class="block text-sm text-[#EFE3C2]">Pekerjaan</label>
                <input type="text" name="pekerjaan" id="pekerjaan" value="{{ $citizen->pekerjaan }}"
                    class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan Pekerjaan" required>
            </div>

            <!-- Kewarganegaraan -->
            <div>
                <label class="block text-sm text-[#EFE3C2]">Kewarganegaraan</label>
                <input type="text" name="kewarganegaraan" id="kewarganegaraan" value="{{ $citizen->kewarganegaraan }}"
                    class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan Kewarganegaraan" required>
            </div>

            <!-- Golongan Darah -->
            <div>
                <label class="block text-sm text-[#EFE3C2]">Golongan Darah</label>
                <select name="golongan_darah" id="golongan_darah"
                    class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>
                    <option value="" {{ empty($citizen->golongan_darah) ? 'selected' : '' }}>-- Pilih Golongan Darah
                        --</option>
                    <option value="A" {{ $citizen->golongan_darah == 'A' ? 'selected' : '' }}>A</option>
                    <option value="B" {{ $citizen->golongan_darah == 'B' ? 'selected' : '' }}>B</option>
                    <option value="AB" {{ $citizen->golongan_darah == 'AB' ? 'selected' : '' }}>AB</option>
                    <option value="O" {{ $citizen->golongan_darah == 'O' ? 'selected' : '' }}>O</option>
                </select>

            </div>
            <!-- Tombol Simpan -->
            <button type="submit"
                class="w-full py-2 px-4 bg-[#3E7B27] text-white font-semibold rounded-lg focus:outline-none focus:ring-2  hover:bg-gray-700 mt-4">
                Simpan
            </button>
        </form>
    </div>
@endsection
