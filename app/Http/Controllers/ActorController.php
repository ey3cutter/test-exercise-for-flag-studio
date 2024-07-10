<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    public function index()
    {
        return Actor::all();
    }

    public function show($id)
    {
        return Actor::findOrFail($id);
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        $actor = Actor::create($request->only('name'));

        return response()->json($actor, 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate(['name' => 'required']);
        $actor = Actor::findOrFail($id);
        $actor->update($request->only('name'));

        return response()->json($actor, 200);
    }

    public function destroy($id)
    {
        Actor::findOrFail($id)->delete();

        return response()->json(null, 204);
    }
}
