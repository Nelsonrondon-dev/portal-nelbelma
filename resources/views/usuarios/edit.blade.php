@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-md-center">
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

 
    <div class="col-lg-8">
        <div class="card card-warning">
        <div class="card-header">
      <h3 class="card-title">Editar Usuario {{$user->name}}</h3>

    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('usuarios.update',$user->id)}}" role="form" id="formulario-validado"  method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
      <div class="card-body">
        <div class="form-group">
            <label for="name">Nombre</label>
            <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="name" name="name" value="{{$user->name}}" class="form-control" placeholder="Nombre" >
         </div>
         </div>

         <div class="form-group">
          <label for="name">Telefono:</label>
          <div class="row mb-3">
         
          <div class="col-12">
            <input type="number" name="telefono"  value='{{str_replace($arrayName2 = array('       '), '',$user->telefono)}}'  maxlength="12"  class="form-control" placeholder="1234567" >
          </div>
         

          </div>
         </div>
        <div class="form-group">
            <label for="email">Correo</label>
            <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            </div>
            <input type="email" name="email" value="{{$user->email}}" class="form-control" placeholder="Email">
         </div>
         </div>

          <div class="form-group">
          <label for="password">Contraseña <span class="small">(requerido)</span></label>
          <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
          </div>
          <input type="password" name="password" class="form-control"  placeholder="Contraseña" >
          </div>
          </div>

          <div class="form-group">
            <label for="password">Confirme Contraseña <span class="small">(requerido)</span></label>
            <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
            </div>
            <input type="password" name="password_confirmation" class="form-control"  placeholder="Confirme Contraseña">
            </div>
            </div>


         <div class="form-group">
          <label for="file">Foto</label>
          <input type="file"  name="file" class="form-control-file" id="file">
        </div>

          <div class="form-group">
          <label for="file">Rol</label>
          <select name="rol" class="form-control" id="">
          <option selected disabled > Elige un rol para este usuario</option>

            @foreach ($roles as $role)
                
            @if ($role->name == str_replace($arrayName = array('["' , '"]'), '',$user->tieneRol()))
            <option value="{{$role->id}}" selected>{{$role->name}}</option>
            @else 
            <option value="{{$role->id}}">{{$role->name}}</option>
            @endif

            @endforeach


          </select>


        </div>


      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-outline-success float-right">Actualizar Usuario</button>
      </div>
    </form>
  </div>
    </div>
</div> 

</div>

@endsection


