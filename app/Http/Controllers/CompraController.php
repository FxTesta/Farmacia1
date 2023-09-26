<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Compra;
use App\Models\DetalleFacturaCompra;
use App\Models\FacturaCompra;
use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class CompraController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();

        return Inertia::render('Compra/prueba', [
            'user' => $user,
        ]);
    }

    public function buscarProveedor(Request $request)
    {
        $query = $request->input('query');

        // Realiza la lógica de búsqueda utilizando el valor de $query
        $proveedores = Proveedor::where('empresa', 'LIKE', "%$query%")->get();

        return response()->json($proveedores);
    }

    public function buscarProducto(Request $request)
    {
        $query = $request->input('query');

        // Realiza la lógica de búsqueda utilizando el valor de $query
        $producto = Producto::where('marca', 'LIKE', "%$query%")->orWhere('codigo', 'LIKE', "{$query}%")->get();

        return response()->json($producto);
    }


    public function store(Request $request)
    {

        // se obtiene el array donde se cargo la lista de productos comprados
        $data = $request->input('arrayProductos');

        //en caso de que "arrayProductos" sea nulo o vacio no se guarda nada en la BD
        if (empty($data)) {
            // El array está vacío o nulo o contiene un valor considerado vacío por empty()
        } else {

            //validación
            $request->validate([
                'proveedorid' => 'required',
                'proveedornombre' => 'string|required',
                'codigo' => 'required',
                'usuario' => 'string|required',
                'nrofactura' => 'required|unique:' . FacturaCompra::class,
                'fechafactura' => 'required',
                'total' => 'required',
            ]);

            //Se realiza carga de cabecera factura
            FacturaCompra::create([

                'proveedores_id' => $request->proveedorid,
                'proveedor_nombre' => $request->proveedornombre,
                'users_id' => $request->codigo,
                'username' => $request->usuario,
                'nrofactura' => $request->nrofactura,
                'fechafactura' => $request->fechafactura,
                'preciototal' => $request->total,
            ]);

            //OBTENER EL ID DE FACTURA COMPRA CREADO ARRIBA, PARA EL CREATE DE ABAJO
            $factura = FacturaCompra::where('nrofactura', $request->input('nrofactura'))->first();

            // Itera a través de los datos del array y crea un nuevo registro para cada producto
            foreach ($data as $producto) {
                DetalleFacturaCompra::create([
                    'factura_compra_id' => $factura->id, //envia el id de cabecera factura para asociar con detallefacturacomrpa
                    'producto_id' => $producto['productoid'],
                    'codigo' => $producto['codigobarra'],
                    'marca' => $producto['marca'],
                    'preciocompra' => $producto['precio'],
                    'cantidad' => $producto['cantidad'],
                    'total' => $producto['total'],
                ]);

                //FALTA actualizar stock del producto, sumar la cantidad.
                $productos = Producto::where('id', $producto['productoid'])->first();
                $productos->update([
                    'stock' => $productos->stock + $producto['cantidad'],
                ]);
            }

            return redirect('/compra');
        }
    }

}
