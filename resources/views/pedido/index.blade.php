@extends('layouts.app')

@section('content')

<div class="row">
          <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                <h2 style="font-size: 1.5rem;" class="card-title float-none">Pedidos {{Auth::user()->name}}<a href="pedido/create"><button type="button" class="btn btn-outline-success float-right">Solicitar nuevo pedido</button></a></h2>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  @php
                  $C = 0;
                @endphp 
                  @foreach($pedidos as $pedido)

                  @if ($C != $pedido->numero_pedido) 
                     @php
                      $C = $pedido->numero_pedido;
                    @endphp 
                  <div class="col-md-12">
                    <div class="card card-danger" style="height: inherit; width: inherit; transition: all 0.15s ease 0s;">
                      <div class="card-header">
                        <h3 class="card-title">Código de pedido: #{{$pedido->numero_pedido}}</h3>
        
                        <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
                          </button>
                        </div>
                        <!-- /.card-tools -->
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body pb-0">
                        <div class="col-12">
                          <p class="lead">Fecha: {{$pedido->created_at->format('M d Y')}}</p>
                          @php
                          $pedido2 = DB::table('pedidos')->where('user_id', Auth::user()->id)->where('numero_pedido', $pedido->numero_pedido)->get();
                           $Total = 0;
                          @endphp
                          <div class="table-responsive">
                            <table class="table">
                              <thead>                  
                                <tr>
                                  <th>Producto</th>
                                  <th>Cantidad</th>
                                  <th>Precio UND</th>
                                  <th>Total</th>
                                </tr>
                              </thead>
                              <tbody>
                                  @foreach ($pedido2 as $pedido1)
                                  <tr>
                                      <td>{{$pedido1->nombre_producto}}</td>
                                    
                                
                                        @php
                                      if ($pedido1->cantidad == 0.1){
                                        $cantidad = '100 g';

                                      }
                                      elseif ($pedido1->cantidad == 0.2)
                                      {  $cantidad ='200 g';
                                      }
                                      elseif ($pedido1->cantidad == 0.3)
                                     { $cantidad = '300 g';}

                                      elseif ($pedido1->cantidad == 0.4)
                                     { $cantidad =  '400 g';}

                                      elseif ($pedido1->cantidad == 0.5)
                                     { $cantidad = '500 g';}

                                      elseif ($pedido1->cantidad == 0.6)
                                      {$cantidad = '600 g';}

                                      elseif ($pedido1->cantidad == 0.7)
                                     { $cantidad = '700 g';}

                                      elseif ($pedido1->cantidad == 0.8)
                                    {  $cantidad = '800 g';}

                                      elseif ($pedido1->cantidad == 0.9)
                                     { $cantidad = '900 g';}

                                      elseif ($pedido1->cantidad == 1)
                                     { $cantidad = '1 k';}

                                      elseif ($pedido1->cantidad == 2)
                                      {$cantidad = '2 k';}

                                      elseif ($pedido1->cantidad == 3)
                                      {$cantidad =  '3 k';}

                                      elseif ($pedido1->cantidad == 4)
                                      {$cantidad = '4 k';}

                                      elseif ($pedido1->cantidad == 5)
                                      {$cantidad = '5 k';}

                                      elseif ($pedido1->cantidad == 6)
                                      {$cantidad = '6 k';}

                                      elseif ($pedido1->cantidad == 7)
                                      {$cantidad = '7 k';}
                                      
                                        @endphp
                                     <td>{{$cantidad}}</td>
                                      
                                      <td class="deuda">{{$pedido1->precio_und}}</td>
                                      <td>{{$pedido1->total}}</td>
                                  </tr>

                                  @php
                                      $Total=$Total+$pedido1->total;
                                  @endphp
                                  
                              @endforeach
                           

                            </tbody>
                          
                          </table>
                          </div>
                        </div>


                        <div class="row float-right">

                          <div class="col-12 ">
                           

                            <div class="card card-outline card-danger  pl-3 pr-3 pb-3 pt-0">
                              <div class="card-header">
                                <strong class="card-title">Total a pagar</strong>
                              </div>
                                  <table class="table m-0">
                                    <tbody><tr >
                                      <th class="pl-0">Bolivares:</th>
                                      <td>{{$Total}} <small>bss</small></td>
                                    </tr>
                                  </tbody></table>
                                </div>                          
                              <!-- /.card-body -->
          
                         
                          </div>
                        </div>
                  
                      </div>

                      <div class="card-footer clearfix">

                      <h5 class="float-left mb-0 ml-2"><strong>Estado del Pago: </strong> 
                        
                        @if ($pedido->pagado == 0)
                        Sin Reportar <i style="color: #dc3545" class="far fa-times-circle"> </i>
                        @elseif ($pedido->pagado == 1)
                        Pago Reportado <i i style="color: #28a745" class="far fa-check-circle"> </i>
                        @endif
                      
                      </h5>                   
                      <h5 class="float-left mb-0 ml-2"><strong>Estado del Pedido: </strong> 
                        
                        @if ($pedido->despachado == 0 && $pedido->pagado == 0)
                        NO Despachado <i style="color: #dc3545" class="far fa-times-circle">   </i>
                        @elseif ($pedido->despachado == 0 && $pedido->pagado == 1)
                        Pago Reportado sin aprobación <i style="color: #dc3545" class="far fa-times-circle ">    </i>
                        @elseif ($pedido->despachado == 1)
                        Pedido despachado y pago aprobado <i  style="color: #28a745" class="far fa-check-circle ">   </i>
                        @endif
                      
                      </h5>  
                      {{-- <a href="{{route('descargarPDFPedido', $pedido->numero_pedido)}}"  class="small-box-footer"> <button type="button" class="btn  btn-outline-primary float-right ml-2" > <i class="fas fa-download"></i> Generar PDF </button></a> --}}
                        @if ($pedido->pagado == 0)
                        <a href="{{route('pedido.edit',$pedido->numero_pedido)}}" ><button type="button" class="btn  btn-success float-right ml-2"><i class="fas fa-plus"></i> Reportar Pago </button></a>
                        @endif
                      </div>
                      <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                  </div>
                  
                  @endif
                
                  

                  @endforeach


                </div>
                <!-- /.card-body -->
             
              </div>
  
  
          </div>
          </div>



       
        <!-- /.row -->
@endsection

