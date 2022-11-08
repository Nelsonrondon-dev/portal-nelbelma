@extends('layouts.app')

@section('content')

<div class="row">
          <div class="col-lg-12">
                
          <div class="card">
              <div class="card-header">
                <h3 class="card-title float-none">Usuarios Registrados <a href="usuarios/create"><button type="button" class="btn btn-outline-success float-right">Agregar Usuarios</button></a></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Nombre</th>
                      <th>Correo</th>
                      <th>Rol</th>
                      <th>Opciones</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach($users as $user)
                    <tr>
                      <td><span class="badge bg-danger">{{$user->id}}</span></td>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td>
                        @foreach ($user->roles as $role)
                        {{$role->name}}
                        @endforeach

                      </td>
                      <td class="project-actions text-right">
                        <a href="{{route('usuarios.show',$user->id)}}" class="btn btn-success btn-sm" >
                          <i class="fas fa-eye"></i>
                            Ver
                        </a>
                        <a href="{{route('usuarios.edit',$user->id)}}" class="btn btn-warning btn-sm" >
                            <i class="fas fa-pencil-alt">
                            </i>
                            Editar
                        </a>
                        <form class="btn pl-0 " action="{{route('usuarios.destroy',$user->id)}}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" href="" class="btn btn-danger btn-sm" >
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
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  {{$users->links()}}
                </ul>
              </div>
            </div>


        </div>
        <!-- /.row -->
@endsection

