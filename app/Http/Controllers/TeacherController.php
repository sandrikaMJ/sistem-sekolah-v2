<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = [
        [
            'id' => 1,
            'nip' => '198501012024',
            'name' => 'Budi Santoso',
            'gender' => 'Laki-Laki',
            'subject' => 'Akuntansi Dasar',
            'phone' => '081234560001',
            'status' => 'Aktif',
        ],
        [
            'id' => 2,
            'nip' => '198703152024',
            'name' => 'Siti Aminah',
            'gender' => 'Perempuan',
            'subject' => 'Jaringan Komputer',
            'phone' => '081234560002',
            'status' => 'Aktif',
        ]
];

        return view('teachers.index', [
            'title' => 'Sistem Sekolah - Daftar Guru',
            'teachers' => $teachers
        ]);
    }

    public function show($id)
    {
        $title = "Sistem Sekolah - Detail Guru";

        // Recreate teachers list (same structure as index) and find by id
        $teachers = [
            [
                'id' => 1,
                'nip' => '198501012024',
                'name' => 'Budi Santoso',
                'gender' => 'Laki-Laki',
                'subject' => 'Akuntansi Dasar',
                'phone' => '081234560001',
                'status' => 'Aktif',
            ],
            [
                'id' => 2,
                'nip' => '198703152024',
                'name' => 'Siti Aminah',
                'gender' => 'Perempuan',
                'subject' => 'Jaringan Komputer',
                'phone' => '081234560002',
                'status' => 'Aktif',
            ]
        ];

        $found = null;
        foreach ($teachers as $t) {
            if ($t['id'] == $id) {
                $found = $t;
                break;
            }
        }

        if (!$found) {
            abort(404, 'Guru tidak ditemukan');
        }

        // Normalize to object and normalized codes expected by the view
        $teacher = (object)[
            'nip' => $found['nip'],
            'name' => $found['name'],
            'gender' => ($found['gender'] === 'Laki-Laki' ? 'L' : ($found['gender'] === 'Perempuan' ? 'P' : $found['gender'])),
            'subject' => $found['subject'],
            'phone' => $found['phone'],
            'status' => ($found['status'] === 'Aktif' ? 'yes' : 'no'),
        ];

        return view('teachers.show', [
            'title' => $title,
            'teacher' => $teacher,
        ]);
    }

    public function create()
    {
        $title = "Sistem Sekolah - Tambah Guru";
        return view('teachers.create', [
            'title' => $title
        ]);
    }

    public function store(Request $request)
    {
        return "Menyimpan data guru baru";
    }

    public function edit($id)
    {
        $title = "Sistem Sekolah - Edit Guru";

        // Recreate teachers list and find by id
        $teachers = [
            [
                'id' => 1,
                'nip' => '198501012024',
                'name' => 'Budi Santoso',
                'gender' => 'Laki-Laki',
                'subject' => 'Akuntansi Dasar',
                'phone' => '081234560001',
                'status' => 'Aktif',
            ],
            [
                'id' => 2,
                'nip' => '198703152024',
                'name' => 'Siti Aminah',
                'gender' => 'Perempuan',
                'subject' => 'Jaringan Komputer',
                'phone' => '081234560002',
                'status' => 'Aktif',
            ]
        ];

        $found = null;
        foreach ($teachers as $t) {
            if ($t['id'] == $id) {
                $found = $t;
                break;
            }
        }

        if (!$found) {
            abort(404, 'Guru tidak ditemukan');
        }

        $teacher = (object)[
            'nip' => $found['nip'],
            'name' => $found['name'],
            'gender' => ($found['gender'] === 'Laki-Laki' ? 'L' : ($found['gender'] === 'Perempuan' ? 'P' : $found['gender'])),
            'subject' => $found['subject'],
            'phone' => $found['phone'],
            'status' => ($found['status'] === 'Aktif' ? 'yes' : 'no'),
        ];

        return view('teachers.edit', [
            'title' => $title,
            'teacher' => $teacher,
        ]);
    }

    public function update(Request $request, $id)
    {
        return "Memperbarui data guru dengan ID: {$id}";
    }

    public function destroy($id)
    {
        return "Menghapus data guru dengan ID: {$id}";
    }
}