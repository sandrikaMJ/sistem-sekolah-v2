<?php

namespace App\Http\Controllers\SchoolClass;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'grade' => 'required|string|max:10',
            'major_id' => 'required',
            'teacher_id' => 'required',
        ]);

        $majors = [
            1 => [
                'code' => 'AKL',
                'name' => 'Akuntansi dan Keuangan Lembaga',
            ],
            2 => [
                'code' => 'TKJ',
                'name' => 'Teknik Komputer dan Jaringan',
            ],
            3 => [
                'code' => 'BD',
                'name' => 'Bisnis Digital',
            ],
        ];

        $teachers = [
            1 => 'Budi Santoso',
            2 => 'Siti Aminah',
        ];

        $classes = session('classes', []);

        $newId = count($classes) > 0
            ? max(array_column($classes, 'id')) + 1
            : 1;

        $classes[] = [
            'id' => $newId,
            'name' => $validated['name'],
            'grade' => $validated['grade'],
            'major_id' => $validated['major_id'],
            'major' => $majors[$validated['major_id']]['code'] ?? '-',
            'teacher_id' => $validated['teacher_id'],
            'homeroom_teacher' => $teachers[$validated['teacher_id']] ?? '-',
        ];

        session()->put('classes', $classes);

        return redirect()
            ->route('classes.index')
            ->with('success', 'Data kelas berhasil ditambahkan.');
    }
}