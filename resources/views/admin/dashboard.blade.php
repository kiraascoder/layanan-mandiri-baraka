@extends('components.layout')

@section('title', 'Dashboard Admin')

@section('content')
    <p>Admin Dashboard</p>
    </div>

    <script>
        const navbarToggler = document.getElementById('navbar-toggler');
        const navbarMenu = document.getElementById('navbar-menu');

        navbarToggler.addEventListener('click', () => {
            navbarMenu.classList.toggle('hidden');
        });
    </script>
@endsection
