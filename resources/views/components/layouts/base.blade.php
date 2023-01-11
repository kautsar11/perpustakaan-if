@props(['pageTitle'])

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $pageTitle }} | {{ config('app.name', 'Perpustakaan IF') }}</title>

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect" />
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
      rel="stylesheet"
    />

    {{-- alpine js --}}
    <script src="//unpkg.com/alpinejs" defer></script>
    
    <!-- Scripts -->
    @vite(['resources/js/app.js'])
</head>
<body class="d-flex flex-column min-vh-100">
  
    {{ $slot }}
    
</body>
</html>
