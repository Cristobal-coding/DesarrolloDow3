@extends('layouts/master')
@section('css-personalizado')
    <link rel="stylesheet" href="{{asset("css/myThemes.css")}}">
@endsection
@section('main_content')
<div class="col-4 mt-4">
    <h5>Edit Clientes</h5>
</div>
<div class="col-8 offset-2  mt-4 px-1">
    <div class="row m-0 no-gutters  shadow-lg  bg-dark border-0 text-light">
      <div class="col-lg-7 col-6 p-4" style="padding-bottom: 0 !important;">
        <h3 class="mb-0">{{$cliente->nombre_cliente}}</h3>
        <div class="mb-1 text-muted">Rut: {{$cliente->rut_cliente}}</div>
        <p class="card-text"><span class="text-danger">Deudor: </span>{{$cliente->entrega_pendiente}}</p>
        <p class="card-text mb-auto"><span class="text-danger">Fono: </span>{{$cliente->fono_cliente}}</p>
      </div>
    </div>
</div>
<div class="col-8 offset-2 mt-3 px-1">
    <form action="{{route('clientes.update',$cliente->rut_cliente)}}"  method="POST" enctype="multipart/form-data">
      @csrf
      @method('put')
      <div class="card bg-dark px-0 " >
        <div class="card-header text-light text-center mb-0 pb-0">
          <h4 style="font-weight: bold"> <i class="fas fa-edit fa-lg"></i> Editando cliente</h4>
        </div>
        <div class="card-body mt-0 pt-0">
            <div class="form-group text-light ">
                <label for="rut_cliente" style="color: rgb(255, 255, 255);">Rut:</label>
                <input type="text" name="rut_cliente" class="form-control bg-info border-0 " id="rut_cliente" value="{{$cliente->rut_cliente}}" >
            </div>    
            <div class="row text-light">
                <div class="form-group col-xl-4 col-md-12 text-light">
                    <label for="entrega_pendiente" class="text-light" style="color: rgb(15, 1, 1);">Entrega:</label>
                    <input type="text" name="entrega_pendiente" class="form-control bg-info border-0 " id="entrega_pendiente" placeholder="Ubicacion" value="{{$cliente->entrega_pendiente}}" >
                </div>

                <div class="form-group col-xl-4 col-md-12 text-light">
                    <label for="nombre_cliente" class="text-light" style="color: rgb(15, 1, 1);">Nombre:</label>
                    <input type="text" name="nombre_cliente" class="form-control bg-info border-0 " id="nombre_cliente" placeholder="Ubicacion" value="{{$cliente->nombre_cliente}}" >
                </div>
                <div class="form-group col-xl-4 col-md-12 text-light ">
                  <label for="fono_cliente" class="text-light" style="color: rgb(15, 1, 1);">Fono:</label>
                  <input type="text" name="fono_cliente" class="form-control bg-info border-0 " id="fono_cliente" placeholder="" value="{{$cliente->fono_cliente}}" >
              </div>
            </div>                              
            <div class="row w-100 m-0 d-flex" >
                <div class="col-lg-6 col-12 order-lg-2  order-1 px-0 pb-3 pt-2">
                  <a href="{{route('clientes.index')}}" class="btn btn-secondary w-100">Cancelar</a>
              </div>
                <div class=" col-lg-6 col-12 order-lg-2  order-1 px-0 pl-lg-1 pt-2 ">
                    <button type="submit" class="     btn btn-warning w-100">Editar</button>
                </div>                                
            </div>
        </div>
    </div>

  
    </form>
    
  
</div>
 

@endsection