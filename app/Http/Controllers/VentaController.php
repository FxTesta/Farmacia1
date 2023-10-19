<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function registarVenta()
    {
        $user = auth()->user();

        return Inertia::render('Venta/RegistrarVenta', [
            'user' => $user,
        ]);
    }

    //LISTAR VENTAS
    public function listarVentas(Request $request)
    {
        
        $lista = FacturaVenta::when($request->search, function($query, $search){
            //filtra la busqueda por nombre cliente o nrofactura
            $query->where('cliente_nombre', 'LIKE', "%{$search}%" )->orWhere('nrofactura', 'LIKE', "{$search}%")->orWhere('fechafactura', 'LIKE', "{$search}%");
        })
        ->paginate(15)
        ->withQueryString();

        $filters = $request->only('search');
        

        return Inertia::render('Venta/ListarVenta',[
            'lista' => $lista,
            'filters' => $filters,
        ]);
    }
}
