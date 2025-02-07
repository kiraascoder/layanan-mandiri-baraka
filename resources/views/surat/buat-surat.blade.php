@extends('components.layout')

@section('title', 'Buat Surat')

@section('content')
    <div class="container mx-auto mt-8 p-6 bg-[#123524] rounded-lg shadow-lg max-w-4xl">
        <h2 class="text-2xl font-semibold mb-6 text-[#EFE3C2]">Buat Surat</h2>

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

        <form id="suratForm" action="#" method="GET" class="space-y-6">
            @csrf

            <!-- Jenis Surat -->
            <div class="relative z-0 w-full mb-6 group">
                <select name="surat_type" id="surat_type"
                    class="block py-2.5 px-0 w-full text-sm  bg-transparent border-0 border-b-2 border-gray-300 appearance-none text-[#EFE3C2] dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    required>
                    <option value="" selected>-- Jenis Surat --</option>
                    <option value="izin_usaha" class="text-black">Surat Keterangan Izin Usaha</option>
                    <option value="kelahiran" class="text-black">Surat Keterangan Kelahiran</option>
                    <option value="kematian" class="text-black">Surat Keterangan Kematian</option>
                    <option value="pindah_domisili" class="text-black">Surat Keterangan Pindah Domisili</option>
                    <option value="jaminan_kesehatan" class="text-black">Surat Pengantar Jaminan Kesehatan</option>
                </select>
                <label for="surat_type"
                    class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 left-4 origin-[0] peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Pilih Jenis Surat
                </label>
            </div>

            <!-- Tombol Lanjut -->
            <button type="submit"
                class="w-full py-2 px-4 bg-[#3E7B27] text-white font-semibold rounded-lg focus:outline-none focus:ring-2 dark:hover:bg-gray-600">
                Lanjut
            </button>
        </form>
    </div>

    <script>
        document.getElementById('suratForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Mencegah form dikirim secara default

            // Ambil nilai jenis surat yang dipilih
            var suratType = document.getElementById('surat_type').value;

            // Definisikan route untuk setiap jenis surat
            var routes = {
                'izin_usaha': "{{ route('citizen.izin-usaha') }}",
                'kelahiran': "{{ route('citizen.kelahiran') }}",
                'kematian': "{{ route('citizen.kematian') }}",
                'pindah_domisili': "{{ route('citizen.pindah-dom') }}",
                'jaminan_kesehatan': "{{ route('citizen.jaminan-kesehatan') }}"
            };

            // Redirect ke route yang sesuai
            if (routes[suratType]) {
                window.location.href = routes[suratType];
            } else {
                alert('Pilih jenis surat yang valid.');
            }
        });
    </script>
@endsection
