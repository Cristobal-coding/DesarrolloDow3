@extends('layouts/master')
@section('css-personalizado')
    <link rel="stylesheet" href="{{asset("css/myThemes.css")}}">
@endsection
@section('main_content')

<div class="row m-0 my-4">
   
  
    <div class="col-8 offset-2">
        <div class="card-header bg-dark text-light">
            <span>Añadir un cliente:</span>
        </div>
        <div class="card mt-1 bg-dark">
            <div class="card-body p-0 pt-2 text-light">
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
                <form action="{{route("clientes.store")}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row m-0 px-0">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="marca">Rut:  <small class="text-muted">(Sin puntos y con guión)</small></label>
                                <input class="form-control @error('rut') is-invalid @enderror"   type="text" name="rut" placeholder="20111222-k" id="rut" value="{{old('rut')}}" >
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input class="form-control @error('nombre') is-invalid @enderror" type="text" name="nombre" id="nombre" value={{old('nombre')}}>
                            </div>
                        </div>                    
                    </div>
                    <div class="row m-0 px-0">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="patente">Fono Cliente: <small class="text-muted">(8 Digitos)</small></label>
                                <input class="form-control @error('fono') is-invalid @enderror" type="text" name="fono" placeholder="Ej: 98562259" id="fono" value={{old('fono')}}>
                            </div>
                        </div>
                    </div>
                    <div class="row mx-0 mb-3 px-2">
                        <div class="col-12">
                            <button class="btn btn-primary w-100" type="submit">Añadir</button>
                        </div>
                    </div>
                    <div class="row mx-0 mb-3 px-2">
                        <div class="col-12">
                            <a class="btn btn-warning w-100" href="{{route("clientes.index")}}" type="cancel">Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
  
</div>
@endsection