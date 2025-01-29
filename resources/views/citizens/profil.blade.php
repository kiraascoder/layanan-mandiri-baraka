@extends('components.layout')

@section('title', 'Profil')

@section('content')
    <div class="bg-gray-100">
        <div class="container mx-auto py-8">
            <div class="grid grid-cols-4 sm:grid-cols-12 gap-6 px-4">
                <div class="col-span-4 sm:col-span-3">
                    <div class="bg-white shadow rounded-lg p-6">
                        <div class="flex flex-col items-center">
                            <img src="https://randomuser.me/api/portraits/men/94.jpg"
                                class="w-32 h-32 bg-gray-300 rounded-full mb-4 shrink-0">

                            </img>

                            <h1 class="text-xl font-bold">{{ Auth::user()->name }}</h1>
                            <p class="text-gray-700">{{ Auth::user()->nik }}</p>

                        </div>
                        <hr class="my-6 border-t border-gray-300">
                    </div>
                </div>
                <div class="col-span-4 sm:col-span-9">
                    <div class="bg-white shadow rounded-lg p-6">
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" id="disabled-input" aria-label="disabled input" name="nik"
                                id="nik"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                value="{{ old('nik', Auth::user()->nik) }}" disabled>
                            <label for="nik"
                                class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:scale-75 peer-focus:-translate-y-6">
                                NIK</label>
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" id="disabled-input" aria-label="disabled input" name="nik"
                                id="nik"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                value="{{ old('nik', Auth::user()->name) }}" disabled>
                            <label for="nik"
                                class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:scale-75 peer-focus:-translate-y-6">
                                NAMA</label>
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" id="disabled-input" aria-label="disabled input" name="nik"
                                id="nik"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                value="{{ old('nik', Auth::user()->tempat_lahir) }}" disabled>
                            <label for="nik"
                                class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:scale-75 peer-focus:-translate-y-6">
                                TEMPAT LAHIR</label>
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" id="disabled-input" aria-label="disabled input" name="nik"
                                id="nik"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                value="{{ old('nik', Auth::user()->tanggal_lahir) }}" disabled>
                            <label for="nik"
                                class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:scale-75 peer-focus:-translate-y-6">
                                TANGGAL LAHIR</label>
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" id="disabled-input" aria-label="disabled input" name="nik"
                                id="nik"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                value="{{ old('nik', Auth::user()->jenis_kelamin) }}" disabled>
                            <label for="nik"
                                class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:scale-75 peer-focus:-translate-y-6">
                                JENIS KELAMIN</label>
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" id="disabled-input" aria-label="disabled input" name="nik"
                                id="nik"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                value="{{ old('nik', Auth::user()->alamat) }}" disabled>
                            <label for="nik"
                                class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:scale-75 peer-focus:-translate-y-6">
                                ALAMAT</label>
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" id="disabled-input" aria-label="disabled input" name="nik"
                                id="nik"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                value="{{ old('nik', Auth::user()->agama) }}" disabled>
                            <label for="nik"
                                class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:scale-75 peer-focus:-translate-y-6">
                                AGAMA</label>
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" id="disabled-input" aria-label="disabled input" name="nik"
                                id="nik"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                value="{{ old('nik', Auth::user()->status_perkawinan) }}" disabled>
                            <label for="nik"
                                class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:scale-75 peer-focus:-translate-y-6">
                                STATUS PERKAWINAN</label>
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" id="disabled-input" aria-label="disabled input" name="nik"
                                id="nik"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                value="{{ old('nik', Auth::user()->pekerjaan) }}" disabled>
                            <label for="nik"
                                class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:scale-75 peer-focus:-translate-y-6">
                                PEKERJAAN</label>
                        </div>
                        <div class="relative z-0 w-full mb-5 group">
                            <input type="text" id="disabled-input" aria-label="disabled input" name="nik"
                                id="nik"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                value="{{ old('nik', Auth::user()->golongan_darah) }}" disabled>
                            <label for="nik"
                                class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:scale-75 peer-focus:-translate-y-6">
                                GOLONGAN DARAH</label>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
