<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pedidos por Fecha</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  </head>
<body>
  @php
  $C = 0;
  @endphp 
@foreach ($pedidos as $pedido)

@if ($C != $pedido->numero_pedido)
@php
 $C = $pedido->numero_pedido;
 $user = App\User::find($pedido->user_id);
@endphp 


<div class="row">
  <table class="table table-borderless">
    <thead>
      <tr>
        <th scope="col-6">Código de pedido: #{{$pedido->numero_pedido}}</th>
        <th scope="col-6">Pedido a nombre de: {{$user->name}}</th>
      </tr>
    </thead>
    
  </table>
</div>

<div class="row bd-example pb-3">
<div class="table-responsive-sm">
    <table class="table table-sm">
        <thead class="bg-danger">
          <tr>
            <th scope="col">Nombre del producto</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Precio Und</th>
            <th scope="col">Total</th>
          </tr>
        </thead>
        <tbody>

        
            @php
            $pedido2 = DB::table('pedidos')->where('numero_pedido', $pedido->numero_pedido)->get();
            $Total = 0;
             @endphp
          @foreach ($pedido2 as $pedido1)
          
              <tr>
                  <td>{{$pedido1->nombre_producto}}</td>
                  <td>{{$pedido1->cantidad}}</td>
                  <td class="deuda">{{$pedido1->precio_und}}</td>
                  <td>{{$pedido1->total}}</td>
              </tr>

              @php
                  $Total=$Total+$pedido1->total;
              @endphp
      

          @endforeach
         </tbody>

        </table>

        <div class="row float-right">

          <div class="col-12 float-right ">
            <strong class="lead">Total a pagar</strong>
            <div class="table-responsive">
              <table class="table  mb-0">
                <tbody>
                  <tr>
                  <td>{{$Total}} <small>bss</small></td>
                </tr>
              </tbody>
              </table>
            </div>
          </div>
        </div>

       
</div>
</div>
<br>
<br>
<br>
<br>

<div class="row">
  <table class="table">
    <thead class="thead-light " style="font-size: 0.7em;line-height: 0.5; margin-top: 0px;">
      <tr>
        <th scope="col" class="">

          <p class="float-left  ml-2"><strong>Estado del Pago: </strong> 
      
            @if ($pedido->pagado == 0)
            Sin Reportar <i style="color: #dc3545" class="far fa-times-circle"> </i>
            @elseif ($pedido->pagado == 1)
            Pago Reportado <i i style="color: #28a745" class="far fa-check-circle"> </i>
            @endif
          
          </p>                   

        </th>
        <th scope="col" class="">
          <p class="float-left pt-0  ml-2"><strong>Estado del Pedido: </strong> 
      
            @if ($pedido->despachado == 0 && $pedido->pagado == 0)
            NO Despachado <i style="color: #dc3545" class="far fa-times-circle">   </i>
            @elseif ($pedido->despachado == 0 && $pedido->pagado == 1)
            Pago Reportado sin aprobación <i style="color: #dc3545" class="far fa-times-circle ">    </i>
            @elseif ($pedido->despachado == 1)
            Pedido despachado y pago aprobado <i  style="color: #28a745" class="far fa-check-circle ">   </i>
            @endif
          <br>
          </p>  
        </th>
      </tr>
    </thead>
  </table>
</div>
<br><br>
@endif
@endforeach
        
      

    
</body>
</html>