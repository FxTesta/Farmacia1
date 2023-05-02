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

    
    

    

    
    
}
