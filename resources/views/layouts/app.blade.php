<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Nelbelma APP | Zona del Administrador</title>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{url('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{url('dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="{{url('plugins/daterangepicker/daterangepicker.css')}}">

</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div id="app">
        <div class="wrapper">

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>

                <!-- SEARCH FORM -->
            
              
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar elevation-4 sidebar-dark-danger">
                <!-- Brand Logo -->
                <a href="{{ url('/') }}" class="brand-link">
                    <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                        style="opacity: .8">
                    <span class="brand-text font-weight-light">Nelbelma App</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        
                            
                        @auth()
                        <div class="image">
                            <img src="{{asset(Storage::url(Auth::user()->avatar))}}" class="img-circle elevation-2" alt="User Image" style="background: white">
                        </div>
                       
                        @else
                         <div class="image">
                            <img src="{{asset('storage/person.png')}}" class="img-circle elevation-2" alt="User Image" style="background: white">
                        </div>
                        @endauth

                        <div class="info">
                            @auth()
                            <a href="{{route('usuarios.show', Auth::user()->id)}}" class="d-block">
                            @endauth
                            
                                @guest
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }} <i class="fas fa-sign-in-alt"></i></a>
                                @else
                                {{ Auth::user()->name }}
                                <a class="nav-link active" href="{{ route('logout') }}" onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                   <i class="fas fa-sign-out-alt"></i> Cerrar Sesión 
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>

                                @endguest
                                @auth()
                               
                            </a>
                            @endauth
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">

                            <li class="nav-item">
                                <a href="{{ url('/') }}" class="{{ Request::path() === '/' ? 'nav-link active' : 'nav-link' }}">
                                    <i class="nav-icon fas fa-home"></i>
                                    <p>Inicio</p>
                                </a>
                            </li>

                           
                            @can('administrador')
                             <li class="nav-item">
                                <a href="{{url('usuarios')}}"  class="{{ Request::path() === 'usuarios' ? 'nav-link active' : 'nav-link' }}">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Usuarios
                                        <?php $users_count = DB::table('users')->count(); ?>
                                        <span class="right badge badge-danger">{{ $users_count ?? '0' }}</span>
                                    </p>
                                </a>
                            </li>   
                            @endcan

                            @can('vendedor')
                            <li class="nav-item">
                               <a href="{{url('pago')}}"  class="{{ Request::path() === 'pago' ? 'nav-link active' : 'nav-link' }}">
                                <i class=" nav-icon fas fa-cash-register"> </i>
                                   <p>
                                       Pagos
                                   </p>
                               </a>
                           </li>   
                           @endcan

                            
                            @can('administrador')
                             <li class="nav-item">
                                <a href="{{url('inventario')}}"
                                    class="{{ Request::path() === 'inventario' ? 'nav-link active' : 'nav-link' }}">
                                    <i class="nav-icon fas fa-boxes"> </i>
                                    <p>
                                        Inventario
                                    </p>
                                </a>
                            </li>
                            @endcan


                            @can('administrador')
                            <li class="nav-item">
                               <a href="{{url('reportes')}}"
                                   class="{{ Request::path() === 'reportes' ? 'nav-link active' : 'nav-link' }}">
                                   <i class="nav-icon fas fa-clipboard-list"> </i>
                                   <p>
                                        Reportes
                                   </p>
                               </a>
                           </li>
                           @endcan

                           @can('vendedor')
                           <li class="nav-item">
                              <a href="{{url('reportes')}}"
                                  class="{{ Request::path() === 'reportes' ? 'nav-link active' : 'nav-link' }}">
                                  <i class="nav-icon fas fa-clipboard-list"> </i>
                                  <p>
                                       Reportes
                                  </p>
                              </a>
                          </li>
                          @endcan

                            @can('cliente')
                            <li class="nav-item">
                                <a href="{{url('pedido')}}"
                                    class="{{ Request::path() === 'pedido' ? 'nav-link active' : 'nav-link' }}">
                                    <i class="nav-icon fas fa-box-open"> </i>
                                    <p>
                                        Pedidos
                                    </p>
                                </a>
                            </li>
                            @endcan


                            <li class="nav-item">
                                <a href="{{ url('/contactanos') }}" class="{{ Request::path() === 'contactanos' ? 'nav-link active' : 'nav-link' }}">
                                    <i class="nav-icon far fa-address-card"> </i>
                                    <p> 
                                        Contactanos:
                                    </p>
                                </a>
                            </li>

                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">

                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    @yield('content')
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <!-- NO QUITAR -->
                <strong>Nelson Rondón Copyright © 2020
                    <div class="float-right d-none d-sm-inline-block">
                        <b>Version</b> 1.0
                    </div>
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
    </div>

    <!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{url('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{url('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('dist/js/adminlte.min.js')}}"></script>


<script src = "{{url('dist/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{url('plugins/moment/moment.min.js')}}"></script>
<script src="{{url('plugins/daterangepicker/daterangepicker.js')}}"></script>

<!-- jquery-validation  -->
<script src="{{url('plugins/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{url('plugins/jquery-validation/additional-methods.min.js')}}"></script>

<script >
  jQuery.extend(jQuery.validator.messages, {
  required: "Este campo es obligatorio.",
  remote: "Por favor, rellena este campo.",
  email: "Por favor, escribe una dirección de correo válida",
  url: "Por favor, escribe una URL válida.",
  date: "Por favor, escribe una fecha válida.",
  dateISO: "Por favor, escribe una fecha (ISO) válida.",
  number: "Por favor, escribe un número entero válido.",
  digits: "Por favor, escribe sólo dígitos.",
  creditcard: "Por favor, escribe un número de tarjeta válido.",
  equalTo: "Por favor, escribe el mismo valor de nuevo.",
  accept: "Por favor, escribe un valor con una extensión aceptada.",
  pattern: jQuery.validator.format("Por favor, escribe un formato valido {0}"),
  maxlength: jQuery.validator.format("Por favor, no escribas más de {0} caracteres."),
  minlength: jQuery.validator.format("Por favor, no escribas menos de {0} caracteres."),
  rangelength: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1} caracteres."),
  range: jQuery.validator.format("Por favor, escribe un valor entre {0} y {1}."),
  max: jQuery.validator.format("Por favor, escribe un valor menor o igual a {0}."),
  min: jQuery.validator.format("Por favor, escribe un valor mayor o igual a {0}.")
  
});
  $('#formulario-validado').validate({
    rules: {
        
        number: {
        required: true,
        number: true,
      },
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      password2: {
        required: false,
      },
    },
  
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });

     $(function () {
    //Date range picker
    $('#reservation').daterangepicker( {
      locale: {
        format: 'YYYY/MM/DD'
      }
    }
    )
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )


  })
</script>


@yield('script')

</body>


</html>