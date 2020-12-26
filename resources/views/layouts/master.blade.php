<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset("css/theme.css")}}">
    <script src="https://kit.fontawesome.com/bce530116a.js" crossorigin="anonymous"></script>
    @yield('css-personalizado')
    <title>Cars</title>
</head>
<body class="no-scroll">
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
                  <li class="nav-item">
                    <a class="nav-link @if(Route::current()->getName()!="home.index" && Request::segments()[0]=="autos") active @endif" href="{{route("autos.index")}}">Vehiculos</a>
                  </li>
                  
                  <li class="nav-item">
                    <a class="nav-link @if(Route::current()->getName()!="home.index" && Request::segments()[0]=="arriendos") active @endif" href="{{route("arriendos.index")}}" tabindex="-1" aria-disabled="true">Arriendos</a>
                  </li>                  
                  <li class="nav-item">
                    <a class="nav-link " href="#" tabindex="-1" aria-disabled="true">Clientes</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link " href="#" tabindex="-1" aria-disabled="true">Reportes</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="true">
                      Configuración
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="#">Actionn</a></li>
                      <li><a class="dropdown-item" href="#">Another action</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </li>
                </ul>
                <form class="d-flex justify-content-center align-items-center" method="GET" action="{{route("usuarios.logout")}}">
                  @csrf
                  <p class="m-0 p-0 text-light mr-1" style=" font-size:18px">{{Auth::user()->nombre}}</p>
                  <button type="button" class="btn btn-primary border-0" data-toggle="tooltip" data-placement="bottom" title="Foto Usuario"><i class="far fa-user fa-lg"></i></button>
                  <button type="submit" class="btn btn-primary border-0" data-toggle="tooltip" data-placement="bottom" title="Cerrar Sesión"><i class="fas fa-sign-out-alt fa-lg"></i></button>
                </form>
              </div>
            </div>
          </nav>
  

        <div class="row m-0">
            @yield('main_content') 
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</html>
    
