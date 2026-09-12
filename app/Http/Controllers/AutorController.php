<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    public function index()
    {
        return response()->json(Autor::with('libros')->get(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'nacionalidad' => 'nullable|string|max:100'
        ]);

        $autor = Autor::create($validated);
        return response()->json(['message' => 'Autor creado con éxito', 'data' => $autor], 201);
    }

    public function show($id)
    {
        $autor = Autor::with('libros')->find($id);
        if (!$autor) {
            return response()->json(['message' => 'Autor no encontrado'], 404);
        }
        return response()->json($autor, 200);
    }

    public function update(Request $request, $id)
    {
        $autor = Autor::find($id);
        if (!$autor) {
            return response()->json(['message' => 'Autor no encontrado'], 404);
        }

        $autor->update($request->all());
        return response()->json(['message' => 'Autor actualizado', 'data' => $autor], 200);
    }

    public function destroy($id)
    {
        $autor = Autor::find($id);
        if (!$autor) {
            return response()->json(['message' => 'Autor no encontrado'], 404);
        }

        $autor->delete();
        return response()->json(['message' => 'Autor eliminado'], 200);
    }
}