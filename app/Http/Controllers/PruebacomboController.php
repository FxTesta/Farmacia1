<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Producto;
use App\Models\pruebacombo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PruebacomboController extends Controller
{
    public function index()
    {

        //$producto = Producto::all();

        return Inertia::render('prueba/index',[
            //'producto' => $producto,
        ]);
    }

    public function buscarProducto(Request $request)
    {
        $query = $request->input('query');
        
        // Realiza la lógica de búsqueda utilizando el valor de $query
        $producto = Producto::where('marca', 'LIKE', "%$query%")->orWhere('codigo', 'LIKE', "{$query}%")->get();

        return response()->json($producto);
    }

    public function store(Request $request)
    {
        /*
        $request->validate([
            //'categoria_id' => 'required',
            'marca' => 'string|required',
            'stock' => 'required',
            'cantidad' => 'required',
            'total' => 'required',
        ]);

        // para crear un campo con el nombre de la cateogría
        //$categorianombre = Categoria::where('id', $request->input('categoria_id'))->first();

        pruebacombo::create([
            'marca' => $request->marca,
            'stock' => $request->stock,
            'cantidad' => $request->cantidad,
            'total' => $request->total,
        ]);
        */

            // Itera a través de los datos y crea un nuevo registro para cada producto

        
        $data = $request->input('arrayProductos');
        
            foreach ($data as $producto) {
                pruebacombo::create([
                    'marca' => $producto['marca'],
                    'stock' => $producto['stock'],
                    'cantidad' => $producto['cantidad'],
                    'total' => $producto['total'],
                ]);
            }
        


        return redirect('/prueba');
        
    }

   


}
