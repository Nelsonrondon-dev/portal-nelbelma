@extends('layouts.app')
 @section('content')

 {{--<div class="container">
  
   <div class="row justify-content-md-center">
    <div class="col-lg-10 ">
      @if ($errors->any())

      <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h5><i class="icon fas fa-ban"></i> Atención!</h5>
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  
  @endif
        <div class="card card-warning">
        <div class="card-header">
        <h3 class="card-title">Registrar nuevo producto</h3>
        </div>
          <!-- /.card-header -->
          <!-- form start -->
   
         
        <div class="card-body pb-2">

              <div class="row">

                        <div class="col-sm-6">
                          <!-- text input -->
                          <div class="form-group">
                            <label>Nombre del producto</label>

                            <select name="name_producto" id="producto" type="text" class="form-control" placeholder="Nombre del producto">
                              <option selected disabled > Elige el producto</option>

                            @foreach ($inventarios as $inventario)
                            <option value="{{$inventario->id_inventario}}" > {{$inventario->nombre_producto}} </option>
                            @endforeach
                          
                            </select>
                          </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                            <label>Cantidad a comprar</label>
                        
                              <select  id="cantidad" name="cantidad_c"  class="form-control" placeholder="Cantidad que desea">
                                <option value="0.1" >100 g</option>
                                <option value="0.2" >200 g</option>
                                <option value="0.3" >300 g</option>
                                <option value="0.4" >400 g</option>
                                <option value="0.5" >500 g</option>
                                <option value="0.6" >600 g</option>
                                <option value="0.7" >700 g</option>
                                <option value="0.8" >800 g</option>
                                <option value="0.9" >900 g</option>
                                <option value="1" >1 kg</option>
                                <option value="2" >2 kg</option>
                                <option value="3" >3 kg</option>
                                <option value="4" >4 kg</option>
                                <option value="5" >5 kg</option>
                                <option value="6" >6 kg</option>
                                <option value="7" >7 kg</option>
                              </select>
                          </div>
                        </div>

              </div>
          
              <div class="row">

                        <div class="col-sm-6">
                            <div class="form-group">
                            <label for="p-compra">Precio del Producto</label>
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
                            </div>
                            <input id="producto_precio" type="number" name="p-compra" class="form-control" step="any" placeholder="Precio de compra" disabled="">
                            
                          </div>
                          </div>
                        </div>



            </div>

        </div>
              <!-- /.card-body -->
          <div class="card-footer">
            <button type="text" style="display: none" id="agregar" class="btn btn-outline-success float-right"><i class="fas fa-plus"></i> Agregar producto al pedido</button>
          </div>

</div>
</div>

<div class="col-lg-10 ">  <div class="card card-danger" style="height: inherit; width: inherit; transition: all 0.15s ease 0s;">
    <div class="card-header">
      <h3  class="card-title">Código de pedido: #<span id="pedido_id" value="{{$ultimo_pedido}}">{{$ultimo_pedido}} </span></h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i>
        </button>
      </div>
      <!-- /.card-tools -->
    </div>
    <!-- /.card-header -->
    <div class="card-body pb-0">
      <div class="col-12">
        <p id="fecha" class="lead">Fecha: </p>
       
        <div class="table-responsive">
          <table  id="tabla_producto" class="table">
            <thead>                  
              <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio UND</th>
                <th>Total</th>
              </tr>
            </thead>

            <form action="{{route('ajaxRequest.store')}}" role="form" method="POST">
             
              {{ csrf_field() }}
            <tbody id="pedido">
           
           </tbody>
          </form>
        
        </table>
        </div>
      </div>


      <div class="row float-right">

        <div class="col-12 ">
          <strong class="lead">Total a pagar</strong>

          <div class="table-responsive">
            <table class="table  mb-0">
              <tbody><tr>
                <th class="pl-0">Bolivares:</th>
                <td id="total">0<small>bss</small></td>
              </tr>
              <tr>
             
            </tbody></table>
          </div>
        </div>
      </div>

    </div>

    <div class="card-footer clearfix">
      <button type="submit" id="guardar" type="button" class="btn  btn-outline-success float-right ml-2"><i class="far fa-save"></i> Guardar Pedido </button>
    </div>
    <!-- /.card-body -->
  </div>
</div>
</div> 
</div>

@endsection

@section('script')
  <script type="text/javascript">
 $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

      $(document).ready(function (){
       
            $('#producto').on('change',function(event) {
             
              event.preventDefault();
                  var  producto_id = $(this).val();
                  if ($.trim(producto) != '') {

                    $.ajax({
                      type:'POST',
                      url:"{{ route('ajaxRequest.post') }}",
                      data:{producto_id: producto_id},
                      success:function(data){

                          $('#producto_precio').val(data.datos[0]['precio_unidad_actual'])
                          $("#agregar").css("display", "block");
                          
                          var nombre_de_producto  = data.datos[0]['nombre_producto'];
                          var precio_unidad_actual = data.datos[0]['precio_unidad_actual'];
                          var id_producto = data.datos[0]['id_inventario'];
                          $("#agregar").click(function(event){
                            event.preventDefault();
                            var cantidad = $('#cantidad').val();
                            var total = cantidad * data.datos[0]['precio_unidad_actual'];
                                if ( cantidad < 1 ) {
                                   cantidad = cantidad * 1000 + ' <small>g</small>';
                                }
                                else {
                                  cantidad = cantidad + ' <small>k</small>';
                                }
                              var Agregarr  = $("#pedido").append("<tr name='"+id_producto+"'><td>"+ nombre_de_producto +"</td><td>"+cantidad+"</td><td>"+precio_unidad_actual+"</td><td>"+total+"</td></tr>");
                              $("#agregar").off("click");  

                              var productos = document.querySelectorAll('tbody#pedido tr td:last-child');
                              var total_neto = 0;
                              for (let index = 0; index < productos.length; index++) {
                                total_neto = total_neto + parseInt(productos[index].textContent);
                              }
                              
                              $("#total").text(total_neto);
                          }); 
                      }
                    });
                  }  
            });


            $("#guardar").click(function(event){
             event.preventDefault();
             var pedido_numero = $("#pedido_id")[0].textContent;
             
              var pedido = $('tbody#pedido tr');
              for (let index = 0; index < pedido.length; index++) {
                var producto_id = parseInt(pedido[index].attributes['name'].textContent);
                var producto = pedido[index].childNodes[0].textContent;
                var cantidad = pedido[index].childNodes[1].textContent;
                var precio =   pedido[index].childNodes[2].textContent;
                var total =    pedido[index].childNodes[3].textContent;
                var ultimo = pedido.length;
                var actual = pedido[index].rowIndex;

                $.ajax({
                  type:'POST',
                  url:"{{ route('ajaxRequest.store') }}",
                  data: {producto: producto, cantidad: cantidad, precio: precio, total: total, actual: actual, pedido_numero:  pedido_numero, producto_id: producto_id,},
                  success:function(pedidosregreso){

                    if (pedidosregreso = ultimo) {
                      $(location).attr('href',"{{url('pedido')}}");
                    }
                    
                  }
                  });


                }
                
                
              });  
              
     
      });



     var d = new Date();
     var strDate = "Fecha: " + d.getDate() + "/" + (d.getMonth()+1) + "/" + d.getFullYear();
     $("#fecha").text(strDate);
    
     

  </script> --}}
@endsection