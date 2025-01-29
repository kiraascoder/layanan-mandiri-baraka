@extends('components.layout')

@section('title', 'Beri Saran')

@section('content')
    <div class="mt-4">
        <div class="caption">
            <h1 class="text-3xl font-bold">Beri Saran</h1>
            <p class="mt-2">
                Beri Saran
            </p>
        </div>
        <div class="mt-4 mb-4">
            <a href="{{ route('admin.daftar-penduduk.tambah-penduduk') }}"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg">
                Berikan Saran
            </a>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-2">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            NIK
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Deskripsi
                        </th>
                    </tr>
                </thead>
                <tbody>

                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">

                        </td>
                        <td class="px-6 py-4">

                        </td>
                        <td class="px-6 py-4">

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
