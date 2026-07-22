<?php

use App\htto\Controller\studentController;
use Illuminate\Support\Facades\Route;

//management siswa//

Route::name('students.')->prefix('students')->group(function() {

Route::get('/', function () {
    return view('welcome');
});

Route::get('/students', function () {
   route::get('/') [StudentController::class, 'index']);-> name('index');

Route::get('/students/{id}', function($id) {
    return "Menampilkan detail siswa dengan ID: ($id)";
})->name('show');                                                                              




});

ini di student controller

public function
return "Ini adalah halaman daftar siswa"