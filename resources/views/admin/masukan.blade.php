@extends('components.layout')

@section('title', 'Masukan')

@section('content')
    <div class="mt-4">
        <div class="caption">
            <h1 class="text-3xl font-bold">Masukan Penduduk</h1>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-[#123524] dark:bg-[#123524] dark:text-gray-400 border-b">
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
                    @foreach ($sarans as $saran)
                        <tr
                            class="bg-white border-b dark:bg-[#123524] dark:border-[#EFE3C2] hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4">
                                {{ $saran->citizen->nik }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $saran->citizen->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $saran->isi_saran }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
