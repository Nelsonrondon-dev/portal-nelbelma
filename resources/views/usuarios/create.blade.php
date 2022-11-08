@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-md-center">
     <div class="col-lg-6 ">
  
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
        <div class="card card-success">
        <div class="card-header">
      <h3 class="card-title">Registrar Usuario</h3>
             
    
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    
    <form action="{{url('usuarios')}}"  id="formulario-validado" role="form" method="POST"  enctype="multipart/form-data">
        @csrf
      <div class="card-body">
        <div class="form-group">
            <label for="name">Nombre</label>
            <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="name" name="name" class="form-control" placeholder="Nombre" required>
         </div>
         </div>

          <div class="form-group">
          <label for="name">Telefono:</label>
          <div class="row mb-3">
          <div class="col-3">
            <select class="form-control" name="telefono_codigo" id="" required>
              <option value="58412">0412</option>
              <option value="58416">0416</option>
              <option value="58426">0426</option>
              <option value="58424">0424</option>
              <option value="58414">0414</option>
            </select>
          </div>
          <div class="col-9">
            <input type="number" name="telefono" class="form-control" placeholder="1234567" maxlength="7"  required pattern="[0-9]{1,7}" >
          </div>
         

          </div>
         </div>
        
         <div class="form-group">
            <label for="email">Correo</label>
            <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            </div>
            
            <input type="email" name="email" class="form-control" placeholder="Email" required>
         </div>
         </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-lock"></i></span>
            </div>
            <input type="password" name="password" class="form-control"  placeholder="Password" required>
         </div>
         </div>
         <div class="form-group">
          <label for="file">Foto</label>
          <input type="file"  name="file" class="form-control-file" id="file" >
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="reset" class="btn btn-outline-danger float-right ml-2">Cancelar</button><button type="submit" class="btn btn-outline-success float-right">Crear Usuario</button>
      </div>
    </form>
  </div>
    </div>
</div> 
</div>

@endsection

