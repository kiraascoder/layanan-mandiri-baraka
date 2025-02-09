@extends('components.layout')

@section('title', 'Daftar Kelurahan')

@section('content')
    <div class="mt-4">
        <div class="caption">
            <h1 class="text-3xl font-bold mt-4">Daftar Kelurahan</h1>
            <p>Informasi Kelurahan</p>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-2">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-[#123524] dark:bg-[#123524] dark:text-gray-400 border-b">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Nama Kelurahan
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        @if ($item->role !== 'superadmin')
                            <tr
                                class="bg-white border-b dark:bg-[#123524] dark:border-[#EFE3C2] hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4">
                                    {{ $item->name }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->email }}
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('admin.detail-kelurahan', $item->kelurahan_id) }}"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detail</a>
                                </td>
                            </tr>
                        @endif
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
