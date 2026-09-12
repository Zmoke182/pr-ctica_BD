<?php
namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    // Listar todos los libros con su autor
    public function index()
    {
        return response()->json(Libro::with('autor')->get(), 200);
    }

    // Crear un nuevo libro
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'stock' => 'required|integer',
            'autor_id' => 'required|exists:autores,id'
        ]);

        $libro = Libro::create($validated);
        return response()->json([
            'message' => 'Libro creado con éxito',
            'data' => $libro
        ], 201);
    }

    // Mostrar un libro específico
    public function show($id)
    {
        $libro = Libro::with('autor')->find($id);
        if (!$libro) {
            return response()->json(['message' => 'Libro no encontrado'], 404);
        }
        return response()->json($libro, 200);
    }

    // Actualizar un libro
    public function update(Request $request, $id)
    {
        $libro = Libro::find($id);
        if (!$libro) {
            return response()->json(['message' => 'Libro no encontrado'], 404);
        }

        $libro->update($request->all());
        return response()->json([
            'message' => 'Libro actualizado con éxito',
            'data' => $libro
        ], 200);
    }

    // Eliminar un libro
    public function destroy($id)
    {
        $libro = Libro::find($id);
        if (!$libro) {
            return response()->json(['message' => 'Libro no encontrado'], 404);
        }

        $libro->delete();
        return response()->json(['message' => 'Libro eliminado con éxito'], 200);
    }
}