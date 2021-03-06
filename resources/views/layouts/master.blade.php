<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('css-personalizado')
    <script src="https://kit.fontawesome.com/bce530116a.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset("css/theme.css")}}">
    <title>Cars</title>
</head>
<body class="no-scroll" @if(Route::current()->getName()=="home.index")style='background: #ebf5fc !important;'@endif>
    <div class="container-fluid m-0 p-0">
          <nav class="navbar navbar-expand-lg navbar-dark bg-primary ">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Navbar</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link  @if(Route::current()->getName()=="home.index") active @endif" aria-current="page" href="{{route('home.index')}}">Home</a>
                  </li>
                  <li class="nav-item dropdown @if(Route::current()->getName()!="home.index")
                      @if(Request::segments()[0]=="vehiculos"||Request::segments()[0]=="tipos")
                      active
                      @endif
                    @endif">
                    
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Vehículos
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
                      <li>
                        <a class="dropdown-item @if(Gate::denies('onlyAdmin')) disabled @endif" href="{{route("tipos.index")}}">Tipos de vehiculos</a>
                      </li>
                      <li><a class="dropdown-item" href="{{route("vehiculos.index")}}"> @if(Gate::denies('onlyAdmin')) Ver Vehículos @else Gestionar Vehículos @endif </a></li>
                    </ul>
                  
                  </li>    
                  <li class="nav-item">
                    <a class="nav-link @if(Route::current()->getName()!="home.index")
                      @if(Request::segments()[0]==("arriendos") || Request::segments()[0]==("cart") || Request::segments()[0]==("addcart"))
                      active 
                      @endif
                     
                     @endif" href="{{route("arriendos.index")}}" tabindex="-1" aria-disabled="true">Arriendos</a>
                  </li>                  
                  <li class="nav-item">
                    <a class="nav-link  @if(Route::current()->getName()!="home.index" && Request::segments()[0]=="clientes") active @endif" href="{{route("clientes.index")}}" tabindex="-1" aria-disabled="true">Clientes</a>
                  </li>
                  
                  
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle  @if(Route::current()->getName()!="home.index" && Request::segments()[0]=="usuarios") active @endif" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Configuración
                    </a>
                    
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="{{route("usuarios.index")}}">Gestionar Usuarios</a></li>
                      <li >
                        <a class="dropdown-item" href="{{route('estadisticas.download')}}" tabindex="-1" aria-disabled="true">Generar reporte</a>
                      </li>
                      <li >
                        <a class="dropdown-item" href="{{route("editpass.editpass")}}" tabindex="-1" aria-disabled="true">Cambiar mi contraseña.</a>
                      </li>
                    </ul>
                  </li>        
                </ul>
                <form class="d-flex justify-content-center align-items-center" method="GET" action="{{route("usuarios.logout")}}">
                  @csrf
                  <div class="nav-item ">
                    @php
                    $arriendoEnCurso=false;
                    foreach (Auth::user()->arriendos as $arriendo) {
                      if($arriendo->confirmada==0){
                        $arriendoEnCurso=true;
                      }
                    }    
                    @endphp
                    <a href="{{route("arriendos.carrito")}}" class="nav-link text-light"><span style='color:red;' class="@if($arriendoEnCurso!=true)d-none @endif"><i class="fas fa-asterisk"></i></span><i class="fas fa-shopping-cart fa-lg"></i></a>
                  </div>
                  <p class="m-0 p-0 text-light mr-1" style=" font-size:18px">{{Auth::user()->nombre}} ({{Auth::user()->rol->nombre}})</p>
                  <button type="button" class="btn btn-primary border-0 mr-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Foto Usuario"><i class="far fa-user fa-lg"></i></button>
                  <button type="submit" class="btn btn-primary border-0" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Cerrar Sesión"><i class="fas fa-sign-out-alt fa-lg"></i></button>
                </form>
              </div>
            </div>
          </nav>
        <div class="row m-0">
            @yield('main_content') 
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>
<script text="javascript/text">
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  })
</script>
</html>
    
