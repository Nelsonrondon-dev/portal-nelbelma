@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8">

        
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
    </div>
    </div>
   <div  class="row justify-content-md-center">
 
    <div class="col-lg-8">
        <div class="card card-warning">
        <div class="card-header">
      <h3 class="card-title">Editando Producto: <strong> {{$inventario->nombre_producto}}</strong></h3>

    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('inventario.update',$inventario->id_inventario)}}" role="form" method="POST" enctype="multipart/form-data" id="formulario-validado">
        @method('PATCH')
        @csrf
      <div class="card-body">
       
        <div class="row">
          <div class="col-sm-6">
            <!-- text input -->
            <div class="form-group">
              <label>Nombre del producto</label>
              <input name="name_producto" value="{{$inventario->nombre_producto}}" type="text" class="form-control" placeholder="Nombre del producto" required >
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Cantidad comprada</label>
              <input  type="number" value="{{$inventario->cantidad_comprada}}" name="cantidad_c" class="form-control" step="any" placeholder="Cantidad comprada" required pattern="^[0-9]+([.][0-9]+)?$">
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="unidad">Unidad</label>
              <select name="unidad"  class="form-control" required>
                @if ($inventario->unidad == 'kg')
                <option selected> kg</option>
                @else  
                <option>kg</option>

                @endif
                @if ($inventario->unidad == 'UND')
                <option selected> UND</option>
                @else 
                <option>UND</option>

                @endif

              </select>
            </div>
           </div>
           <div class="col-sm-6">
            <div class="form-group">
              <label for="iva">IVA </label>
              <select name="iva"  class="form-control" required>
                @if ($inventario->iva == 1)
                <option value="1" selected> si</option>
                @else 
                <option value="1">Si</option>
                @endif

                @if ($inventario->iva == 0)
                <option value="0" selected> No</option>
                @else 
                <option value="0">No</option>
                @endif
                
               
              </select>
            </div>
          </div>
       </div>

        
    <div class="row">
  
         <div class="col-sm-6">
            <div class="form-group">
            <label for="p-compra">Precio de compra por unidad</label>
            <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
            </div>
            <input type="number" name="p-compra" value="{{$inventario->precio_unidad}}"  class="form-control" step="any" placeholder="Precio de compra"  required  pattern="^[0-9]+([.][0-9]+)?$">
           </div>
           </div>
        </div>
  
        <div class="col-sm-6">
          <div class="form-group">
              <label for="p-venta">Precio de Venta por unidad actual</label>
              <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="far fa-money-bill-alt"></i></i></span>
              </div>
              <input type="number" name="p-venta" value="{{$inventario->precio_unidad_actual}}" class="form-control"  step="any" placeholder="Precio de Venta"  required  pattern="^[0-9]+([.][0-9]+)?$">
              </div>
            </div>
         </div>
  
      </div>

      <div class="row">
  
        <div class="col-sm-6">
           <div class="form-group">
           <label for="cantidad_a">Cantidad Actual</label>
           <div class="input-group mb-3">
           <div class="input-group-prepend">
             <span class="input-group-text"><i class="far fa-money-bill-alt"></i></span>
           </div>
           <input type="number" value="{{$inventario->cantidad_actual}}" name="cantidad_a" class="form-control" step="any" placeholder="cantidad actual"  required  pattern="^[0-9]+([.][0-9]+)?$">
          </div>
          </div>
       </div>
 
         


           <div class="col-sm-6">
            <div class="form-group">
              <label for="f-pago">Factura Pagada</label>
              <select name="f-pago"  value=""  class="form-control" required>

                @if ($inventario->pago == 1)
                <option value="1" selected> si</option>
                @else      
                 <option value="1">Si</option>
                @endif

                @if ($inventario->pago == 0)
                <option value="0" selected> No</option>
                @else 
                <option value="0">No</option>
                @endif

              </select>
            </div>
          </div>

        
 
     </div>




      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-outline-success float-right">Actualizar Producto</button>
      </div>
    </form>
  </div>
    </div>
</div> 

</div>

@endsection

