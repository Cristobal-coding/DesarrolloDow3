<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Películas Online</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
      crossorigin="anonymous"
    />
    <script src="https://kit.fontawesome.com/bce530116a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{asset('./css/theme.css')}}" />
    <link rel="stylesheet" href="{{asset("./css/styles.css")}}" />
  </head>
  <body class="bg-info">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-4 col-lg-5 d-flex flex-column align-items-end min-vh-100 bg-dark">
          <div class="p-4 px-lg-5 pt-lg-4 pb-lg-3 text-center w-100 mb-auto">
            <h1 class="text-secondary" style="font-weight: bold">Arrienda Autos</h1>
            <h5 class="text-secondary">DOW020</h5>
            <h6 class="text-light">Sistema de Arriendo</h6>
          </div>

          <div class="p-4 px-lg-5 pt-lg-2 pb-lg-3 w-100 align-self-center">
            <div class="text-center">
                <h3 class="text-primary">Iniciar Sesión</h3>
            </div>
            <form class="" method="POST" action="{{route("usuarios.login")}}">
              @csrf
              <div class="form-group my-4 ">
                <label for="email" class="text-light">Email address:</label>
                <input type="email" class="form-control bg-light text-primary" id="email" name="email" placeholder="Ingresa tu Email">
              </div>
              <div class="form-group @if($errors->any()) mt-4 mb-2 @else my-4 @endif">
                <label for="password" class="text-light">Password:</label>
                <input type="password" class="form-control bg-light text-primary" id="password" name="password" placeholder="Ingresa tu Contraseña">
                <div class="text-center">
                    <small id="emailHelp" class="form-text text-muted" style="cursor:pointer;" ><a style="color: #fff;">¿Haz olvidado tu contraseña?</a></small>
                </div>
              </div>
              <button type="submit"  class="btn btn-success w-100 my-2 text-light">Inicia Sesión</button>
              {{-- Validacion --}}
              @if($errors->any())
              <div class="text-center my-4">
                <p class="text-danger"><i class="fas fa-exclamation-circle fa-lg mr-1"></i>
                @foreach ($errors->all() as $error )
                    {{$error}}
                @endforeach
                </p>
              </div>
              @endIf
              {{-- /Validacion --}}
              <div class="text-center mt-4">
                <small style="color: #fff;" >Inicia Sesión con:</small>
              </div>
              <div class="row m-3">
                <div class="col-6 text-center pr-1">
                  <a href="#"class="btn btn-danger w-100"><i class="fab fa-facebook-f lead mr-2"></i>Facebook</a>
                </div>
                <div class="col-6 text-center pl-1">
                  <a href="#"class="btn btn-primary w-100 text-light"><i class="fab fa-google lead mr-2"></i>Google</a>
                </div>
              </div>
            </form>
          </div>

          <div class="row p-4 px-lg-5 pt-lg-2 pb-lg-3 mt-auto w-100">
            <div class="col-6 text-right pr-0">
              <small  style="color: #fff;">¿No tienes cuenta?</small>
            </div>
            <div class="col-6 text-left pl-1">
              <small>
                <a style="color: #fff;" href="#">Resgistrate aquí</a>
              </small>
            </div>
          </div>
        </div>

        <div class="d-none d-lg-block col-xl-8 col-lg-7 m-0 p-0">
          <!--Imagen-->
          <div id="carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carousel" data-slide-to="0" class="active"></li>
              <li data-target="#carousel" data-slide-to="1"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item vh-100 active" data-interval="5000"> 
                <img src="{{asset("../Imgs/fondoLogin1.jpg")}}" class="img-fluid h-100" alt="..." >                
              </div>
              <div class="carousel-item vh-100" data-interval="2000">       
                <img src="{{asset("../Imgs/fondoLogin2.jpg")}}" class="img-fluid h-100" alt="..." >                
                        
              </div>
            <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

        </div>
      </div>
    </div>
    
  </body>
  <script
    src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"
  ></script>
  <script
    src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
    integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
    crossorigin="anonymous"
  ></script>
  <script
    src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
    integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
    crossorigin="anonymous"
  ></script>
</html>