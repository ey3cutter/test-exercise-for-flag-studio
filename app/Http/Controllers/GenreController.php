<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        return Genre::all();
    }

    public function show($id)
    {
        return Genre::findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        $genre = Genre::create($request->only('name'));

        return response()->json($genre, 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate(['name' => 'required']);
        $genre = Genre::findOrFail($id);
        $genre->update($request->only('name'));

        return response()->json($genre, 200);
    }

    public function destroy($id)
    {
        Genre::findOrFail($id)->delete();

        return response()->json(null, 204);
    }
}
