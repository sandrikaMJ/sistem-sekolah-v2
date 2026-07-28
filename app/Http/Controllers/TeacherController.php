<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        return "Showing teacher list";
    }

    public function create()
    {
        return "Showing create teacher page";
    }

    public function store()
    {
        return "Storing new teacher";
    }

    public function show($id)
    {
        return "Showing teacher with ID: $id";
    }

    public function edit($id)
    {
        return "Showing edit teacher page with ID: $id";
    }

    public function update($id)
    {
        return "Updating teacher with ID: $id";
    }

    public function destroy($id)
    {
        return "Deleting teacher with ID: $id";
    }
}