<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MajorController extends Controller
{
    public function index()
    {
        return "Showing major list";
    }

    public function create()
    {
        return "Showing create major page";
    }

    public function store(Request $request)
    {
        return "Storing new major";
    }

    public function show(string $id)
    {
        return "Showing major with ID: $id";
    }

    public function edit(string $id)
    {
        return "Showing edit major page with ID: $id";
    }

    public function update(Request $request, string $id)
    {
        return "Updating major with ID: $id";
    }

    public function destroy(string $id)
    {
        return "Deleting major with ID: $id";
    }
}