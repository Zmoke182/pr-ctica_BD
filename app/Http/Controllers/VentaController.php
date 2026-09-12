<?php
namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function index()
    {
        return response()->json(Venta::with('libro')->get(), 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'libro_id' => 'required|exists:libros,id',
            'correo_cliente' => 'required|email',
            'cantidad' => 'required|integer|min:1',
            'precio_total' => 'required|numeric'
        ]);

        $venta = Venta::create($validated);
        return response()->json(['message' => 'Venta registrada con éxito', 'data' => $venta], 201);
    }

    public function show($id)
    {
        $venta = Venta::with('libro')->find($id);
        if (!$venta) {
            return response()->json(['message' => 'Venta no encontrada'], 404);
        }
        return response()->json($venta, 200);
    }

    public function destroy($id)
    {
        $venta = Venta::find($id);
        if (!$venta) {
            return response()->json(['message' => 'Venta no encontrada'], 404);
        }

        $venta->delete();
        return response()->json(['message' => 'Venta eliminada'], 200);
    }
}