<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\StockAudit;
use Illuminate\Http\Request;

class StockAuditController extends Controller
{   
   
    public function index(StockAudit $productos)
    {   
       // $productos= StockAudit::all();
      // $productos = StockAudit::with('id', 'usuario', 'id_articulo', 'articulo','stockanterior','stockactual')->get();
      
       $fecha = request('fecha');
     //  $productos = DB::table('stock_audits')
      // ->whereDate('fecha', '>=', $fecha)
      // ->get();
       //return view('template',compact('productos'));
        return $fecha;
    }
}
