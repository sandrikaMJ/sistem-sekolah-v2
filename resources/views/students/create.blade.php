@extends('layouts.app')

@section('title', $title)

@section('content')

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex min-h-screen flex-col bg-[#F7F6F2] text-slate-700">

    {{-- Header Start--}}
    <header class="bg-[#16213A] text-white">
        <div class="mx-auto flex max-w-5xl items-center justify-between px-6 py-5">
            <a href="" class="flex items-center gap-3">
                <span>
                    <span class="font-display block text-lg font-semibold leading-none">Sistem Sekolah</span>
                    <span class="text-[11px] uppercase tracking-[0.2em] text-white/50">Buku Induk Siswa</span>
                </span>
            </a>
            <nav class="hidden gap-8 text-sm md:flex">
                <a href="#" class="text-white/55 hover:text-white">Siswa</a>
                <a href="#" class="text-white/55 hover:text-white">Guru</a>
                <a href="#" class="text-white/55 hover:text-white">Kelas</a>
                <a href="#" class="text-white/55 hover:text-white">Jurusan</a>
            </nav>
        </div>
        <div class="h-0.5 bg-[#A16207]"></div>
    </header>
    {{-- Header End --}}

    {{-- Content Start --}}
    <main class="mx-auto w-full max-w-2xl flex-1 px-6 py-10">
        
    </main>
    {{-- Content End --}}

    {{-- Footer Start --}}
    <footer class="border-t border-[#E5E3DB]">
        <div class="mx-auto flex max-w-5xl items-center justify-between px-6 py-6 text-xs text-slate-400">
            <span>&copy; 2026 Sistem Sekolah</span>
            <span class="uppercase tracking-[0.15em]">Media Pembelajaran SMK</span>
        </div>
    </footer>
    {{-- Footer End --}}
</body>

</html>


@endsection

