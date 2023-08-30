<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;


class ProductoController extends Controller
{
    

    public function index(Request $request)
    {
        //$producto = Producto::all();


        /*$producto = Producto::query()
        ->when($request->search, function ($query, $search) {
            $query->where('marca', 'like', "%{$search}%");
        })
        ->
        //through sirve para traer campos en especifico de la base de datos, pero por alguna razón "through" no funciona, al parecer se cambio la sintaxis
        through(fn($producto) => [
            'marca' => $producto->marca,
        ])
        ;*/



        $producto = Producto::when($request->search, function($query, $search){
            $query->where('marca', 'LIKE', "%{$search}%" );
        })
        ->paginate(4);

        return Inertia::render('Producto/index',[
            'producto' => $producto,
        ]);
    }

    public function create()
    {    

        //añadir categoría para que cargue

        /*$categoria = Categoria::all();

        return Inertia::render('Producto/create',[
            'categoria' => $categoria,
            
        ]);*/


       return Inertia::render('Producto/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            //'categoria_id' => 'required',
            'categoria' => 'required',
            'descripcion' => 'required',
            'marca' => 'string|required',
            'venta' => 'required',
            'laboratorio' => 'string|nullable',
            'vencimiento' => 'nullable',
            'alerta' => 'nullable|before_or_equal:vencimiento',
            'codigo' => 'nullable',
            'precioventa' => 'required',
            'preciocompra' => 'nullable',
            'stock' => 'required',
            'stockmin' => 'nullable',
            'descuento' => 'nullable',
            'presentacion' => 'nullable',
            'estante' => 'nullable',
        ]);

        // para crear un campo con el nombre de la cateogría
        //$categorianombre = Categoria::where('id', $request->input('categoria_id'))->first();

        Producto::create([
            'categoria' => $request->categoria,
            'descripcion' => $request->descripcion,
            'marca' => $request->marca,
            'venta' => $request->venta,
            'laboratorio' => $request->laboratorio,
            'vencimiento' => $request->vencimiento,
            'alerta' => $request->alerta,
            'codigo' => $request->codigo,
            'precioventa' => $request->precioventa,
            'preciocompra' => $request->preciocompra,
            'stock' => $request->stock,
            'stockmin' => $request->stockmin,
            'descuento' => $request->descuento,
            'presentacion' => $request->presentacion,
            'estante' => $request->estante,
            //'categorianombre' => $categorianombre->name,
        ]);
        

        return redirect()->route('producto');
        
    }

    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->back()->with('toast', 'Producto Eliminado');
    }
    
    public function edit($producto_id)
    {
        $producto = Producto::find($producto_id);

        return Inertia::render('Producto/edit',[
            'producto' => $producto,
        ]);
    }

    public function update(Producto $producto)
    {
        request()->validate([
            'categoria' => ['required'],
            'descripcion' => ['required'],
            'marca' => ['required'],
            'venta' => ['required'],
            'laboratorio' => ['nullable'],
            'vencimiento' => ['nullable'],
            'alerta' => ['nullable'],
            'codigo' => ['nullable'],
            'precioventa' => ['required'],
            'preciocompra' => ['nullable'],
            'stock' => ['required'],
            'stockmin' => ['nullable'],
            'descuento' => ['nullable'],
            'presentacion' => ['nullable'],
            'estante' => ['nullable'],
            
            
        ]);

        $producto->update([
            
            'categoria' => request('categoria'),
            'descripcion' => request('descripcion'),
            'marca' => request('marca'),
            'venta' => request('venta'),
            'laboratorio' => request('laboratorio'),
            'vencimiento' => request('vencimiento'),
            'alerta' => request('alerta'),
            'codigo' => request('codigo'),
            'precioventa' => request('precioventa'),
            'preciocompra' => request('preciocompra'),
            'stock' => request('stock'),
            'stockmin' => request('stockmin'),
            'descuento' => request('descuento'),
            'presentacion' => request('presentacion'),
            'estante' => request('estante'),
            
        ]);
        return redirect()->route('producto');
    }

    

    
    
}
