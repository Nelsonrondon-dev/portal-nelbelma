@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-md-center">
   <div class="col-lg-6 ">

                
          
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" style="border-radius: 100px;" src="{{asset(Storage::url($user->avatar))}}" title="{{ $user->name }}" alt="{{ $user->name }}">
                  </div>
  
                  <h3 class="profile-username text-center"> {{ $user->name }}</h3>
               
                  <p class="text-muted text-center"></p>
  
                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>Correo</b> <a class="float-right">{{ $user->email }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Telefono</b> <a class="float-right">{{ $user->telefono }}</a>
                    </li>
                    <li class="list-group-item">
                      <b>Rol de Usuario</b> <a class="float-right">{{ $user->roles[0]->name}}</a>
                    </li>
                  </ul>
  
                </div>
                <!-- /.card-body -->
              </div>

        </div> 


   </div>  
 </div>
        <!-- /.row -->
@endsection

