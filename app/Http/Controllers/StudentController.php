<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $title = 'Sistem Sekolah - Daftar Siswa';

        $students = [
            [
                'id' => 1,
                'nis' => '1001',
                'name' => 'Andi',
                'class' => 'XII TKJ 1',
                'major' => 'TKJ',
                'gender' => 'Laki-laki',
            ],
            [
                'id' => 2,
                'nis' => '1002',
                'name' => 'Budi',
                'class' => 'XII TKJ 2',
                'major' => 'TKJ',
                'gender' => 'Laki-laki',
            ],
            [
                'id' => 3,
                'nis' => '1003',
                'name' => 'Nina',
                'class' => 'XII TKJ 3',
                'major' => 'TKJ',
                'gender' => 'Perempuan',
            ],
        ];

        $students = array_merge($students, session('students', []));

        return view('students.index', [
            'title' => $title,
            'students' => $students
        ]);
    }

    public function create()
    {
        $title = 'Sistem Sekolah - Tambah Siswa';

        return view('students.create', [
            'title' => $title
        ]);
    }

    public function store(Request $request)
    {
        $students = session('students', []);

        $students[] = [
            'id' => count($students) + 4,
            'nis' => $request->nis,
            'name' => $request->name,
            'class' => $request->class,
            'major' => $request->major,
            'gender' => $request->gender,
        ];

        session(['students' => $students]);

        return redirect()->route('students.index');
    }

    public function show($id)
    {
        $title = 'Sistem Sekolah - Detail Siswa';

        $students = [
            [
                'id' => 1,
                'nis' => '1001',
                'name' => 'Andi',
                'class' => 'XII TKJ 1',
                'major' => 'TKJ',
                'gender' => 'Laki-laki',
            ],
            [
                'id' => 2,
                'nis' => '1002',
                'name' => 'Budi',
                'class' => 'XII TKJ 2',
                'major' => 'TKJ',
                'gender' => 'Laki-laki',
            ],
            [
                'id' => 3,
                'nis' => '1003',
                'name' => 'Nina',
                'class' => 'XII TKJ 3',
                'major' => 'TKJ',
                'gender' => 'Perempuan',
            ],
        ];

        $students = array_merge($students, session('students', []));

        $student = collect($students)->firstWhere('id', (int) $id);

        return view('students.show', [
            'title' => $title,
            'student' => $student,
        ]);
    }

    public function edit($id)
    {
        $title = 'Sistem Sekolah - Edit Siswa';

        $students = [
            [
                'id' => 1,
                'nis' => '1001',
                'name' => 'Andi',
                'class' => 'XII TKJ 1',
                'major' => 'TKJ',
                'gender' => 'Laki-laki',
            ],
            [
                'id' => 2,
                'nis' => '1002',
                'name' => 'Budi',
                'class' => 'XII TKJ 2',
                'major' => 'TKJ',
                'gender' => 'Laki-laki',
            ],
            [
                'id' => 3,
                'nis' => '1003',
                'name' => 'Nina',
                'class' => 'XII TKJ 3',
                'major' => 'TKJ',
                'gender' => 'Perempuan',
            ],
        ];

        $students = array_merge($students, session('students', []));

        $student = collect($students)->firstWhere('id', (int) $id);

        return view('students.edit', [
            'title' => $title,
            'student' => $student,
        ]);
    }

    public function update(Request $request, $id)
    {
        $students = session('students', []);

        foreach ($students as &$student) {
            if ($student['id'] == $id) {
                $student['nis'] = $request->nis;
                $student['name'] = $request->name;
                $student['gender'] = $request->gender;
                $student['class'] = $request->class;
                $student['major'] = $request->major;
            }
        }

        session(['students' => $students]);

        return redirect()->route('students.index');
    }

    public function destroy($id)
    {
        $students = session('students', []);

        $students = array_filter($students, function ($student) use ($id) {
            return $student['id'] != $id;
        });

        session(['students' => array_values($students)]);

        return redirect()->route('students.index');
    }
}