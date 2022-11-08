@extends('layouts.app')

@section('content')
<div class="container">
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
    <form action="{{url('inventario')}}" role="form" method="POST" id="formulario-validado">
      @csrf
    <div class="card-body">


      <div class="row">
        <div class="col-sm-6">
          <!-- text input -->
          <div class="form-group">
            <label>Nombre del producto</label>
            <input name="name_producto" type="text" class="form-control" placeholder="Nombre del producto" required>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label>Cantidad comprada</label>
            <input type="number" name="cantidad_c" class="form-control" step="any" placeholder="Cantidad comprada" required pattern="^[0-9]+([.][0-9]+)?$" >
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="unidad">Unidad</label>
            <select name="unidad"  class="form-control" required>
              <option>kg</option>
              <option>UND</option>
            </select>
          </div>
         </div>
         <div class="col-sm-6">
          <div class="form-group">
            <label for="iva">IVA</label>
            <select name="iva"  class="form-control" required>
              <option value="1">Si</option>
              <option value="0">No</option>
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
          <input type="number" name="p-compra" class="form-control" step="any" placeholder="Precio de compra" required pattern="^[0-9]+([.][0-9]+)?$">
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
            <input type="number" name="p-venta" class="form-control"  step="any" placeholder="Precio de Venta" required pattern="^[0-9]+([.][0-9]+)?$">
            </div>
          </div>
       </div>

    </div>
  </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="reset" class="btn btn-outline-danger float-right ml-2"><i class="fas fa-times-circle"></i> Cancelar</button><button type="submit" class="btn btn-outline-success float-right"><i class="far fa-save"></i> Guardar</button>
    </div>
  </form>

</div>
</div>
</div> 
</div>

@endsection

