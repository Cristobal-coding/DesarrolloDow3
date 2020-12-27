@extends('layouts/master')
@section('css-personalizado')
    <link rel="stylesheet" href="{{asset("css/myThemes.css")}}">
@endsection
@section('main_content')
<div class="col-lg-5 col-12 mt-5">
    <div class="card shadow-lg rounded">
        <div class="card-header py-1 text-center">
            <h5 class="text-primary mb-0">{{$auto->marca}} {{$auto->nombre_vehiculo}} {{$auto->year}}</h5>
        </div>
        <div class="card-body p-1">
            <img src="{{Storage::url($auto->foto)}}" alt="{{$auto->nombre_vehiculo}}" class="img-fluid">
        </div>
    </div>
</div>
<div class="col-lg-7 col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <form action="{{route("autos.update", $auto->id_vehiculo)}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row my-2">
                <div class="col-4 mx-0 pr-1 px-0 form-floating">
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{$auto->nombre_vehiculo}}">
                    <label for="nombre" class="text-primary">Nombre:</label>
                </div>
                <div class="col-4 mx-0 px-0 form-floating">
                    <input type="text" class="form-control" id="marca" name="marca" value="{{$auto->marca}}">
                    <label for="marca" class="text-primary">Marca:</label>
                </div>
                <div class="col-4 mx-0 pl-1 px-0 form-floating">
                    <select class="form-select mi-scrol" id="año" aria-label="año" name="año">
                        {{-- <option selected>Open this select menu</option> --}}
                        @foreach ($años as $año)
                            <option value="{{$año}}" @if($auto->year==$año) selected="selected" @endif>{{$año}}</option>
                        @endforeach
                      </select>
                      <label for="año" class="text-primary">Año:</label>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-4 mx-0 pr-1 px-0 form-floating">
                    <input type="text" class="form-control" id="patente" name="patente" value="{{$auto->patente}}">
                    <label for="patente" class="text-primary">Patente:</label>
                </div>
                <div class="col-4 mx-0 pl-1 px-0 form-floating">
                    <select class="form-select mi-scrol" id="tipo" aria-label="tipo" name="tipo">
                        {{-- <option selected>Open this select menu</option> --}}
                        @foreach ($tipos as $tipo)
                            <option value="{{$tipo->nombre_tipo}}" @if($auto->tipo->nombre_tipo==$tipo->nombre_tipo) selected="selected" @endif>{{$tipo->nombre_tipo}}</option>
                        @endforeach
                      </select>
                      <label for="tipo" class="text-primary">Tipo Vehículo:</label>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-12 py-2">
                    <label for="estado" class="text-primary d-block">Estado:</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"  @if($auto->estado=='Disponible')  checked @endif style="color: #80EF10" name="inlineRadioOptions" id="Disponible" value="Disponible">
                        <label class="form-check-label" for="Disponible">Disponible</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" @if($auto->estado=='En Mantenimiento')  checked @endif style="color: #0B1EF2" name="inlineRadioOptions" id="En Mantenimiento" value="En mantenimiento">
                        <label class="form-check-label" for="En Mantenimiento">En Mantenimiento</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"  @if($auto->estado=='De Baja') checked @endif style="color: #0B1EF2" name="inlineRadioOptions" id="De Baja" value="De Baja">
                        <label class="form-check-label" for="De Baja">De Baja</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio"  @if($auto->estado=='Arrendado') checked @endif name="inlineRadioOptions" id="Arrendado" value="Arrendado">
                        <label class="form-check-label" for="Arrendado">Arrendado</label>
                      </div>
                </div>

            </div>
            @method('put')
            </form>
        </div>
    </div>
</div>
@endsection