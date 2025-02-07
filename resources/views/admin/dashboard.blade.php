@extends('components.layout')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-semibold mb-4">Admin Dashboard</h1>

        <!-- Statistik -->
        <div class="grid grid-cols-3 gap-4 mb-6">
            <div class="bg-blue-500 text-white p-4 rounded-lg shadow-md">
                <h2 class="text-lg">Total Warga</h2>
                <p class="text-2xl font-bold counter" data-count="{{ $totalPengguna }}">0</p>
            </div>
            <div class="bg-green-500 text-white p-4 rounded-lg shadow-md">
                <h2 class="text-lg">Surat Diproses</h2>
                <p class="text-2xl font-bold counter" data-count="{{ $totalSuratDiproses }}">0</p>
            </div>
            <div class="bg-red-500 text-white p-4 rounded-lg shadow-md">
                <h2 class="text-lg">Surat Selesai</h2>
                <p class="text-2xl font-bold counter" data-count="{{ $totalSuratSelesai }}">0</p>
            </div>
        </div>

        <!-- Progress Bar -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-lg font-semibold mb-4">Progres Surat</h2>

            <p class="text-sm font-medium mb-2">Surat Diproses</p>
            <div class="w-full bg-gray-200 rounded-full h-5 mb-4">
                <div class="bg-green-500 h-5 rounded-full" id="progressDiproses" style="width: 0;"></div>
            </div>

            <p class="text-sm font-medium mb-2">Surat Selesai</p>
            <div class="w-full bg-gray-200 rounded-full h-5">
                <div class="bg-red-500 h-5 rounded-full" id="progressSelesai" style="width: 0;"></div>
            </div>
        </div>
    </div>

    <script>
        // Counter-Up Animation
        document.querySelectorAll('.counter').forEach(counter => {
            let target = +counter.getAttribute('data-count');
            let count = 0;
            let step = target / 50; // Animasi dalam 50 langkah

            let updateCount = () => {
                count += step;
                if (count < target) {
                    counter.textContent = Math.ceil(count);
                    requestAnimationFrame(updateCount);
                } else {
                    counter.textContent = target;
                }
            };

            updateCount();
        });

        // Progress Bar Animation
        let totalSurat = {{ $totalSuratDiproses + $totalSuratSelesai }};
        let percentDiproses = ({{ $totalSuratDiproses }} / totalSurat) * 100;
        let percentSelesai = ({{ $totalSuratSelesai }} / totalSurat) * 100;

        document.getElementById('progressDiproses').style.width = percentDiproses + "%";
        document.getElementById('progressSelesai').style.width = percentSelesai + "%";
    </script>
@endsection
