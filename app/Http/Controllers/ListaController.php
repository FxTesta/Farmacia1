<?php

namespace App\Http\Controllers;

use App\Models\Lista;
use Inertia\Inertia;
use Illuminate\Http\Request;

class ListaController extends Controller
{
    

    public function index(Request $request)
    {
        
        $lista = Lista::when($request->search, function($query, $search){
            //filtra la busqueda por nombre proveedor o nrofactura
            $query->where('proveedor_nombre', 'LIKE', "%{$search}%" )->orWhere('nrofactura', 'LIKE', "%{$search}%");
        })
        ->paginate(15)
        ->withQueryString();

        $filters = $request->only('search');
        

        return Inertia::render('Lista/index',[
            'lista' => $lista,
            'filters' => $filters,
        ]);
    }

 
}
