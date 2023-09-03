<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Inertia\Inertia;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    

    public function index()
    {
        $cliente = Cliente::all();
        return Inertia::render('Cliente/index',[
            'cliente' => $cliente,
        ]);
    }

    public function create()
    {
        return Inertia::render('Cliente/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'cedula' => 'required',
            'ruc' => 'string|max:255|nullable',
            'dv',
            'direccion' => 'required|string|max:255',
            'barrio' => 'string|max:255|nullable',
            'callelateral' => 'string|max:255|nullable',
            'referencia' => 'string|max:255|nullable',
            'telefono' => 'required|max:255',
            'email' => 'nullable|string|email|max:255|unique:'.Cliente::class,
        ]);

        Cliente::create([
            'name' => $request->name,
            'cedula' => $request->cedula,
            'ruc' => $request->ruc,
            'dv' => $request->dv,
            'direccion' => $request->direccion,
            'barrio' => $request->barrio,
            'callelateral' => $request->callelateral,
            'referencia' => $request->referencia,
            'telefono' => $request->telefono,
            'email' => $request->email,
        ]);

        return redirect()->route('cliente');
        
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->back()->with('toast', 'Usuario Eliminado');
    }

    public function edit($cliente_id)
    {
        $cliente = Cliente::find($cliente_id);

        return Inertia::render('Cliente/edit',[
            'cliente' => $cliente,
        ]);
    }

    public function update(Cliente $cliente)
    {
        request()->validate([
            'name' => ['required'],
            'cedula' =>['required'],
            'ruc',
            'dv',
            'direccion' =>['required'],
            'referencia',
            'telefono' =>['required'],
            'email' ,
            
        ]);

        $cliente->update([
            'name' => request('name'),
            'cedula' => request('cedula'),
            'ruc' => request('ruc'),
            'dv' => request('dv'),
            'direccion' => request('direccion'),
            'referencia' => request('referencia'),
            'telefono' => request('telefono'),
            'email' => request('email'),
            
        ]);
        return redirect()->route('cliente');
    }
    
}
