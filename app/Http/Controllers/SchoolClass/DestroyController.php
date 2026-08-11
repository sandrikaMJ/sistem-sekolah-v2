<?php

namespace App\Http\Controllers\SchoolClass;

use App\Http\Controllers\Controller;

class DestroyController extends Controller
{
    public function __invoke($id)
    {
        $classes = session('classes', []);

        $classes = array_values(
            array_filter($classes, function ($class) use ($id) {
                return $class['id'] != $id;
            })
        );

        session()->put('classes', $classes);

        return redirect()
            ->route('classes.index')
            ->with('success', 'Data kelas berhasil dihapus.');
    }
}