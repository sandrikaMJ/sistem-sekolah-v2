<?php

namespace App\Http\Controllers\SchoolClass;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        $title = 'Sistem Sekolah - Daftar Kelas';

        if (!session()->has('classes')) {
            session()->put('classes', [
                [
                    'id' => 1,
                    'name' => 'XII AKL 1',
                    'grade' => 'XII',
                    'major' => 'AKL',
                    'major_id' => 1,
                    'homeroom_teacher' => 'Budi Santoso',
                    'teacher_id' => 1,
                ],
                [
                    'id' => 2,
                    'name' => 'XII TKJ 1',
                    'grade' => 'XII',
                    'major' => 'TKJ',
                    'major_id' => 2,
                    'homeroom_teacher' => 'Siti Aminah',
                    'teacher_id' => 2,
                ],
            ]);
        }

        $classes = session('classes', []);

        return view('classes.index', [
            'title' => $title,
            'classes' => $classes,
        ]);
    }
}