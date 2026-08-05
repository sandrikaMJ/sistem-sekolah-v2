@props(['type' => 'SUCCESS'])
 
@if ($type === 'ERROR')
    <div class="border border-red-500 bg-red-100 rounded-lg p-4">
        <h1 class="text-lg text-red-500 font-bold">Error</h1>
 
        <p class="text-red-500">{{ $slot }}</p>
    </div>
@elseif ($type === 'WARNING')
    <div class="border border-yellow-500 bg-yellow-100 rounded-lg p-4">
        <h1 class="text-lg text-yellow-500 font-bold">Warning</h1>
 
        <p class="text-yellow-500">{{ $slot }}</p>
    </div>
@elseif($type === 'SUCCESS')
    <div class="border border-green-500 bg-green-100 rounded-lg p-4">
        <h1 class="text-lg text-green-500 font-bold">Warning</h1>
 
        <p class="text-green-500">{{ $slot }}</p>
    </div>
@else
    <div class="border border-blue-500 bg-blue-100 rounded-lg p-4">
        <h1 class="text-lg text-blue-500 font-bold">Info</h1>
 
        <p class="text-blue-500">{{ $slot }}</p>
    </div>
@endif
 
<!DOCTYPE html>
<html lang="id">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @yield('title')
    </title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
 
<body class="flex min-h-screen flex-col bg-[#F7F6F2] text-slate-700">
 
    {{-- Header Start--}}
    @include('layouts.partials.header')
    {{-- Header End --}}
 
    {{-- Content Start --}}
    <main class="mx-auto w-full max-w-5xl flex-1 px-6 py-10">
        @yield('content')
    </main>
    {{-- Content End --}}
 
    {{-- Footer Start --}}
    @include('layouts.partials.footer')
    {{-- Footer End --}}
 
</body>
 
</html>
 
 