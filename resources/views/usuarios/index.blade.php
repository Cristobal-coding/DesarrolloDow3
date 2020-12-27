@extends('layouts/master')
@section('css-personalizado')
    <link rel="stylesheet" href="{{asset("css/myThemes.css")}}">
@endsection
@section('main_content')
{{-- <div class="col d-flex justify-content-center align-items-start img-home ">
    <section class="py-5 text-center text-light" >
        <div class="row py-lg-5">
          <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light" style="font-weight: bold;">¡Consigue uno como este!</h1>
            <p class="lead  text-light mb-0">“Usuarios.”</p>
              <a href="{{route("autos.index")}}" class="btn btn-secondary text-light mb-2 mt-3">Ir Vehículos</a>
              <a href="{{route("arriendos.index")}}" class="btn btn-secondary text-light mb-2 mt-3">Ir Arriendos</a>
            </p>
          </div>
        </div>
      </section>
      
</div> --}}
<div class="col-12 w-100 mx-0 px-0">
  <div class="d-md-flex flex-md-equal w-100">
    <div class="bg-dark mx-0 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden"style="width: 80%; height: 1500px;)">
      <div class="col-lg-8 offset-lg-2 d-flex justify-content-center align-items-center">
        <a type="button" href="{{route("usuarios.create")}}"class="btn btn-warning">Agregar un Usuario</a>
      </div>
      <div class="my-3 py-3"> 
        <h2 class="display-5">Ejectivo</h2>
        <p class="lead">Lista de Usuarios Ejectivos.</p>
      </div>
      <div class="bg-light mt-0 shadow-sm mx-auto" style="width: 80%; height: 500px; border-radius: 21px 21px 0 0;);">
        <table class="table mt-2 table-bordered">
          <thead class="bg-dark border-0 text-light">
            <tr>
              <th scope="col">Username</th>
              <th scope="col ">E-mail</th>         
            </tr>
          </thead>
          <tbody class="mi-scrol">
            @foreach($usuario as $user)          
              @if ($user->rol_id=='8')
                <tr>
                  <td>{{$user->nombre}}</td>
                  <td>{{$user->email}}</td>
                </tr>
              @endif
            @endforeach
          </tbody>      
        </table>
      </div>
    </div>
    <div class="bg-secondary mx-0 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden"style="width: 80%; height: 1500px;)">
      <div class="col-lg-8 offset-lg-2 d-flex justify-content-center align-items-center">
        <a type="button" href="{{route("usuarios.create")}}"class="btn btn-warning">Agregar un Usuario</a>
      </div>
      <div class="my-3 p-3 text-light">
        <h2 class="display-5">Administrador</h2>
        <p class="lead">Lista de Usuarios Administrador.</p>
      </div>
      <div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 500px; border-radius: 21px 21px 0 0;);" >
        <table class="table mt-2 table-bordered">
          <thead class="bg-secondary border-0 text-light">
            <tr>
              <th scope="col">Username</th>
              <th scope="col">E-mail</th>           
            </tr>
          </thead>
          <tbody>
            @foreach($usuario as $user)          
              @if ($user->rol_id=='1')
                <tr>
                  <td>{{$user->nombre}}</td>
                  <td>{{$user->email}}</td>
                </tr>
              @endif
            @endforeach
          </tbody>      
        </table>
      </div>
    </div>
  </div>
</div>
@endsection