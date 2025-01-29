@extends('components.layout')

@section('title', 'Edit Penduduk')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Edit Penduduk</h2>

        {{-- Alert Error --}}
        @if ($errors->any())
            <div class="mb-4 ">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-red-600">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.daftar-penduduk.edit-penduduk.submit', ['nik' => $citizen->nik]) }}" method="POST">
            @csrf
            @method('PUT')


            <div class="relative z-0 w-full mb-5 group">
                <input type="text" id="disabled-input" aria-label="disabled input" name="nik" id="nik"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    value="{{ old('nik', $citizen->nik) }}" disabled>
                <label for="nik"
                    class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:scale-75 peer-focus:-translate-y-6">
                    NIK</label>
            </div>
            <!-- Nama -->
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="name" id="name"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder="" value="{{ old('name', $citizen->name) }}">
                <label for="name"
                    class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Nama</label>
            </div>
            <!-- Tempat Lahir -->
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="tempat_lahir" id="tempat_lahir" id="disabled-input" aria-label="disabled input"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " value="{{ old('tempat_lahir', $citizen->tempat_lahir) }}" disabled>
                <label for="tempat_lahir"
                    class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Tempat Lahir</label>
            </div>

            <!-- Tanggal Lahir -->
            <div class="relative z-0 w-full mb-5 group">
                <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    value="{{ old('tanggal_lahir', $citizen->tanggal_lahir) }}">
                <label for="tanggal_lahir"
                    class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Tanggal Lahir</label>
            </div>

            <!-- Jenis Kelamin -->
            <div class="relative z-0 w-full mb-5 group">
                <select name="jenis_kelamin" id="jenis_kelamin"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                    <option value="Laki-laki"
                        {{ old('jenis_kelamin', $citizen->jenis_kelamin) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                    </option>
                    <option value="Perempuan"
                        {{ old('jenis_kelamin', $citizen->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan
                    </option>
                </select>
                <label for="jenis_kelamin"
                    class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Jenis Kelamin</label>
            </div>

            <!-- Alamat -->
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="alamat" id="alamat"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " value="{{ old('alamat', $citizen->alamat) }}">
                <label for="alamat"
                    class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Alamat</label>
            </div>

            <!-- Agama -->
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="agama" id="agama"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " value="{{ old('agama', $citizen->agama) }}">
                <label for="agama"
                    class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Agama</label>
                @error('agama')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Status Perkawinan -->
            <div class="relative z-0 w-full mb-5 group">
                <select name="status_perkawinan" id="status_perkawinan"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                    <option value="Belum Kawin"
                        {{ old('status_perkawinan', $citizen->status_perkawinan) == 'Belum Kawin' ? 'selected' : '' }}>
                        Belum Kawin</option>
                    <option value="Kawin"
                        {{ old('status_perkawinan', $citizen->status_perkawinan) == 'Kawin' ? 'selected' : '' }}>Kawin
                    </option>
                    <option value="Cerai Hidup"
                        {{ old('status_perkawinan', $citizen->status_perkawinan) == 'Cerai Hidup' ? 'selected' : '' }}>
                        Cerai Hidup</option>
                    <option value="Cerai Mati"
                        {{ old('status_perkawinan', $citizen->status_perkawinan) == 'Cerai Mati' ? 'selected' : '' }}>Cerai
                        Mati</option>
                </select>
                <label for="status_perkawinan"
                    class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Status Perkawinan</label>
                @error('status_perkawinan')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Pekerjaan -->
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="pekerjaan" id="pekerjaan"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " value="{{ old('pekerjaan', $citizen->pekerjaan) }}">
                <label for="pekerjaan"
                    class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Pekerjaan</label>
                @error('pekerjaan')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Kewarganegaraan -->
            <div class="relative z-0 w-full mb-5 group">
                <select name="kewarganegaraan" id="kewarganegaraan"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                    <option value="WNI"
                        {{ old('kewarganegaraan', $citizen->kewarganegaraan) == 'WNI' ? 'selected' : '' }}>WNI</option>
                    <option value="WNA"
                        {{ old('kewarganegaraan', $citizen->kewarganegaraan) == 'WNA' ? 'selected' : '' }}>WNA</option>
                </select>
                <label for="kewarganegaraan"
                    class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Kewarganegaraan</label>
                @error('kewarganegaraan')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit"
                class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Update</button>
        </form>

    </div>
@endsection
