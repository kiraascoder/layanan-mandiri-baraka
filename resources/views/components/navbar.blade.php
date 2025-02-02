<header class="bg-[#1B1A17] sticky top-0 z-50">
    <nav class="flex justify-between items-center w-[92%] mx-auto font-scope-one">
        <!-- Logo -->
        <div class="w-28 p-4">
            <a href="/">
                <img src="{{ asset('img/logo/logo.png') }}" alt="Website Logo" class="w-32">
            </a>
        </div>

        @if (Auth::check() && Auth::user()->is_admin)
            <!-- Navbar untuk Admin -->
            <div
                class="nav-links duration-500 md:static absolute bg-[#1B1A17] md:min-h-fit min-h-[60vh] left-0 top-[-100%] md:w-auto w-full flex items-center px-5">
                <ul
                    class="flex md:flex-row flex-col md:items-center md:gap-[4vw] gap-8 font-scope-one mt-3 text-[#F0E3CA]">
                    <li>
                        <a class="hover:text-gray-500 no-underline font-bold text-xl text-[#F0E3CA]"
                            href={{ route('admin.dashboard') }}>Dashboard</a>
                    </li>
                    <li>
                        <a class="hover:text-gray-500 no-underline font-bold text-xl text-[#F0E3CA]"
                            href="{{ route('admin.daftar-penduduk') }}">Daftar Penduduk</a>
                    </li>
                    <li>
                        <a class="hover:text-gray-500 no-underline font-bold text-xl text-[#F0E3CA]"
                            href="{{ route('admin.management-surat') }}">Management Surat</a>
                    </li>
                    <li>
                        <a class="hover:text-gray-500 no-underline font-bold text-xl text-[#F0E3CA]"
                            href="{{ route('admin.masukan') }}">Masukan</a>
                    </li>
                </ul>
            </div>
        @elseif (Auth::check())
            <div
                class="nav-links duration-500 md:static absolute bg-[#1B1A17] md:min-h-fit min-h-[60vh] left-0 top-[-100%] md:w-auto w-full flex items-center px-5">
                <ul
                    class="flex md:flex-row flex-col md:items-center md:gap-[4vw] gap-8 font-scope-one mt-3 text-[#F0E3CA]">
                    <li>
                        <a class="hover:text-gray-500 no-underline font-bold text-xl text-[#F0E3CA]"
                            href={{ route('citizen.profil') }}>Profil</a>
                    </li>
                    <li>
                        <a class="hover:text-gray-500 no-underline font-bold text-xl text-[#F0E3CA]"
                            href="{{ route('citizen.layanan-surat') }}">Layanan Surat</a>
                    </li>
                    <li>
                        <a class="hover:text-gray-500 no-underline font-bold text-xl text-[#F0E3CA]"
                            href="{{ route('citizen.informasi-tani') }}">Informasi Tani</a>
                    </li>
                    <li>
                        <a class="hover:text-gray-500 no-underline font-bold text-xl text-[#F0E3CA]"
                            href="{{ route('citizen.beri-saran') }}">Beri Saran</a>
                    </li>
                </ul>
            </div>
        @endif

        <!-- Action Buttons -->
        <div class="flex items-center gap-6">
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit"
                    class="bg-[#FF8303] text-[#1B1A17] font-bold px-5 py-2 rounded-full hover:bg-white ease-out duration-300">
                    Log Out
                </button>
            </form>
            <!-- Burger Bar Icon -->
            <button class="text-3xl cursor-pointer md:hidden w-6 h-6 sm:w-8 sm:h-8 lg:w-10 lg:h-10"
                aria-label="Toggle Navigation Menu" aria-expanded="false" id="menu-toggle">

            </button>
        </div>
    </nav>

    <!-- JavaScript -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const navLinks = document.querySelector('.nav-links');
            const toggleButton = document.getElementById('menu-toggle');

            toggleButton.addEventListener('click', () => {
                const expanded = toggleButton.getAttribute('aria-expanded') === 'true' || false;
                toggleButton.setAttribute('aria-expanded', !expanded);
                navLinks.classList.toggle('top-[9%]');
            });
        });
        document.getElementById('surat_type').addEventListener('change', function() {
            let selectedValue = this.value;

            // Sembunyikan semua form
            document.getElementById('form_izin_usaha').style.display = 'none';
            document.getElementById('form_kelahiran').style.display = 'none';
            document.getElementById('form_kematian').style.display = 'none';
            document.getElementById('form_pindah_domisili').style.display = 'none';
            document.getElementById('form_jaminan_kesehatan').style.display = 'none';

            // Hapus atribut required dari semua input
            document.querySelectorAll('input[required], select[required]').forEach(function(input) {
                input.removeAttribute('required');
            });

            // Tampilkan form yang sesuai dan tambahkan required ke input yang relevan
            if (selectedValue === 'izin_usaha') {
                document.getElementById('form_izin_usaha').style.display = 'block';
                document.querySelectorAll('#form_izin_usaha input').forEach(function(input) {
                    input.setAttribute('required', true);
                });
            } else if (selectedValue === 'kelahiran') {
                document.getElementById('form_kelahiran').style.display = 'block';
                document.querySelectorAll('#form_kelahiran input').forEach(function(input) {
                    input.setAttribute('required', true);
                });
            } else if (selectedValue === 'kematian') {
                document.getElementById('form_kematian').style.display = 'block';
                document.querySelectorAll('#form_kematian input').forEach(function(input) {
                    input.setAttribute('required', true);
                });
            } else if (selectedValue === 'pindah_domisili') {
                document.getElementById('form_pindah_domisili').style.display = 'block';
                document.querySelectorAll('#form_pindah_domisili input').forEach(function(input) {
                    input.setAttribute('required', true);
                });
            } else if (selectedValue === 'jaminan_kesehatan') {
                document.getElementById('form_jaminan_kesehatan').style.display = 'block';
                document.querySelectorAll('#form_jaminan_kesehatan input').forEach(function(input) {
                    input.setAttribute('required', true);
                });
            }
        });
    </script>
</header>
