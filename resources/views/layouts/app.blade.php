<!doctype html>
<html class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Meta Deskripsi (maksimal 160 karakter) -->
    <meta name="description" content="Portfolio Pribadi Saya.">

    <!-- Kata Kunci SEO (Tidak terlalu penting untuk Google, tapi bisa untuk Bing/Yandex) -->
    <meta name="keywords" content="jonathan, portfolio, personal, website, blog, laravel, php, javascript, html, css, natannael, zefanya, jonathan nathannael zefanya, nathannael, portfolio">

    <!-- Nama Pemilik atau Penulis -->
    <meta name="author" content="Jonathan Natannnael Zefanya">

    <!-- Canonical URL (untuk menghindari duplikat konten) -->
    <link rel="canonical" href="https://xead.my.id/">

    <!-- Open Graph untuk Sosial Media (Facebook, WhatsApp, LinkedIn) -->
    <meta property="og:title" content="Portfolio - Jonathan Natannael Zefanya">
    <meta property="og:description" content="Halo, saya Jonathan Natannael Zefanya. Saya seorang Web Developer yang suka menulis artikel tentang teknologi.">
    <meta property="og:image" content="https://icons.iconarchive.com/icons/vitorjapah/anime-dvd-cases/256/azu-manga-icon.png">
    <meta property="og:url" content="https://xead.my.id/">
    <meta property="og:type" content="website">

    <!-- Meta Robots (Mengizinkan Google untuk mengindeks halaman ini) -->
    <meta name="robots" content="index, follow">

    {{-- fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <title>{{ $title }}</title>
    <script src="\assets\ckeditor5\ckeditor.js"></script>
    <script src="\assets\jquery\jquery.js"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class=" font-inter dark dark:bg-gray-800">



    @include('layouts.navbar')

    @if (session()->has('success'))
        <div class="flex mt-14 items-center p-4 mb-4 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400 dark:border-blue-800"
            role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">Success! </span> {{ session('success') }}
            </div>
        </div>
    @endif

    <main>


        {{ $slot }}

    </main>



    <footer class="border border-t">
        @include('layouts.footer')
    </footer>

    {{-- ckeditor5 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>
