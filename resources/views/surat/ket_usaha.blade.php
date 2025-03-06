@extends('components.layout')

@section('title', 'Surat Ket Usaha')

@section('content')
    <div class="container mx-auto mt-4 p-6 bg-[#123524] rounded-lg shadow-lg max-w-4xl">
        <h2 class="text-2xl font-semibold mb-6 text-[#EFE3C2]">Surat Keterangan Usaha</h2>

        {{-- Alert Error --}}
        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 border-l-4 border-red-500 text-red-700 rounded-lg">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('citizen.buat-surat.submit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="jenis_surat" value="ket_usaha">

            <div id="form_ket_usaha">
                <h3 class="text-lg font-semibold text-[#EFE3C2] mb-4">Syarat Surat Keterangan Usaha</h3>

                <div class="space-y-4">
                    <div>
                        <label class="block text-sm text-[#EFE3C2]">Kartu Keluarga</label>
                        <input type="file" name="file_persyaratan" id="file_persyaratan"
                            class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>
                    <div>
                        <label for="no_hp" class="block text-sm text-[#EFE3C2]">Nomor HP Aktif</label>
                        <input type="text" name="no_hp" id="no_hp"
                            class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            placeholder="Masukkan nomor HP aktif" required>
                    </div>

                    <!-- Input Fields -->
                    @php
                        $fields = [
                            'nama' => 'Nama',
                            'tempat_lahir' => 'Tempat Lahir',
                            'tanggal_lahir' => 'Tanggal Lahir',
                            'nik' => 'NIK',
                            'jenis_kelamin' => 'Jenis Kelamin',
                            'pekerjaan' => 'Pekerjaan',
                            'alamat' => 'Lingkungan Asal',
                            'nama_usaha' => 'Nama Usaha',
                        ];
                    @endphp

                    @foreach ($fields as $field => $label)
                        <div>
                            <label for="{{ $field }}"
                                class="block text-sm text-[#EFE3C2]">{{ $label }}</label>
                            <input type="{{ $field == 'tanggal_lahir' ? 'date' : 'text' }}"
                                name="data_surat[{{ $field }}]" id="{{ $field }}"
                                class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="Masukkan {{ $label }}" required>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full py-2 px-4 bg-[#3E7B27] text-white font-semibold rounded-lg focus:outline-none focus:ring-2 hover:bg-gray-700 mt-4">
                Kirim Permohonan
            </button>
        </form>
    </div>
@endsection
