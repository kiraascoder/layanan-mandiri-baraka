<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Layanan Mandiri Kecamatan Baraka')</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-[#FBF6E9] min-h-screen flex flex-col">


    @include('components.navbar')


    <div class="container mx-auto">
        @yield('content')
    </div>


    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</body>

</html>
