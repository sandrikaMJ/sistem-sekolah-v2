<?php

namespace App\Http\Controllers\SchoolClass;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $classId = $request->route('id');

        // Dummy data for classes
        // Dummy majors (taken from MajorController structure)
        $majors = [
            1 => [
                'id' => 1,
                'code' => 'AKL',
                'name' => 'Akuntansi dan Keuangan Lembaga',
                'description' => 'Program keahlian yang membekali murid dengan kompetensi pencatatan dan pelaporan keuangan.',
            ],
            2 => [
                'id' => 2,
                'code' => 'TKJ',
                'name' => 'Teknik Komputer dan Jaringan',
                'description' => 'Program keahlian yang membekali murid dengan kompetensi instalasi, konfigurasi, dan pemeliharaan jaringan komputer.',
            ],
            3 => [
                'id' => 3,
                'code' => 'BD',
                'name' => 'Bisnis Digital',
                'description' => 'Program keahlian yang membekali murid dengan kompetensi pemasaran dan pengelolaan bisnis berbasis digital.',
            ],
        ];

        // Dummy teachers (taken from TeacherController structure)
        $teachers = [
            1 => [
                'id' => 1,
                'nip' => '198501012024',
                'name' => 'Budi Santoso',
                'gender' => 'Laki-Laki',
                'subject' => 'Akuntansi Dasar',
                'phone' => '081234560001',
                'status' => 'Aktif',
            ],
            2 => [
                'id' => 2,
                'nip' => '198703152024',
                'name' => 'Siti Aminah',
                'gender' => 'Perempuan',
                'subject' => 'Jaringan Komputer',
                'phone' => '081234560002',
                'status' => 'Aktif',
            ],
        ];

        // Dummy data for classes using $majors and $teachers
        $classes = [
            1 => [
                'id' => 1,
                'name' => 'XII ' . $majors[1]['code'] . ' 1',
                'grade' => 'XII',
                // keys expected by the view
                'major_code' => $majors[1]['code'],
                'teacher_id' => $teachers[1]['id'],
                'phone' => $teachers[1]['phone'],
                'status' => 'yes',
            ],
            2 => [
                'id' => 2,
                'name' => 'XII ' . $majors[2]['code'] . ' 1',
                'grade' => 'XII',
                'major_code' => $majors[2]['code'],
                'teacher_id' => $teachers[2]['id'],
                'phone' => $teachers[2]['phone'],
                'status' => 'yes',
            ],
        ];

        // Check if the class exists
        if (!isset($classes[$classId])) {
            abort(404, "Class not found");
        }

        $class = $classes[$classId];

        return view('SchoolClass.edit', [
            'title' => "Sistem Sekolah - Edit Kelas",
            'class' => $class,
            'majors' => $majors,
            'teachers' => $teachers,
        ]);
    }
}