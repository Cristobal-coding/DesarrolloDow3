@extends('layouts/master')
@section('css-personalizado')
    <link rel="stylesheet" href="{{asset("css/myThemes.css")}}">
@endsection
@section('main_content')
<div class="col-lg-4 offset-lg-4 col-12 offset-0 my-4">
  <a href="{{route("arriendos.create")}}"class="btn btn-primary w-100 text-light shadow-lg"><i class="fas fa-plus"></i> Generar nueva orden</a>
</div>
  @if(Session::has('mensaje'))
    <div class="col-6 offset-4">
        <h6 class="text-primary"><i class="fas fa-info-circle fa-lg mr-1"></i>{{Session::get('mensaje')}}</h6>
    </div>
  @endif

<div class="col-lg-8 offset-lg-2 d-flex justify-content-center align-items-center">
    
    <table class="table mt-2 table-bordered table-striped ">
        <thead class="bg-dark border-0 text-light">
          <tr>
            <th scope="col">N°</th>
            <th scope="col">Rut</th>
            <th scope="col">Incio</th>
            <th scope="col">Vencimiento</th>
            <th scope="col">Detalles de la ordens</th>        
          </tr>
        </thead>
        <tbody class="mi-scrol">
          @foreach ($arriendos as $arriendo )
          <tr>
            <th scope="row">{{$arriendo->id}}</th>
            <td>{{$arriendo->rut_cliente}}</td>
            <td>
              {{$arriendo->cliente->nombre_cliente}}
            </td>
            <td>
              {{$arriendo->arriendo_fecha_final}} 
            </td>   
            <td class="text-center">
              <span class="pr-1" data-toggle="tooltip" title="Detalles Orden." data-placement="bottom">                               
                <a  href="" class="btn btn-secondary"><i class="fas fa-info-circle"></i></a>
              </span>

              <span class="" data-toggle="tooltip" title="Editar." data-placement="bottom">                               
                <a  href="" class="btn btn-secondary"><i class="far fa-edit fa-lg"></i></a>
              </span>
              <span class="pl-1" data-toggle="tooltip" title="Borrar." data-placement="right">                               
                <a type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#borrarCliente{{$arriendo->id}}"><i class="fas fa-trash fa-lg"></i></a>
               </span>  
               {{-- modal borrar --}}
               <div class="modal fade text-light " id="borrarCliente{{$arriendo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                      <div class="modal-content bg-dark" style="color: #fff;">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-trash fa-lg"></i>Confirmar Borrar Arriendo ?</h5>
                              <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true"><i class="fas fa-times border-0" style="color: #fff"></i></span>
                              </button>
                          </div>
                          <div class="modal-body">
                              <div class="d-flex align-items-center justify-content-center">
                                  <i class="fas fa-exclamation-triangle fa-lg pr-2 text-warning"></i>¿Desea eliminar el arriendo?
                              </div>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                              <form method="POST" action="{{route("arriendos.destroy",$arriendo->id)}}">
                                  @csrf
                                  @method("delete")
                                  <button type="submit" data-toggle="tooltip" title="Borrar" data-placement="right" class="btn btn-warning">Borrar Arriendo</button>
                              </form>
                          </div>
                      </div>
                </div>
             </div>   
            </td>
          </tr>
          

          @endforeach
          
          
        </tbody>
      </table>

      




</div>

@endsection