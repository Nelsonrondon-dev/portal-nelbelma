@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div  class="row align-items-center" >
          <div class="col-lg-12">
                
          <div class="card">
              <div class="card-header">
                <h2 class="card-title float-none">Inventario Actual <a href="inventario/create"><button type="button" class="btn btn-outline-success float-right">Agregar Productos</button></a></h2>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive-sm ">
                    <table class="table table-bordered ">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">Id</th>
                      <th>Producto</th>
                      <th>Cantidad comprada</th>
                      <th>Cantidad actual</th>
                      <th>Unidad</th>
                      <th>P/U Comprado</th>
                      <th>P/U Actual</th>
                      <th>Iva</th>
                      <th>Deduda</th>
                      <th>Total Actual</th>
                      <th>Pagado</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                     $total = 0;
                     $total_c = 0;
                     $total_dolares = 0;
                     $total_iva = 0;
                     $total_actual = 0;
                     $total_a = 0;
                     $total_iva_actual = 0;
                     $total_dolares_a  = 0;
                      if ($dolar_today['USD']['sicad2'] == null) {
                        foreach ($dolars as $dolar) {
                        $dolar_today['USD']['sicad2'] = $dolar->valor; 
                        $dolar_today['USD']['promedio'] = $dolar->valor;
                        } 
                      }

                    @endphp

                   @foreach($inventarios as $inventario)
                    <tr>
                      <td> <span class="badge bg-danger">{{$inventario->id_inventario}}</span></td>
                      <td>{{$inventario->nombre_producto}}</td>
                      <td>{{$inventario->cantidad_comprada}}</td>
                      <td>{{$inventario->cantidad_actual}}</td>
                      <td>{{$inventario->unidad}}</td>
                      <td>{{$inventario->precio_unidad}}</td>
                      <td>{{$inventario->precio_unidad_actual}}</td>
                      @if ($inventario->iva == 0)
                      <td><i class="text-danger fas fa-times-circle"></i></td>
                      @else
                      @php
                    
                       $total_iva +=  0.16 * $inventario->precio_unidad * $inventario->cantidad_comprada ;
                      //  $total_iva_actual +=  0.16 * $inventario->precio_unidad * $inventario->cantidad_actual ;
                      @endphp
                      <td><i class="text-success  fas fa-check-circle "></i></td>   
                      @endif
                      <td>
                      @php
                      if ($inventario->pago == 0) {
                        $total_c = $inventario->cantidad_comprada * $inventario->precio_unidad;
                         $total += $total_c;
                         $total_dolares = $total / $dolar_today['USD']['sicad2'];
                      }
                      $total_a = $inventario->cantidad_actual * $inventario->precio_unidad_actual;
                         $total_actual += $total_a;
                         $total_dolares_a = $total_actual / $dolar_today['USD']['sicad2'];
                      @endphp 
                      {{$total_c}}
                      </td>
                      <td>{{$total_a}}</td>
                      @if ($inventario->pago==0)
                      <td><i class="text-danger fas fa-times-circle"></i></td>
                      @else
                      <td><i class="text-success  fas fa-check-circle "></i></td>   
                      @endif
                    <td>
                      <a href="{{route('inventario.edit',$inventario->id_inventario)}}" class="btn btn-warning btn-xs" >
                        <i class="fas fa-pencil-alt">
                        </i>
                        Editar
                    </a>
                    <form class="pt-1 " action="{{route('inventario.destroy',$inventario->id_inventario)}}" method="POST">
                      @csrf
                      @method('DELETE')
                      <button type="submit" href="" class="btn btn-danger btn-xs" >
                        <i class="fas fa-trash"></i>
                        Borrar
                    </button>
                    </form>
                    </td>
                    
                    </tr>
                   @endforeach
                  </tbody>
                </table>
                </div>
              
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  {{-- {{$inventarios->links()}} --}}
                </ul>
              </div>
            </div>

           </div>
        <!-- /.row -->


       
      </div>

      <div class="row">
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-4 pb-3">
              
              <div class="invoice ">
                
                <p class="lead m-3"> <i class="fas fa-hand-holding-usd mr-2"></i></i>Deuda Totales</p>
              
                <div class="table-responsive">
                  <table class="table m-0">
                    <tbody><tr>
                      <th style="width:30%">Subtotal:</th>
                      <td>{{$total}} <small>bss</small></td>
                    </tr>
                    <tr>
                      <th>IVA (16%)</th>
                      <td>{{$total_iva}} <small>bss</small></td>
                    </tr>
                    
                    <tr>
                      <th>Total:</th>
                      <td>{{$total+$total_iva}} <small>bss</small> / {{round($total_dolares, 2)}} <small>$</small></td>
                    </tr>
                  </tbody></table>
                </div>
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-4 pb-3">
      
            <div class="invoice ">
              
              <p class="lead m-3"> <i class="fas fa-funnel-dollar mr-2"></i>Total Actual</p>
            
              <div class="table-responsive">
                <table class="table m-0">
                  <tbody><tr>
                    <th style="width:30%">Total en Bss:</th>
                    <td>{{$total_actual}} <small>bss</small></td>
                  </tr>
                  <tr>
                    <th>Total en dolares $</th>
                    <td>{{round($total_dolares_a, 2)}} <small>$</small></td>
                  </tr>
                  
                 
                </tbody></table>
              </div>
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-4">
                  <div class="info-box mb-3  mt-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="far fa-money-bill-alt"></i></i></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text" title="En este sistema se usa el dolar del banco central" >Dolar Bcv   |   Dolar Paralelo  </span>
                      <span class="info-box-number">{{$dolar_today['USD']['sicad2']}} <small>$</small>  | {{$dolar_today['USD']['promedio']}} <small>$</small></span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
                  <!-- /.info-box -->

                  <div class="info-box mb-3  mt-4">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-dollar-sign"></i></i></span>
                    <div class="info-box-content">
                      <span class="info-box-text">Ganancias Actuales </span>
                      <span class="info-box-number"> {{($total_actual+$total_iva_actual)*0.30}} | {{round(($total_actual+$total_iva_actual)*0.30/$dolar_today['USD']['sicad2']), 2}} <small>$</small></span>
                    </div>
                    <!-- /.info-box-content -->
                  </div>
 

          </div>
          <!-- /.col -->

       
        
      </div>


    </div>
@endsection

