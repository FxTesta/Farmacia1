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
}
