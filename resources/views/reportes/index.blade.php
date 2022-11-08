@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div class="row">
          <div class="col-lg-12">
                
          <div class="card">
              <div class="card-header">
                <h2 class="card-title float-none">Reportes</h2>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                      <div class="inner">
                        <h3><i class="fas fa-search"></i></h3>
        
                        <p>Reporte de Pedidos</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-bag"></i>
                      </div>
                      <a href="{{url('reportes/create')}}" class="small-box-footer">Generar reporte <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                      <div class="inner">
                        <h3>{{$iventario}}</h3>
        
                        <p>Reporte Inventario</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                      </div>
                      <a href="{{route('descargarPDFInventario')}}"  class="small-box-footer"> Ver reporte <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                      <div class="inner">
                        <h3>{{$users}}</h3>
        
                        <p>Reporte de usuarios Registrados</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-person-add"></i>
                      </div>
                      <a href="{{route('descargarPDFUsuarios')}}" class="small-box-footer">Ver reporte <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                      <div class="inner">
                        <h3>{{$iventario}}</h3>
        
                        <p>Reporte precios actuales</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                      </div>
                      <a href="{{route('descargarPDFPrecio')}}" class="small-box-footer">Ver reporte <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                </div>
    </div>
  </div>
</div>
</div>
</div>
@endsection



