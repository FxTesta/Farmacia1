<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Compra;
use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    public function index(Request $request)
    {
        $compra = Compra::all();
        $user = auth()->user();
        $proveedor = Proveedor::all();

        return Inertia::render('Compra/prueba',[
            'compra' => $compra,
            'user' => $user,
            'proveedor' => $proveedor,
        ]);
    }

    public function buscarProveedor(Request $request)
    {
        $query = $request->input('query');
        
        // Realiza la lógica de búsqueda utilizando el valor de $query
        $proveedores = Proveedor::where('empresa', 'LIKE', "%$query%")->get();

        return response()->json($proveedores);
    }

    public function buscarProducto(Request $request)
    {
        $query = $request->input('query');
        
        // Realiza la lógica de búsqueda utilizando el valor de $query
        $producto = Producto::where('marca', 'LIKE', "%$query%")->orWhere('codigo', 'LIKE', "{$query}%")->get();

        return response()->json($producto);
    }
}
