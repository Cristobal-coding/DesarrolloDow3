@extends('layouts/master')
@section('css-personalizado')
    <link rel="stylesheet" href="{{asset("css/myThemes.css")}}">
@endsection
@section('main_content')



  <div class="col-12 w-100 mx-0 px-0">
    <div class="d-md-flex flex-md-equal w-100">
        <div class="bg-danger mx-0 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden"style="width: 80%; height: 1500px;)">
          <div class="col-lg-4 offset-lg-4 col-12 offset-0 my-4">
            <a href="{{route("arriendos.create")}}"class="btn btn-primary w-100 text-light shadow-lg"><i class="fas fa-plus"></i> Generar nueva orden</a>
          </div>
            @if(Session::has('mensaje'))
              <div class="col-6 offset-4">
                  <h6 class="text-primary"><i class="fas fa-info-circle fa-lg mr-1"></i>{{Session::get('mensaje')}} <i class="fas fa-long-arrow-alt-up fa-lg ml-1"></i></h6>
              </div>
            @endif
        <div class="my-3 py-3"> 
            <h2 class="display-5">Ordenes</h2>
            <p class="lead">Hasta ahora hay  <span style="color:red; font-weight: bold;">{{$arriendos->count()}}</span> Ordenes.</p>
        </div>
        <div class="bg-light mt-0 shadow-sm mx-auto" style="width: 80%; height: 500px; border-radius: 21px 21px 0 0;);">
          <table class="table mt-2 table-bordered table-striped ">
            <thead class="bg-dark border-0 text-light">
              <tr>
                <th scope="col">Rut Cliente</th>
                <th scope="col">Nombre Cliente</th>
    
                <th scope="col">Usuario Vendedor</th>
                <th scope="col">Estado</th>
                <th scope="col">Gestionar</th>        
              </tr>
            </thead>
            <tbody class="mi-scrol">
              @foreach ($arriendos as $arriendo )
              <tr>
                <td>{{$arriendo->rut_cliente}}</td>
                <td>
                  {{$arriendo->cliente->nombre_cliente}}
                </td>
                <td>
                  {{$arriendo->usuariovendedor->nombre}} 
                </td>   
                <th scope="row">{{$arriendo->estado==1?'Vigente':'Finalizada'}}</th>
                <td class="text-center">
                  <span class="pr-1" data-toggle="tooltip" title="Detalles Orden." data-placement="bottom">                               
                    <a  href="" class="btn btn-secondary"><i class="fas fa-info-circle fa-lg"></i></a>
                  </span>
    
                  <span class="" data-toggle="tooltip" title="Editar." data-placement="bottom">                               
                    <a  href="{{route('arriendos.edit',$arriendo->id)}}" class="btn btn-secondary"><i class="far fa-edit fa-lg"></i></a>
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

          

    
    