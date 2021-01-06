@extends('layouts/master')
@section('css-personalizado')
    <link rel="stylesheet" href="{{asset("css/myThemes.css")}}">
@endsection
@section('main_content')
<div class="col-lg-5 col-12 mt-5">
    <div class="card shadow-lg rounded">
        <div class="card-header py-1 text-center">
            <h5 class="text-primary mb-0">{{$vehiculo->marca}} {{$vehiculo->nombre_vehiculo}} {{$vehiculo->year}}</h5>
        </div>
        <div class="card-body p-1">
            <img src="{{Storage::url($vehiculo->foto)}}" alt="{{$vehiculo->nombre_vehiculo}}" class="img-fluid">
        </div>
    </div>
</div>
<div class="col-lg-7 col-12 mt-5">
    <div class="card">
        {{-- Errores --}}
        @if ($errors->any())                    
        <div class="alert alert-warning mx-2 mt-2">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
{{-- Errores --}}
        <div class="card-body">
            <form action="{{route("vehiculos.update", $vehiculo->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="row my-2">
                <div class="col-4 mx-0 pr-1 px-0 form-floating">
                    <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" @if(Gate::denies('onlyAdmin')) disabled @endif name="nombre" value="{{$vehiculo->nombre_vehiculo}}">
                    <label for="nombre" class="text-primary">Nombre:</label>
                </div>
                <div class="col-4 mx-0 px-0 form-floating">
                    <input type="text" class="form-control @error('marca') is-invalid @enderror" id="marca" @if(Gate::denies('onlyAdmin')) disabled @endif name="marca" value="{{$vehiculo->marca}}">
                    <label for="marca" class="text-primary">Marca:</label>
                </div>
                <div class="col-4 mx-0 pl-1 px-0 form-floating">
                    <select class="form-select mi-scrol" id="año" aria-label="año" @if(Gate::denies('onlyAdmin')) disabled @endif name="año">
                        {{-- <option selected>Open this select menu</option> --}}
                        @foreach ($años as $año)
                            <option value="{{$año}}" @if($vehiculo->year==$año) selected="selected" @endif>{{$año}}</option>
                        @endforeach
                      </select>
                      <label for="año" class="text-primary">Año:</label>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-4 mx-0 pr-1 px-0 form-floating">
                    <input type="text" class="form-control @error('patente') is-invalid @enderror" id="patente" @if(Gate::denies('onlyAdmin')) disabled @endif name="patente" value="{{$vehiculo->patente}}">
                    <label for="patente" class="text-primary">Patente:</label>
                </div>
                <div class="col-lg-4 col-8 mx-0 pl-1 px-0 form-floating">
                    <select class="form-select mi-scrol" id="tipo" aria-label="tipo" @if(Gate::denies('onlyAdmin')) disabled @endif name="tipo">
                        {{-- <option selected>Open this select menu</option> --}}
                        @foreach ($tipos as $tipo)
                            <option value="{{$tipo->nombre_tipo}}" @if($vehiculo->tipo->nombre_tipo==$tipo->nombre_tipo) selected="selected" @endif>{{$tipo->nombre_tipo}}</option>
                        @endforeach
                      </select>
                      <label for="tipo" class="text-primary">Tipo Vehículo:</label>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-12 py-2">
                    <label for="estado" class="text-primary d-block">Estado:</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"  @if($vehiculo->estado=='Disponible' || $vehiculo->estado=='En Tramite')  checked @endif  name="estado" id="disponible" value="Disponible">
                        <label class="form-check-label" for="disponible" style="color: #80EF10">Disponible</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" @if($vehiculo->estado=='En Mantenimiento')  checked @endif  name="estado" id="mantenimiento" value="En Mantenimiento">
                        <label class="form-check-label" for="mantenimiento" style="color: #0B1EF2">En Mantenimiento</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"  @if($vehiculo->estado=='De Baja') checked @endif  name="estado" id="baja" value="De Baja">
                        <label class="form-check-label" for="baja" style="color:  #F20B0B">De Baja</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"  @if($vehiculo->estado=='Arrendado') checked @endif  name="estado" id="arrendado" value="Arrendado">
                        <label class="form-check-label" for="arrendado" style="color:  #E8F20B">Arrendado</label>
                      </div>
                      
                </div>
                <small class="@if($vehiculo->estado!='En Tramite') d-none @endif text-primary">Este vehiculo esta siendo tramitado, no cambies su estado actual.</small>
            </div>
            <div class="row mx-0 my-2 px-0">
                <div class="col-12 px-0">
                    <div class="mb-3">
                        <label for="foto" class="form-label text-primary" >Imagen del Vehículo:</label>
                        <input class="form-control form-control-sm text-primary" id="foto" type="file" @if(Gate::denies('onlyAdmin')) disabled @endif name="foto">
                        <small class="text-secondary pl-1">Si no defines una nueva foto, mantendras la antigua.</small>
                    </div>
                </div>
            </div>
            <hr class="text-primary bg-primary">
            <div class="row my-2">
                <div class="col-6">
                    <a href="{{route("vehiculos.index")}}" class="btn btn-dark w-100">Cancelar</a>
                </div>
                <div class="col-6">
                    <button  type="submit" class="btn btn-primary w-100">Confirmar</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection