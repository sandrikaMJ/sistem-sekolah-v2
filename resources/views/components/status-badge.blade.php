@props(['status'])

@php
    $classes = match ($status) {
        'Aktif' => 'bg-green-100 text-green-700 border border-green-200',
        'Tidak Aktif' => 'bg-red-100 text-red-700 border border-red-200',
        default => 'bg-gray-100 text-gray-700 border border-gray-200',
    };
@endphp

<span class="inline-flex items-center px-3 py-1 text-xs font-medium {{ $classes }}">
    {{ $status }}
</span>