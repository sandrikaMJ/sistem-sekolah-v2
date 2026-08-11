<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MajorController extends Controller
{
    public function index()
{
    $title = 'Sistem Sekolah - Daftar Jurusan';

    $majors = session('majors', [
        [
            'id' => 1,
            'code' => 'AKL',
            'name' => 'Akuntansi dan Keuangan Lembaga',
            'description' => 'Program keahlian akuntansi dan keuangan.',
        ],
        [
            'id' => 2,
            'code' => 'TKJ',
            'name' => 'Teknik Komputer dan Jaringan',
            'description' => 'Program keahlian komputer dan jaringan.',
        ],
        [
            'id' => 3,
            'code' => 'BD',
            'name' => 'Bisnis Digital',
            'description' => 'Program keahlian bisnis dan pemasaran digital.',
        ],
    ]);

    // Memastikan data lama yang tidak punya description tetap aman
    foreach ($majors as &$major) {
        $major['description'] = $major['description'] ?? '';
    }

    session()->put('majors', $majors);

    return view('majors.index', [
        'title' => $title,
        'majors' => $majors,
    ]);
}

    public function create()
    {
        $title = 'Sistem Sekolah - Tambah Jurusan';

        return view('majors.create', [
            'title' => $title,
        ]);
    }

    public function store(Request $request)
    {
        $majors = session('majors', []);

        $majors[] = [
            'id' => count($majors) + 1,
            'code' => $request->code,
            'name' => $request->name,
            'description' => $request->description,
        ];

        session()->put('majors', $majors);

        return redirect()->route('majors.index');
    }

    public function show($id)
    {
        $majors = session('majors', []);

        $major = null;

        foreach ($majors as $item) {
            if ($item['id'] == $id) {
                $major = $item;
                break;
            }
        }

        if (!$major) {
            abort(404);
        }

        $title = 'Sistem Sekolah - Detail Jurusan';

        return view('majors.show', [
            'title' => $title,
            'major' => $major,
        ]);
    }

    public function edit($id)
    {
        $majors = session('majors', []);

        $major = null;

        foreach ($majors as $item) {
            if ($item['id'] == $id) {
                $major = $item;
                break;
            }
        }

        if (!$major) {
            abort(404);
        }

        $title = 'Sistem Sekolah - Edit Jurusan';

        return view('majors.edit', [
            'title' => $title,
            'major' => $major,
        ]);
    }

    public function update(Request $request, $id)
    {
        $majors = session('majors', []);

        foreach ($majors as &$major) {
            if ($major['id'] == $id) {
                $major['code'] = $request->code;
                $major['name'] = $request->name;
                $major['description'] = $request->description;
            }
        }

        session()->put('majors', $majors);

        return redirect()->route('majors.index');
    }

    public function destroy($id)
    {
        $majors = session('majors', []);

        $majors = array_values(array_filter($majors, function ($major) use ($id) {
            return $major['id'] != $id;
        }));

        session()->put('majors', $majors);

        return redirect()->route('majors.index');
    }
}