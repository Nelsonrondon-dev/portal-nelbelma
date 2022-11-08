@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6">

    
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
   <div class="row justify-content-md-center">
 
    <div class="col-lg-10">
        <div class="card card-success">
        <div class="card-header">
      <h3 class="card-title">Código de pedido: # {{$id}} </h3>

    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('pedido.update',$id)}}" id="formulario-validado"  role="form" method="POST" enctype="multipart/form-data">
         
            @method('PATCH')
            @csrf
          <input type="number" style="display: none" name='numero_pedido' value="{{$id}}">
          <div class="card-body">
            <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="file">Banco</label>
                <select name="banco" class="form-control" id="" required>
                <option selected disabled value="no-reporto" > Elige el banco desde donde se hizo el pago</option>

                <option value="Banco Central de Venezuela (0001)"> Banco Central de Venezuela (0001)</option>
                <option value="Banco Industrial de Venezuela, C.A. Banco Universal (0003)"> Banco Industrial de Venezuela, C.A. Banco Universal (0003)</option>
                <option value="Banco de Venezuela S.A.C.A. Banco Universal (0102)"> Banco de Venezuela S.A.C.A. Banco Universal (0102)</option>
                <option value="Venezolano de Crédito, S.A. Banco Universal (0104)"> Venezolano de Crédito, S.A. Banco Universal (0104)</option>
                <option value="Banco Mercantil, C.A S.A.C.A. Banco Universal (0105)"> Banco Mercantil, C.A S.A.C.A. Banco Universal (0105)</option>
                <option value="Banco Provincial, S.A. Banco Universal (0108)"> Banco Provincial, S.A. Banco Universal (0108)</option>
                <option value="Bancaribe C.A. Banco Universal (0114)"> Bancaribe C.A. Banco Universal (0114)</option>
                <option value="Banco Exterior C.A. Banco Universal (0115)"> Banco Exterior C.A. Banco Universal (0115)</option>
                <option value="Banco Occidental de Descuento, Banco Universal C.A. (0116)"> Banco Occidental de Descuento, Banco Universal C.A. (0116)</option>
                <option value="Banco Caroní C.A. Banco Universal (0128)"> Banco Caroní C.A. Banco Universal (0128)</option>
                <option value="Banesco Banco Universal S.A.C.A. (0134)"> Banesco Banco Universal S.A.C.A. (0134)</option>
                <option value="Banco Sofitasa Banco Universal (0137)"> Banco Sofitasa Banco Universal (0137)</option>
                <option value="Banco Plaza Banco Universal (0138)"> Banco Plaza Banco Universal (0138)</option>
                <option value="Banco de la Gente Emprendedora C.A. (0146)"> Banco de la Gente Emprendedora C.A. (0146)</option>
                <option value="Banco del Pueblo Soberano, C.A. Banco de Desarrollo (0149)"> Banco del Pueblo Soberano, C.A. Banco de Desarrollo (0149)</option>
                <option value="BFC Banco Fondo Común C.A Banco Universal (0151)"> BFC Banco Fondo Común C.A Banco Universal (0151)</option>
                <option value="100% Banco, Banco Universal C.A. (0156)"> 100% Banco, Banco Universal C.A. (0156)</option>
                <option value="DelSur Banco Universal, C.A. (0157)"> DelSur Banco Universal, C.A. (0157)</option>
                <option value="Banco del Tesoro, C.A. Banco Universal (0163)"> Banco del Tesoro, C.A. Banco Universal (0163)</option>
                <option value="Banco Agrícola de Venezuela, C.A. Banco Universal (0166)"> Banco Agrícola de Venezuela, C.A. Banco Universal (0166)</option>
                <option value="Bancrecer, S.A. Banco Microfinanciero (0168)"> Bancrecer, S.A. Banco Microfinanciero (0168)</option>
                <option value="Mi Banco Banco Microfinanciero C.A. (0169)"> Mi Banco Banco Microfinanciero C.A. (0169)</option>
                <option value="Banco Activo, C.A. Banco Universal (0171)"> Banco Activo, C.A. Banco Universal (0171)</option>
                <option value="Bancamiga Banco Microfinanciero C.A. (0172)"> Bancamiga Banco Microfinanciero C.A. (0172)</option>
                <option value="Banco Internacional de Desarrollo, C.A. Banco Universal (0173)"> Banco Internacional de Desarrollo, C.A. Banco Universal (0173)</option>
                <option value="Banplus Banco Universal, C.A. (0174)"> Banplus Banco Universal, C.A. (0174)</option>
                <option value="Banco Bicentenario Banco Universal C.A. (0175)"> Banco Bicentenario Banco Universal C.A. (0175)</option>
                <option value="Banco Espirito Santo, S.A. Sucursal Venezuela B.U. (0176)"> Banco Espirito Santo, S.A. Sucursal Venezuela B.U. (0176)</option>
                <option value="Banco de la Fuerza Armada Nacional Bolivariana, B.U. (0177)"> Banco de la Fuerza Armada Nacional Bolivariana, B.U. (0177)</option>
                <option value="Citibank N.A. (0190)"> Citibank N.A. (0190)</option>
                <option value="Banco Nacional de Crédito, C.A. Banco Universal (0191)"> Banco Nacional de Crédito, C.A. Banco Universal (0191)</option>
                <option value="Instituto Municipal de Crédito Popular (0601)"> Instituto Municipal de Crédito Popular (0601)</option>

                </select>


              </div>
            </div>
            <div class="col-6">
              <div class="form-group">

                    <label for="name">Monto</label>
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-money-bill-alt"></i></span>
                    </div>
                    <input type="number" name="monto" value="monto" class="form-control" placeholder="Monto bss" required pattern="^[0-9]+([.][0-9]+)?$">
                  </div>

              </div>
            </div>
          </div>

          <div class="row">
              <div class="col-6">
                <div class="form-group">
                    <label for="email">Referencia</label>
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="fas fa-clipboard-list"></i></span>
                    </div>
                    <input type="text" name="referencia"  class="form-control" placeholder="Referencia bancaria" required pattern="[A-Za-z0-9]+">
                    </div>
                </div>
              </div>
             <div class="col-6">
              <div class="form-group">
                <label for="file">Tipo de Pago</label>
                <select name="tipo_pago" class="form-control" id="" required>
                <option selected disabled  value="no reporto" > Elige el tipo de pago</option>
                <option value="Pago movil">Pago Móvil</option>
                <option value="Trasnferencia">Transferencia</option>
                </select>


              </div>
            </div>
          </div>


       
            <div class="form-group">
              <label for="file">Capture de Pago</label>
              <input type="file"  name="file" class="form-control-file" id="file" required>
            </div>




          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-outline-success float-right">Reportar Pago</button>
          </div>


    </form>
  </div>
    </div>
</div> 

</div>

@endsection

