<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Inertia\Inertia;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    

    public function index()
    {
        $producto = Producto::all();
        return Inertia::render('Producto/index',[
            'producto' => $producto,
        ]);
    }

    public function create(Categoria $categoria)
    {    

        //añadir categoría para que cargue

        $categoria->load('producto');
        return Inertia::render('Producto/create',[
            'categoria' => $categoria,
            
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'categorias_id' => 'required',
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
        $categorianombre = Categoria::where('id', $request->input('categorias_id'))->first();

        Producto::create([
            'categorias_id' => $request->categorias_id,
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
            'categorianombre' => $categorianombre->name,
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
            'categorias_id' => ['required'],
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
            
            'categorias_id' => request('categorias_id'),
            'descripcion' => request('descripcion'),
            'marca' => request('marca'),
            'venta' => request('venta'),
            'laboratorio' => request('laboratorio'),
            'regsanitario' => request('regsanitario'),
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
