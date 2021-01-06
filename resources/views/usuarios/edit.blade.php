@extends('layouts/master')

@section('main_content')

<div class="col-8 offset-2  mt-4 px-1">
    <div class="row m-0 no-gutters  shadow-lg  bg-dark border-0 text-light" style="border-radius: 25px;">
      <div class="col-lg-8 offset-2 p-4" style="padding-bottom: 0 !important;">
        <p class="card-text"><span class="text-muted">ID: </span>{{$usuario->id}}</p>
        <h3 class="mb-0">{{$usuario->nombre}}</h3>
        <div class="mb-4 ">Email: {{$usuario->email}}</div>
      </div>
    </div>
</div>

<div class="col-lg-8 offset-lg-2 flex justify-content-center align-items-center mt-4">

    {{-- Errores --}}
    @if ($errors->any())
                        
    <div class="alert alert-warning mx-2">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
        @endif
    {{-- Errores --}}
    <form action="{{route('usuarios.update',$usuario->id)}}"  method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="card bg-dark px-0 " >
          <div class="card-header text-light text-center mb-0 pb-0">
            <h4 style="font-weight: bold">  <i class="far fa-edit fa-lg"></i> Editar Usuario</h4>
          </div>
          <div class="card-body mt-0 pt-0">
              <div class="form-group text-light ">
                  <label for="nombre" style="color: rgb(255, 255, 255);">Nombre:</label>         
                  <input type="text" name="nombre" class="form-control bg-info border-0 text-dark" @error('nombre') is-invalid @enderror id="nombre" placeholder="{{$usuario->nombre}}" value="" >
             
              </div>         
              <div class="row text-light">
                  {{-- <div class="form-group col-xl-6 col-md-12 text-light">
                      <label for="id_vehiculo" class="text-light" style="color: rgb(15, 1, 1);">ID Vehiculo:</label>
                      <input type="text" name="id_vehiculo" class="form-control bg-info border-0 text-light" id="id_vehiculo" placeholder="0001" value="" >
                  </div> --}}
                  {{-- VALIDAR LAS FECHAS --}}
                 <div class="form-group col-12 text-light ">
                    <label for="password" class="text-light" style="color: rgb(15, 1, 1);">Contraseña:</label>
                    <input type="password" name="password" class="form-control bg-info border-0 text-dark @error('password') is-invalid @enderror" id="password" placeholder="" value="" >
                 </div>
                 <div class="form-group col-12 text-light ">
                    <label for="password2" class="text-light" style="color: rgb(15, 1, 1);">Confirmar Contraseña:</label>
                    <input type="password" name="password2" class="form-control bg-info border-0 text-dark @error('password2') is-invalid @enderror" id="password2" placeholder="" value="" >
                 </div>
                 <div class="form-group col-12 text-light ">
                    <label for="rol_id" style="color: rgb(255, 255, 255);">Rol:</label>
                    <select class="form-control bg-info border-0" name="rol_id" id="rol_id" style="color: rgb(14, 13, 13);">
                        @foreach ($roles as $rol)
                             <option name="rol_id" id="rol_id" value="{{$rol->id}}">{{$rol->nombre}}</option>
                        @endforeach        
                    </select>     
                 </div>
              </div>                                                      
              <div class="row w-100 m-0 d-flex" >
                  <div class="col-lg-6 col-12 order-lg-2  order-1 px-0 pb-3 pt-2">
                    <a href="{{route('usuarios.index')}}" class="btn btn-secondary w-100">Cancelar</a>
                </div>
                  <div class=" col-lg-6 col-12 order-lg-2  order-1 px-0 pl-lg-1 pt-2 ">
                      <button type="submit" class=" btn btn-warning w-100">Editar</button>
                  </div>                                
              </div>
          </div>
      </div>      
      </form>
</div>
    
@endsection