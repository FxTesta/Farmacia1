<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    

    public function index(Request $request)
    {
        $proveedor = Proveedor::when($request->search, function($query, $search){
            // filtra la busqueda por nombre de la empresa ,ruc o nombre del proveedor
            $query->where('empresa', 'LIKE', "%{$search}%" )->orWhere('ruc', 'LIKE', "%{$search}%");
        })
        ->paginate(15)
        ->withQueryString();

        $filters = $request->only('search');

        return Inertia::render('Proveedor/index',[
            'proveedor' => $proveedor,
            'filters' => $filters,
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
            'ruc' => 'required',
            'dv',
            'direccion' => 'required|string|max:255',
            'barrio' => 'string|max:255|nullable',
            'callelateral' => 'string|max:255|nullable',
            'referencia' => 'string|max:255|nullable',
            'telefono' => 'required|max:255',
            'email' => 'nullable|string|email|max:255|unique:',
        ]);

        Proveedor::create([
            'empresa' => $request->empresa,
            'name' => $request->name,
            'ruc' => $request->ruc,
            'dv' => $request->dv,
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
            'empresa' => ['required'],
            'name' => ['required'],
            'ruc' =>['required'],
            'dv' =>['required'],
            'direccion' =>['required'],
            'referencia',
            'telefono' =>['required'],
            'email',
            
        ]);

        $proveedor->update([
            'empresa' => request('empresa'),
            'name' => request('name'),
            'ruc' => request('ruc'),
            'dv' => request('dv'),
            'direccion' => request('direccion'),
            'referencia' => request('referencia'),
            'telefono' => request('telefono'),
            'email' => request('email'),
            
        ]);
        return redirect()->route('proveedor');
    }
    
}
