<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Exception;

class AutorController extends Controller
{
    public function index()
    {
        try {
            return response()->json(Autor::with('libros')->get(), 200);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error interno del servidor', 'error' => $e->getMessage()], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'nombre' => 'required|string|max:255',
                'nacionalidad' => 'nullable|string|max:100'
            ]);

            $autor = Autor::create($validated);
            return response()->json(['message' => 'Autor creado con éxito', 'data' => $autor], 201);

        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Solicitud mal formada o datos inválidos',
                'errors' => $e->errors()
            ], 400);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error interno del servidor',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $autor = Autor::with('libros')->find($id);
            if (!$autor) {
                return response()->json(['message' => 'Autor no encontrado'], 404);
            }
            return response()->json($autor, 200);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error interno del servidor', 'error' => $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $autor = Autor::find($id);
            if (!$autor) {
                return response()->json(['message' => 'Autor no encontrado'], 404);
            }

            $validated = $request->validate([
                'nombre' => 'required|string|max:255',
                'nacionalidad' => 'nullable|string|max:100'
            ]);

            $autor->update($validated);
            return response()->json(['message' => 'Autor actualizado', 'data' => $autor], 200);

        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Solicitud mal formada o datos inválidos',
                'errors' => $e->errors()
            ], 400);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Error interno del servidor',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $autor = Autor::find($id);
            if (!$autor) {
                return response()->json(['message' => 'Autor no encontrado'], 404);
            }

            $autor->delete();
            return response()->json(['message' => 'Autor eliminado'], 200);
        } catch (Exception $e) {
            return response()->json(['message' => 'Error interno del servidor', 'error' => $e->getMessage()], 500);
        }
    }
}