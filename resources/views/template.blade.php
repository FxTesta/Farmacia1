<!DOCTYPE html>
<html>
<head>


    <style>
        .cabecera{
            background-color:grey;
            color:white;
        }
        .centrar-tabla {
        text-align: center;
    }
    </style>
</head>
<body>
    
    <div class="centrar-tabla">
        <h1 >Auditoria De Productos</h1><br>
    </div>   
                        <table class="table centrar-tabla"style="font-size:15px" >
                            <thead class="cabecera">
                                <tr >
                                    <th >ID</th>
                                    <th >USUARIO</th>
                                    <th >ID ARTICULO</th>
                                    <th >CODIGO</th>
                                    <th >ARTICULO</th>
                                    <th >STOCK ANTERIOR</th>
                                    <th >STOCK ACTUAL</th>
                                    <th >FECHA</th>
                                    <th >HORA</th>                                 
                                </tr>
                            </thead>
                            <tbody >
                                @forelse($productos as $producto)
                                   
                                        <tr>
                                            <td >{{$producto->id}}</td>
                                            <td>{{$producto->usuario}}</td>
                                            <td >{{$producto->id_articulo}}</td>
                                            <td >{{$producto->codigo}}</td>
                                            <td >{{$producto->articulo}}</td>
                                            <td >{{$producto->stockanterior}}</td>
                                            <td>{{$producto->stockactual}}</td>
                                            <td>{{$producto->fecha}}</td>
                                            <td>{{$producto->hora}}</td>
                                        </tr>
                                   
                                @empty
                                    <tr>
                                        <td colspan="7">Auditoria vacia</td>
                                    </tr>
                                @endforelse                                
                            </tbody>
                            
                        </table> 
                        
</body>
</html>