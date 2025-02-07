@extends('components.layout')

@section('title', 'Layanan Surat')

@section('content')
    <div class="mt-4">
        @if (session('success'))
            <div class="p-4 mb-4 text-green-700 bg-green-100 rounded-lg">
                {{ session('success') }}
            </div>
        @endif
        <div class="caption">
            <h1 class="text-3xl font-bold">Layanan Surat</h1>
            <p class="mt-2">Buat Surat</p>
        </div>
        <div class="mt-4 mb-4">
            <a href="{{ route('citizen.buat-surat') }}"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-[#3E7B27] dark:hover:bg-gray-600 rounded-lg">
                Buat Surat
            </a>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-2">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-[#EFE3C2]">
                <thead class="text-xs text-gray-700 uppercase bg-[#EFE3C2] dark:bg-[#123524] dark:text-[#EFE3C2] border-b ">
                    <tr>
                        <th scope="col" class="px-6 py-3">NIK</th>
                        <th scope="col" class="px-6 py-3">Nama</th>
                        <th scope="col" class="px-6 py-3">Jenis Surat</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                        <th scope="col" class="px-6 py-3">Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($surats as $surat)
                        <tr
                            class="bg-white border-b dark:bg-[#123524] dark:border-[#123524]  dark:hover:bg-gray-600 text-[#EFE3C2]">
                            <td class="px-6 py-4">{{ $surat->citizen->nik }}</td>
                            <td class="px-6 py-4">{{ $surat->citizen->name }}</td>
                            <td class="px-6 py-4 capitalize">{{ str_replace('_', ' ', $surat->jenis_surat) }}</td>
                            <td class="px-6 py-4 capitalize">{{ $surat->status ?? '-' }}</td>
                            <td class="px-6 py-4 "><a href="{{ route('citizen.detail-surat', $surat->id) }}"
                                    class="text-blue-500 hover:underline">Lihat Detail</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
