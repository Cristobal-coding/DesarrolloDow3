@extends('layouts/master')

@section('main_content')
    <div class="col-5 mt-5">
        <div class="card shadow-lg rounded">
            <div class="card-body p-1">
                <img src="{{Storage::url($auto->foto)}}" alt="{{$auto->nombre_vehiculo}}" class="img-fluid">
            </div>
        </div>
    </div>
    <div class="col-7 mt-5">
        <div class="card">
            <div class="card-body">
                <form action="{{route("autos.update", $auto->id_vehiculo)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mx-0 px-0">
                    <div class="form-group">
                        <label for="nombre">Nombre:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                </div>
                @method('put')
                </form>
            </div>
        </div>
    </div>
@endsection