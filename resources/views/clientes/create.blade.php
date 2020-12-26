@extends('layouts/master')
@section('css-personalizado')
    <link rel="stylesheet" href="{{asset("css/myThemes.css")}}">
@endsection
@section('main_content')
<div class="col-4 mt-4">
    <h5>Clientes</h5>
</div>
<div class="row m-0 my-4">
   
  
    <div class="col-8 offset-2">
        <div class="card-header bg-dark text-light">
            <span>Añadir un cliente:</span>
        </div>
        <div class="card mt-1 bg-dark">
            <div class="card-body p-0 pt-2 text-light">
                <form action="{{route("clientes.store")}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row m-0 px-0">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="marca">Rut:</label>
                                <input class="form-control" type="text" name="rut" id="rut">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input class="form-control" type="text" name="nombre" id="nombre">
                            </div>
                        </div>                    
                    </div>
                    <div class="row m-0 px-0">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="patente">Fono Cliente:</label>
                                <input class="form-control" type="text" name="fono" id="fono">
                            </div>
                        </div>
                    </div>
                    <div class="row mx-0 mb-3 px-2">
                        <div class="col-12">
                            <button class="btn btn-primary w-100" type="submit">Añadir</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
  
</div>
@endsection