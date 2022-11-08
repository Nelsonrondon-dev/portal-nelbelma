@extends('layouts.app')

@section('content')
{{-- <div class="container">
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
    <form action="{{route('pedido.update',$id)}}" role="form" method="POST" enctype="multipart/form-data">
         
            @method('PATCH')
            @csrf
          <input type="number" style="display: none" name='numero_pedido' value="{{$id}}">
          <div class="card-body">
            <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="file">Banco</label>
                <select name="banco" class="form-control" id="">
                <option selected disabled > Elige el banco desde donde se hizo el pago</option>

                <option value="0001"> Banco Central de Venezuela</option>
                <option value="0003"> Banco Industrial de Venezuela, C.A. Banco Universal</option>
                <option value="0102"> Banco de Venezuela S.A.C.A. Banco Universal</option>
                <option value="0104"> Venezolano de Crédito, S.A. Banco Universal</option>
                <option value="0105"> Banco Mercantil, C.A S.A.C.A. Banco Universal</option>
                <option value="0108"> Banco Provincial, S.A. Banco Universal</option>
                <option value="0114"> Bancaribe C.A. Banco Universal</option>
                <option value="0115"> Banco Exterior C.A. Banco Universal</option>
                <option value="0116"> Banco Occidental de Descuento, Banco Universal C.A.</option>
                <option value="0128"> Banco Caroní C.A. Banco Universal</option>
                <option value="0134"> Banesco Banco Universal S.A.C.A.</option>
                <option value="0137"> Banco Sofitasa Banco Universal</option>
                <option value="0138"> Banco Plaza Banco Universal</option>
                <option value="0146"> Banco de la Gente Emprendedora C.A.</option>
                <option value="0149"> Banco del Pueblo Soberano, C.A. Banco de Desarrollo</option>
                <option value="0151"> BFC Banco Fondo Común C.A Banco Universal</option>
                <option value="0156"> 100% Banco, Banco Universal C.A.</option>
                <option value="0157"> DelSur Banco Universal, C.A.</option>
                <option value="0163"> Banco del Tesoro, C.A. Banco Universal</option>
                <option value="0166"> Banco Agrícola de Venezuela, C.A. Banco Universal</option>
                <option value="0168"> Bancrecer, S.A. Banco Microfinanciero</option>
                <option value="0169"> Mi Banco Banco Microfinanciero C.A.</option>
                <option value="0171"> Banco Activo, C.A. Banco Universal</option>
                <option value="0172"> Bancamiga Banco Microfinanciero C.A.</option>
                <option value="0173"> Banco Internacional de Desarrollo, C.A. Banco Universal</option>
                <option value="0174"> Banplus Banco Universal, C.A.</option>
                <option value="0175"> Banco Bicentenario Banco Universal C.A.</option>
                <option value="0176"> Banco Espirito Santo, S.A. Sucursal Venezuela B.U.</option>
                <option value="0177"> Banco de la Fuerza Armada Nacional Bolivariana, B.U.</option>
                <option value="0190"> Citibank N.A.</option>
                <option value="0191"> Banco Nacional de Crédito, C.A. Banco Universal</option>
                <option value="0601"> Instituto Municipal de Crédito Popular</option>

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
                    <input type="number" name="monto" value="monto" class="form-control" placeholder="Monto bss">
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
                    <input type="text" name="referencia" value="referencia" class="form-control" placeholder="Referencia bancaria">
                    </div>
                </div>
              </div>
             <div class="col-6">
              <div class="form-group">
                <label for="file">Tipo de Pago</label>
                <select name="tipo_pago" class="form-control" id="">
                <option selected disabled > Elige el tipo de pago</option>
                <option value="pago_movil">Pago Móvil</option>
                <option value="trasnferencia">Transferencia</option>
                </select>


              </div>
            </div>
          </div>


       
            <div class="form-group">
              <label for="file">Foto</label>
              <input type="file"  name="file" class="form-control-file" id="file">
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

</div> --}}

@endsection

