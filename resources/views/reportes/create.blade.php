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
      <h3 class="card-title">Reporte de pedidos por fecha</h3>
       </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{route('ajaxRequest.reporte')}}" role="form" method="POST">
      {{ csrf_field() }}
    <div class="card-body">


      <div class="row">
        <div class="col-sm-6">
          <!-- text input -->
          <div class="form-group">
            <label>Date range:</label>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="far fa-calendar-alt"></i>
                </span>
              </div>
              <input type="text" class="form-control float-right" id="reservation">
              <input id="desde" style="display: none" type="text" name="desde" class="form-control" step="any" >
              <input id="hasta" style="display: none" type="text" name="hasta" class="form-control" step="any" >
 
            </div>
            <!-- /.input group -->
          </div>

        </div>
        <div class="col-sm-6">
          <label> </label><br>
          <button id="reporte" type="submit" class="btn btn-outline-success float-left mt-2 ml-2"><i class="far fa-file-pdf"></i> Descargar </button>
         
        </div>
      </div>


    <!-- /.card-body -->

  </form>

</div>
</div>
</div> 
</div>



@endsection





@section('script')
  <script type="text/javascript">

        $(document).ready(function (){
              var  desde =  $('#reservation').val().slice(0, -13).replace(/[/]/gi ,'-');
              var  hasta =  $('#reservation').val().slice(13, 23).replace(/[/]/gi ,'-');
              $('#desde').val(desde);
              $('#hasta').val(hasta);
            $('#reservation').on('change',function(event) {
              event.preventDefault();
              var  desde =  $('#reservation').val().slice(0, -13).replace(/[/]/gi ,'-');
              var  hasta =  $('#reservation').val().slice(13, 23).replace(/[/]/gi ,'-');
              $('#desde').val(desde);
              $('#hasta').val(hasta);


             

            });


            $("#reporte").click(function(event){


            if ($(".activo1").length == 0) {
                $("#reporte").append('<div style="width: 1rem; height: 1rem;" class=" activo1 spinner-border text-success ml-2" role="status"><span class="sr-only">Loading...</span></div>');

              }
           

          });
     });




  </script>
@endsection
