<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    private function getTeachers()
    {
        if (!session()->has('teachers')) {
            session([
                'teachers' => [
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
                        'nip' => '198602022024',
                        'name' => 'Siti Aminah',
                        'gender' => 'Perempuan',
                        'subject' => 'Bahasa Indonesia',
                        'phone' => '081234560002',
                        'status' => 'Aktif',
                    ],
                ],
            ]);
        }

        return session('teachers', []);
    }

    public function index()
    {
        $title = 'Sistem Sekolah - Daftar Guru';

        return view('teachers.index', [
            'title' => $title,
            'teachers' => $this->getTeachers(),
        ]);
    }

    public function create()
    {
        $title = 'Sistem Sekolah - Tambah Guru';

        return view('teachers.create', [
            'title' => $title,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'subject' => 'required',
            'phone' => 'required',
            'status' => 'required',
        ]);

        $teachers = $this->getTeachers();

        $newId = count($teachers) > 0
            ? max(array_column($teachers, 'id')) + 1
            : 1;

        $teachers[] = [
            'id' => $newId,
            'nip' => $request->nip,
            'name' => $request->name,
            'gender' => $request->gender,
            'subject' => $request->subject,
            'phone' => $request->phone,
            'status' => $request->status,
        ];

        session(['teachers' => $teachers]);

        return redirect()->route('teachers.index');
    }

    public function show($id)
    {
        $title = 'Sistem Sekolah - Detail Guru';

        $teacher = collect($this->getTeachers())
            ->firstWhere('id', (int) $id);

        abort_if(!$teacher, 404);

        return view('teachers.show', [
            'title' => $title,
            'teacher' => $teacher,
        ]);
    }

    public function edit($id)
    {
        $title = 'Sistem Sekolah - Edit Guru';

        $teacher = collect($this->getTeachers())
            ->firstWhere('id', (int) $id);

        abort_if(!$teacher, 404);

        return view('teachers.edit', [
            'title' => $title,
            'teacher' => $teacher,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nip' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'subject' => 'required',
            'phone' => 'required',
            'status' => 'required',
        ]);

        $teachers = $this->getTeachers();

        foreach ($teachers as &$teacher) {
            if ($teacher['id'] == $id) {
                $teacher['nip'] = $request->nip;
                $teacher['name'] = $request->name;
                $teacher['gender'] = $request->gender;
                $teacher['subject'] = $request->subject;
                $teacher['phone'] = $request->phone;
                $teacher['status'] = $request->status;
            }
        }

        session(['teachers' => $teachers]);

        return redirect()->route('teachers.index');
    }

    public function destroy($id)
    {
        $teachers = $this->getTeachers();

        $teachers = array_filter($teachers, function ($teacher) use ($id) {
            return $teacher['id'] != $id;
        });

        session(['teachers' => array_values($teachers)]);

        return redirect()->route('teachers.index');
    }
}