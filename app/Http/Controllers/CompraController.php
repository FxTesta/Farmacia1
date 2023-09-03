<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use Inertia\Inertia;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    public function index()
    {
        $compra = Compra::all();
        return Inertia::render('Compra/prueba',[
            'compra' => $compra,
        ]);
    }
}
