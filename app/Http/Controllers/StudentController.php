<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller

{
    public function index()
    {
        $title = 'Sistem Sekolah - Daftar Siswa';
    
        $student = [
            [
                'id' => 1,
                'nis' => '22100001',
                'name' => 'Andi Lau',
                'class' => 'XII TKJ 3',
                'major' => 'TKJ'
            ],
            [
                'id' => 2,
                'nis' => '22100002',
                'name' => 'Budi Santoso',
                'class' => 'XII AKL 1',
                'major' => 'AKL'
                
            ]
        ];

        return view('students.index', [
            'title' => $title,
            'students' => $student
        ]);
    }

    public function create()
    { $title = 'Catat Siswa Baru - Sistem Sekolah';
        return view('students.create', [
            'title' => $title
        ]);
    }

    public function store()
    {
       return view('students.store');
    }

    public function show($id)
    {
        $title = 'Lembar siswa - Sistem Sekolah';
        return view('students.show', [
            'title' => $title
        ]);
    }

    public function edit($id)
    {

        $title = 'Ubah data siswa - sistem sekolah';
        return view('students.edit', [
            'title' => $title
        ]);
    }

    public function update($id)
    {
        return view('students.update');
    }

    public function destroy($id)
    {
        return view('students.destroy');
    }
}