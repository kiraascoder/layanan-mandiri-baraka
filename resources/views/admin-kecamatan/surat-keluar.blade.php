@extends('components.layout')

@section('title', 'Daftar Surat Keluar')

@section('content')
    <div class="mt-4">
        <div class="caption">
            <h1 class="text-3xl font-bold">Daftar Surat Keluar</h1>
            <p>Daftar Surat Keluar Dari Kelurahan</p>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-[#123524] dark:bg-[#123524] dark:text-gray-400 border-b">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            NIK
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Kelurahan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jenis Surat
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status Surat
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Detail
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($surats as $surat)
                        <tr
                            class="bg-white border-b dark:bg-[#123524] dark:border-[#EFE3C2] hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4">{{ $surat->citizen->nik }}</td>
                            <td class="px-6 py-4">{{ $surat->citizen->name }}</td>
                            <td class="px-6 py-4">{{ $surat->citizen->kelurahan->nama }}</td>
                            <td class="px-6 py-4 capitalize">{{ str_replace('_', ' ', $surat->jenis_surat) }}</td>
                            <td class="px-6 py-4 capitalize">{{ $surat->status ?? '-' }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ route('admin.detail-surat-keluar', $surat->id) }}"
                                    class="text-blue-500 hover:underline">
                                    Lihat Detail
                                </a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
