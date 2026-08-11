<?php

namespace App\Http\Controllers\SchoolClass;

use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    public function __invoke($id)
    {
        $title = 'Sistem Sekolah - Detail Kelas';

        $classes = session('classes', []);

        $class = collect($classes)->firstWhere('id', (int) $id);

        if (!$class) {
            abort(404);
        }

        return view('classes.show', [
            'title' => $title,
            'class' => $class,
        ]);
    }
}