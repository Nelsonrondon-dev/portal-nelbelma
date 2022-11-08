<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuarios</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
 
<div class="table-responsive-sm">
    <table class="table table-sm">
        <thead class="bg-danger">
          <tr>
            <th scope="col">#Id</th>
            <th scope="col">Nombre del producto</th>
            <th scope="col">Cantidad Comprada</th>
            <th scope="col">Cantidad Actual</th>
            <th scope="col">Unidad</th>
          </tr>
        </thead>
        <tbody>

        @foreach ($inventarios as $inventario)
        <tr>
            <th scope="row">{{$inventario->id_inventario}}</th>
            <td>{{$inventario->nombre_producto}}</td>
            <td>{{$inventario->cantidad_comprada}}</td>
            <td>{{$inventario->cantidad_actual}}</td>
            <td>{{$inventario->unidad}}</td>
        </tr>
        @endforeach

        
        </tbody>
        </table>
</div>
    
</body>
</html>