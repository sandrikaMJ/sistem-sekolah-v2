@if (type === 'ERROR' )

<div class="border border-red-500 bg-red-100 rounded-lg p-4"
    <h1 class="text-lg text-red-500 font-bold">Error</h1>
    <p class="text-red-500">Terdapat kesalahan ketika menambahkan data siswa baru ke dalam sistem </p>
</div>

@elseif($type === 'WARNING')

<div class="border border-yelllow-500 bg-yellow-100 rounded-lg p-4"
    <h1 class="text-lg text-yellow-500 font-bold">Warning</h1>
    <p class="text-yellow-500">Terdapat kesalahan ketika menambahkan data siswa baru ke dalam sistem </p>
</div>

@else

<div class="border border-blue-500 bg-blue-100 rounded-lg p-4"
    <h1 class="text-lg text-blue-500 font-bold">Info</h1>
    <p class="text-blue-500">Terdapat kesalahan ketika menambahkan data siswa baru ke dalam sistem </p>
</div>

@endif