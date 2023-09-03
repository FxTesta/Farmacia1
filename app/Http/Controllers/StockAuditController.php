<?php

namespace App\Http\Controllers;

use App\Models\StockAudit;
use Illuminate\Http\Request;

class StockAuditController extends Controller
{   
   
    public function index()
    {   
        $productos= StockAudit::all();
      // $productos = StockAudit::with('id', 'usuario', 'id_articulo', 'articulo','stockanterior','stockactual')->get();
       // return view('template');
        return view('template');
    }
}
