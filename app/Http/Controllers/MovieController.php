<?php
// app/Http/Controllers/MovieController.php
namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $query = Movie::with(['genre', 'actors']);

        if ($request->has('genre_id')) {
            $query->where('genre_id', $request->genre_id);
        }

        if ($request->has('actor_id')) {
            $query->whereHas('actors', function ($q) use ($request) {
                $q->where('actor_id', $request->actor_id);
            });
        }

        if ($request->has('sort')) {
            $query->orderBy('title', $request->sort);
        }

        return $query->get();
    }

    public function show($id)
    {
        return Movie::with(['genre', 'actors'])->findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'genre_id' => 'required|exists:genres,id',
            'actors' => 'required|array',
            'actors.*' => 'exists:actors,id',
        ]);

        $movie = Movie::create($request->only('title', 'genre_id'));
        $movie->actors()->sync($request->actors);

        return response()->json($movie, 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'genre_id' => 'required|exists:genres,id',
            'actors' => 'required|array',
            'actors.*' => 'exists:actors,id',
        ]);

        $movie = Movie::findOrFail($id);
        $movie->update($request->only('title', 'genre_id'));
        $movie->actors()->sync($request->actors);

        return response()->json($movie, 200);
    }

    public function destroy($id)
    {
        Movie::findOrFail($id)->delete();

        return response()->json(null, 204);
    }
}

