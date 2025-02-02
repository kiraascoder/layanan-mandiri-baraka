@extends('components.layout')

@section('title', 'Pindah Domisili')


@section('content')
    <div class="container mx-auto mt-4 p-6 bg-white rounded-lg shadow-lg max-w-4xl">
        <h2 class="text-2xl font-semibold mb-6 text-gray-800">Surat Keterangan Pindah Domisili</h2>
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
        <!-- Form Surat Keterangan Pindah Domisili -->
        <form action="{{ route('citizen.buat-surat.submit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="jenis_surat" value="pindah_domisili">
            <div id="form_pindah_domisili">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Syarat Surat Keterangan Pindah Domisili</h3>
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm text-gray-700">Fotokopi KTP Pemohon</label>
                        <input type="file" name="ktp_pemohon" id="ktp_pemohon"
                            class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>
                    <div>
                        <label class="block text-sm text-gray-700">Surat Pengantar dari RT/RW</label>
                        <input type="file" name="surat_pengantar_rt_rw"
                            class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>
                    <div>
                        <label class="block text-sm text-gray-700">Fotokopi Kartu Keluarga (KK)</label>
                        <input type="file" name="fotokopi_kk" id="fotokopi_kk"
                            class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required>
                    </div>
                </div>
            </div>
            <div>
                <label class="block text-sm text-gray-700">Nomor HP Aktif</label>
                <input type="text" name="no_hp" id="no_hp"
                    class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan nomor HP aktif" required>
            </div>
            <!-- Submit Button -->
            <button type="submit"
                class="w-full py-2 px-4 bg-blue-600 text-white font-semibold rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 hover:bg-blue-700 mt-4">
                Kirim Permohonan
            </button>
        </form>
    </div>
@endsection
