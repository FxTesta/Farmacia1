<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Inertia\Inertia;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    

    public function index()
    {
        $proveedor = Proveedor::all();
        return Inertia::render('Proveedor/index',[
            'proveedor' => $proveedor,
        ]);
    }

    public function create()
    {
        return Inertia::render('Proveedor/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'empresa' => 'required',
            'name' => 'required|string|max:255',
            'cedula' => 'nullable|string|max:255|nullable',
            'ruc' => 'required',
            'direccion' => 'required|string|max:255',
            'barrio' => 'string|max:255|nullable',
            'callelateral' => 'string|max:255|nullable',
            'referencia' => 'string|max:255|nullable',
            'telefono' => 'required|max:255',
            'email' => 'nullable|string|email|max:255|unique:'.Proveedor::class,
        ]);

        Proveedor::create([
            'empresa' => $request->empresa,
            'name' => $request->name,
            'cedula' => $request->cedula,
            'ruc' => $request->ruc,
            'direccion' => $request->direccion,
            'barrio' => $request->barrio,
            'callelateral' => $request->callelateral,
            'referencia' => $request->referencia,
            'telefono' => $request->telefono,
            'email' => $request->email,
        ]);

        return redirect()->route('proveedor');
        
    }

    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();
        return redirect()->back()->with('toast', 'Proveedor Eliminado');
    }

    public function edit($proveedor_id)
    {
        $proveedor = Proveedor::find($proveedor_id);

        return Inertia::render('Proveedor/edit',[
            'proveedor' => $proveedor,
        ]);
    }

    public function update(Proveedor $proveedor)
    {
        request()->validate([
            'name' => ['required'],
            'ruc' =>['required'],
            'direccion' =>['required'],
            'referencia' =>['required'],
            'telefono' =>['required'],
            'email' =>['required'],
            
        ]);

        $proveedor->update([
            'name' => request('name'),
            'ruc' => request('ruc'),
            'direccion' => request('direccion'),
            'referencia' => request('referencia'),
            'telefono' => request('telefono'),
            'email' => request('email'),
            
        ]);
        return redirect()->route('proveedor');
    }
    
}
