<?php

namespace App\Http\Controllers\SchoolClass;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'grade' => 'required|string|max:10',
            'major_id' => 'required',
            'teacher_id' => 'required',
        ]);

        $majors = [
            1 => 'AKL',
            2 => 'TKJ',
            3 => 'BD',
        ];

        $teachers = [
            1 => 'Budi Santoso',
            2 => 'Siti Aminah',
        ];

        $classes = session('classes', []);

        foreach ($classes as &$class) {
            if ($class['id'] == $id) {
                $class['name'] = $validated['name'];
                $class['grade'] = $validated['grade'];
                $class['major_id'] = $validated['major_id'];
                $class['major'] = $majors[$validated['major_id']] ?? '-';
                $class['teacher_id'] = $validated['teacher_id'];
                $class['homeroom_teacher'] = $teachers[$validated['teacher_id']] ?? '-';
            }
        }

        session()->put('classes', $classes);

        return redirect()
            ->route('classes.index')
            ->with('success', 'Data kelas berhasil diperbarui.');
    }
}