@extends('layouts/master')

@section('main_content')



<div class="col-lg-8 offset-lg-2 flex justify-content-center align-items-center mt-4">
    <form class="" method="POST" action="">
        @csrf
        <div class="card bg-dark px-0 " >
          <div class="card-header text-light text-center mb-0 pb-0">
            <h4 style="font-weight: bold"> <i class="fas fa-plus"></i> Crear nueva orden</h4>
          </div>
          <div class="card-body mt-0 pt-0">
              <div class="form-group text-light ">
                  <label for="rut_cliente" style="color: rgb(255, 255, 255);">Nombre:</label>
                  <select class="form-control bg-info border-0" name="pais" id="pais" style="color: rgb(14, 13, 13);">
                    @foreach ($clientes as $cliente)
                     <option value="">{{$cliente->nombre_cliente}}, Rut: {{$cliente->rut_cliente}}</option>
                    @endforeach
                    
                    
                  </select>                
              </div>         
              <div class="row text-light">
                  {{-- <div class="form-group col-xl-6 col-md-12 text-light">
                      <label for="id_vehiculo" class="text-light" style="color: rgb(15, 1, 1);">ID Vehiculo:</label>
                      <input type="text" name="id_vehiculo" class="form-control bg-info border-0 text-light" id="id_vehiculo" placeholder="0001" value="" >
                  </div> --}}
                  {{-- VALIDAR LAS FECHAS --}}
                  <div class="form-group col-xl-6 col-md-12 text-light ">
                    <label for="arriendo_fecha_inicio" class="text-light" style="color: rgb(15, 1, 1);">Fecha Entrega:</label>
                    <input type="date" name="arriendo_fecha_inicio" class="form-control bg-info border-0 text-light" id="arriendo_fecha_inicio" placeholder="" value="" >
                 </div>
                  <div class="form-group col-xl-6 col-md-12 text-light ">
                    <label for="arriendo_fecha_final" class="text-light" style="color: rgb(15, 1, 1);">Fecha devolucion :</label>
                    <input type="date" name="arriendo_fecha_final" class="form-control bg-info border-0 text-light" id="arriendo_fecha_final" placeholder="" value="" >
                  </div>
              </div>                                                      
              <div class="row w-100 m-0 d-flex" >
                  <div class="col-lg-6 col-12 order-lg-2  order-1 px-0 pb-3 pt-2">
                    <a href="{{route('arriendos.index')}}" class="btn btn-secondary w-100">Cancelar</a>
                </div>
                  <div class=" col-lg-6 col-12 order-lg-2  order-1 px-0 pl-lg-1 pt-2 ">
                      <button type="submit" class=" btn btn-warning w-100">Siguiente</button>
                  </div>                                
              </div>
          </div>
      </div>      
      </form>
</div>
    
@endsection