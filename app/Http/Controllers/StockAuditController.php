<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\StockAudit;
use Illuminate\Http\Request;

class StockAuditController extends Controller
{   
   
    public function index(Request $request)
    {   
       // $productos= StockAudit::all();
      // $productos = StockAudit::with('id', 'usuario', 'id_articulo', 'articulo','stockanterior','stockactual')->get();
      $fecha = $request->input('valor');       
      $productos = DB::table('stock_audits')
       ->whereDate('fecha', '>=', $fecha)
       ->get();

      return view('template',compact('productos'));
   //return view('template',compact('fechas'));
      // return view('template')->with('fecha', $fecha);
       //return view('template', ['fecha' => $fecha]);
       // return $fechas;
    }
}
