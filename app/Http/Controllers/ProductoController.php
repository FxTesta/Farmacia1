<?php

namespace App\Http\Controllers;

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

    public function create()
    {    
        return Inertia::render('Producto/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'categoria' => 'required|string|max:100',
            'descripcion' => 'required',
            'marca' => 'string|required',
            'venta' => 'required',
            'laboratorio' => 'string|nullable',
            'regsanitario' => 'string|nullable',
            'vencimiento' => 'nullable',
            'alerta' => 'nullable|before_or_equal:vencimiento',
            'codigo' => 'nullable',
            'precioventa' => 'required',
            'preciocompra' => 'nullable',
            'stock' => 'required',
            'stockmin' => 'nullable',
            'descuento' => 'nullable',
        ]);

        Producto::create([
            'categoria' => $request->categoria,
            'descripcion' => $request->descripcion,
            'marca' => $request->marca,
            'venta' => $request->venta,
            'laboratorio' => $request->laboratorio,
            'regsanitario' => $request->regsanitario,
            'vencimiento' => $request->vencimiento,
            'alerta' => $request->alerta,
            'codigo' => $request->codigo,
            'precioventa' => $request->precioventa,
            'preciocompra' => $request->preciocompra,
            'stock' => $request->stock,
            'stockmin' => $request->stockmin,
            'descuento' => $request->image,
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
            'regsanitario' => ['nullable'],
            'vencimiento' => ['nullable'],
            'alerta' => ['nullable'],
            'codigo' => ['nullable'],
            'precioventa' => ['required'],
            'preciocompra' => ['nullable'],
            'stock' => ['required'],
            'stockmin' => ['nullable'],
            'image' => ['nullable'],
            
        ]);

        $producto->update([
            
            'categoria' => request('categoria'),
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
            'image' => request('image'),
            
        ]);
        return redirect()->route('producto');
    }

    

    
    
}
