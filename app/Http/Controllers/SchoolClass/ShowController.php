<?php

namespace App\Http\Controllers\SchoolClass;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $classId = $request->route('id');

        // Dummy data for classes
        $classes = [
            1 => [
                'id' => 1,
                'name' => 'XII AKL 1',
                'grade' => 'XII',
                'major_code' => 'AKL',
                'teacher_name' => 'Budi Santoso'
            ],
            2 => [
                'id' => 2,
                'name' => 'XII TKJ 1',
                'grade' => 'XII',
                'major_code' => 'TKJ',
                'teacher_name' => 'Siti Aminah'
            ]
        ];

        if (!isset($classes[$classId])) {
            abort(404);
        }

        $class = $classes[$classId];

        return view('SchoolClass.show', [
            'title' => "Sistem Sekolah - Lembar Kelas",
            'class' => $class
        ]);
    }
}
