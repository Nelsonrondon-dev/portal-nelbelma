@extends('layouts.app')

@section('content')

      <div class="row">

              <div class="col-lg-6">

                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Nuestros Productos</h3>
                    </div>
                    <!-- /.card-header -->
                    @foreach ($inventarios as $inventario)
                     <div class="card-body p-0">
                      <ul class="products-list product-list-in-card pl-2 pr-2">
                        <li class="item">
                          <div class="product-img">
                            <img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
                          </div>
                          <div class="product-info">
                            <a href="{{url('/pedido/create')}}" class="product-title">{{$inventario->nombre_producto}}
                              <span class="badge badge-warning float-right">{{$inventario->precio_unidad_actual}} Bss</span></a>
                            <span class="product-description">
                              Disponible {{$inventario->cantidad_comprada}}
                            </span>
                          </div>
                        </li>
                      </ul>
                    </div>    
                    @endforeach

                    <!-- /.card-body -->
                    <div class="card-footer text-center">
                      <a href="{{url('/pedido/create')}}" class="uppercase">Hacer pedido</a>
                    </div>
                    <!-- /.card-footer -->
                  </div>


              </div>

          <!-- /.col-md-6 -->

          <div class="col-md-6">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Bienvenido</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2" class=""></li>
                  </ol>
                  <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img class="d-block w-100" src="{{asset('dist/img/5.jpg')}}"  alt="First slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="{{asset('dist/img/6.jpg')}}" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="{{asset('dist/img/7.jpg')}}" alt="Third slide">
                    </div>
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

    </div>
        <!-- /.row -->
          <div class="row mt-2">
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-dollar-sign"></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text">Dolar paralelo actual</span>
                  <span class="info-box-number">
                    {{$dolars2}}
                    <small>Bss</small>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-dollar-sign"></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text">Dolar BCV actual</span>
                  <span class="info-box-number">{{$dolars}}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
  
            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>
  
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-calendar-day"></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text">Fecha actual</span>
                  <span class="info-box-number" id="fecha" ></span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text">Numero de Usuarios</span>
                  <span class="info-box-number"> <?php $users_count = DB::table('users')->count(); ?>
                    {{ $users_count ?? '0' }}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
          </div>
         
          @section('script')
          <script >
          var d = new Date();
              var strDate = "Fecha: " + d.getDate() + "/" + (d.getMonth()+1) + "/" + d.getFullYear();
              $("#fecha").text(strDate)

          </script>
          @endsection







      
@endsection

