@extends('layouts.app')

@section('content')

<div class="row">
          <div class="col-lg-12">
              <div class="card">
                <div class="card-header">
                <h2 style="font-size: 1.5rem;" class="card-title float-none">Verificar pedidos</h2>
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

                        @php
                            $pagos = App\Pago::where('numero_pedido', $pedido->numero_pedido)->get();
                            // $pedido2 = DB::table('pedidos')->where('user_id', Auth::user()->id)->where('numero_pedido', $pedido->numero_pedido)->get();

                            $user = App\User::find($pedido->user_id);
                        @endphp
                        <h3 class="card-title ml-2">Pedido a nombre de: {{$user->name}}</h3>
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
                          $pedido2 = DB::table('pedidos')->where('numero_pedido', $pedido->numero_pedido)->get();
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
                                      <td>{{$pedido1->cantidad}} <small> k</small> </td>
                                      <td class="deuda">{{$pedido1->precio_und}}<small> bss</small></td>
                                      <td>{{$pedido1->total}} <small> bss</small></td> 
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
                  


                        <div class="row invoice-info float-left">
                          <div class="col-sm-6 invoice-col">
                            <p class="lead">Datos del cliente</p>
                            <address>
                              <strong>Nombre: {{$user->name}}</strong><br>
                              * Email: {{$user->email}}<br>
                              * Número Telf: <a target="_blank" href="https://wa.me/{{$user->telefono}}">{{$user->telefono}}</a><br>
                            </address>
                          </div>
                          <!-- /.col -->
                          <div class="col-sm-6 invoice-col">
                            <p class="lead">Datos del pago</p>
                        @php
                            $actual= 0;
                        @endphp
                          @foreach ($pagos as $pago)
                          
                          @if ( $actual != $pago->numero_pedido )
                          @php
                          $actual= $pago->numero_pedido;
                          @endphp
                          <address>
                            <strong>Codigo: pedido # {{$pago->numero_pedido}}</strong><br>
                            * Banco: {{$pago->banco}}<br>
                            * Monto: {{$pago->monto}}<br>
                            * Referencia: {{$pago->referencia}}<br>
                            * Capture <a download="capture.png" href="{{asset(Storage::url($pago->capture))}}">descargar</a> 
                          </address>

                          @endif
                          @endforeach
                           
                          </div>
                          <!-- /.col -->
                        </div>



                      </div>

                      <div class="card-footer clearfix">

                      <h5 class="float-left mb-0">Estado del Pago: 
                        
                        @if ($pedido->pagado == 0)
                        Sin Reportar <i style="color: #dc3545" class="far fa-times-circle"> </i>
                        @elseif ($pedido->pagado == 1)
                        Pago Reportado <i i style="color: #28a745" class="far fa-check-circle"> </i>
                        @endif
                      
                      </h5>
                        
                        @if ($pedido->pagado == 1 && $pedido->despachado == 0 )
                        <a href="{{route('pago.edit', $pedido->numero_pedido)}}" ><button type="button" class="btn  btn-outline-success float-right ml-2"><i class="fas fa-plus"></i> Aprobar pago </button></a>
                        @elseif ($pedido->pagado == 1 && $pedido->despachado == 1 ) 
                        <a target="_blank" href='https://wa.me/{{$user->telefono}}?text=*_Reporte%20de%20Pago%20Aprobado%20NelbelmaCA_*%0D%0A%20*Código%20de%20Pedido:*%20{{$pago->numero_pedido}}%0D%0A%20*Fecha%20de%20Compra:*%20{{$pedido->created_at->format('d/m/y')}}%0D%0A%20*Total%20Deuda:*%20{{$Total}}%0D%0A%20*Fecha%20de%20Pago:*%20{{$pago->created_at->format('d/m/y')}}%0D%0A%20*Total%20Pago:*%20{{$pago->monto}}%0D%0A '><button type="button" class="btn  btn-outline-success float-right ml-2"><i class="fab fa-whatsapp"></i> Enviar Reporte de Pago aprobado </button></a>
                        @elseif ($pedido->pagado == 0) 
                        <a target="_blank" href='https://wa.me/{{$user->telefono}}?text=*_Cuenta%20Pendiente%20NelbelmaCA_*%0D%0A%20*Pedido:*%20{{$pedido->numero_pedido}}%0D%0A%20*A%20Nombre%20de:*%20{{$user->name}}%0D%0A%20*Fecha%20de%20Pedido:*%20{{$pedido->created_at->format('d/m/y')}}%0D%0A%20*Total%20Deuda:*%20{{$Total}} '><button type="button" class="btn btn-warning float-right ml-2"><i class="fab fa-whatsapp"></i> Enviar Reporte de Pago pendiente </button></a>

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

