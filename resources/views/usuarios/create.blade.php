@extends('layouts/master')

@section('main_content')

<div class="col-lg-8 offset-lg-2 flex justify-content-center align-items-center mt-4">
    <form class="" method="POST" action="">
        @csrf
        <div class="card bg-dark px-0 " >
          <div class="card-header text-light text-center mb-0 pb-0">
            <h4 style="font-weight: bold"> <i class="fas fa-plus"></i>Agregar nuevo User</h4>
          </div>
          <div class="card-body mt-0 pt-0">
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

              <div class="form-group text-light ">
                  <label for="nombre" style="color: rgb(255, 255, 255);">Nombre:</label>         
                  <input type="text" name="nombre" class="form-control bg-info border-0 text-dark @error('nombre') is-invalid @enderror" id="nombre" placeholder="" value={{old('nombre')}} >
             
              </div>         
              <div class="row text-light">
                  {{-- <div class="form-group col-xl-6 col-md-12 text-light">
                      <label for="id_vehiculo" class="text-light" style="color: rgb(15, 1, 1);">ID Vehiculo:</label>
                      <input type="text" name="id_vehiculo" class="form-control bg-info border-0 text-light" id="id_vehiculo" placeholder="0001" value="" >
                  </div> --}}
                  {{-- VALIDAR LAS FECHAS --}}
                  <div class="form-group col-12 text-light ">
                    <label for="email" class="text-light" style="color: rgb(15, 1, 1);">E-mail:</label>
                    <input type="email" name="email" class="form-control bg-info border-0 text-dark @error('email') is-invalid @enderror" id="email" placeholder="" value={{old('email')}} >
                 </div>
                 <div class="form-group col-12 text-light ">
                    <label for="password" class="text-light" style="color: rgb(15, 1, 1);">Contraseña:</label>
                    <input type="password" name="password" class="form-control bg-info border-0 text-dark" id="password" placeholder="" value="" >
                 </div>
                 <div class="form-group col-12 text-light ">
                    <label for="password2" class="text-light" style="color: rgb(15, 1, 1);">Confirmar Contraseña:</label>
                    <input type="password" name="password2" class="form-control bg-info border-0 text-dark" id="password2" placeholder="" value="" >
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
                      <button type="submit" class=" btn btn-warning w-100">Crear</button>
                  </div>                                
              </div>
          </div>
      </div>      
      </form>
</div>
    
@endsection