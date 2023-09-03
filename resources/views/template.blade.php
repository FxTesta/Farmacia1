<!DOCTYPE html>
<html>
<head>
    <title>PDF de ejemplo</title>
</head>
<body>
    <h1>Contenido del PDF</h1>
    <p>Este es un ejemplo de archivo PDF generado desde Laravel y Vue.js.</p>
    <!-- Agrega el contenido que desees mostrar en el PDF -->
    
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                   
                    <div class="px-10 pb-10 pt-2 overflow-y-auto">
                        <table class="table" style="text-align: center">
                            <thead>
                                <tr class="border-b border-slate-300 text-gray-700 text-left">
                                    <th class="text-gray-700 py-4 px-2">ID</th>
                                    <th class="px-2">USUARIO</th>
                                    <th class="px-2">ID ARTICULO</th>
                                    <th class="px-2">CODIGO</th>
                                    <th class="px-2">ARTICULO</th>
                                    <th class="px-2">STOCK ANTERIOR</th>
                                    <th class="px-2">STOCK ACTUAL</th>
                                   
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-400 divide-opacity-30">
                            @forelse($productos as $producto)
                        <tr>
                                    <td class="text-gray-700 py-4 px-2">{{$producto->id}}</td>
                                    <td class="text-gray-700 py-4 px-2">{{$producto->usuario}}</td>
                                    <td class="text-gray-700 py-4 px-2">{{$producto->id_articulo}}</td>
                                    <td class="text-gray-700 py-4 px-2">{{$producto->codigo}}</td>
                                    <td class="text-gray-700 py-4 px-2">{{$producto->articulo}}</td>
                                    <td class="text-gray-700 py-4 px-2">{{$producto->stockanterior}}</td>
                                    <td class="text-gray-700 py-4 px-2">{{$producto->stockactual}}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">No existen cambios</td>
                        </tr>
                        @endforelse
                                
                            </tbody>
                            
                        </table> 
</div>
</body>
</html>