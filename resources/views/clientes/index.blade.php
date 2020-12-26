@extends('layouts/master')
@section('css-personalizado')
    <link rel="stylesheet" href="{{asset("css/myThemes.css")}}">
@endsection
@section('main_content')
<div class="col-4 mt-4">
    <h5>Clientes</h5>
</div>
<div class="row m-0 my-4">
    <div class="col-lg-4 offset-lg-4 col-12 offset-0">
      <a href="{{route("clientes.create")}}"class="btn btn-primary w-100 text-light shadow-lg"><i class="fas fa-user-alt"></i><i class="fas fa-plus"></i> Añadir Cliente</a>
    </div>
  </div>
  {{-- dentro de un foreach --}}
  <div class="col-lg-8 offset-lg-2 d-flex justify-content-center align-items-center">
      <table class="table mt-2 table-bordered">
          <thead class="bg-dark border-0 text-light">
            <tr>
              <th scope="col">Rut</th>
              <th scope="col">Nombre Cliente</th>
              <th scope="col">Entrega Pendiente</th>
              <th scope="col">Fono</th>      
              <th scope="col">Gestionar</th>     
            </tr>
          </thead>
          <tbody>
              @foreach ($clientes as $num=>$cliente)
                <tr>
                    <td>{{$cliente->rut_cliente}}</td>
                    <td>{{$cliente->nombre_cliente}}</td>
                    <th>{{$cliente->entrega_pendiente}}</th>
                    <td>{{$cliente->fono_cliente}}</td>
                    <td>
                        <div class="btn-group w-100 justify-content-center align-items-center" role="group" aria-label="Button group with nested dropdown">
                            <span class="pr-1" data-toggle="tooltip" title="Editar." data-placement="bottom">                               
                                <a  href="" class="btn btn-secondary"><i class="far fa-edit fa-lg"></i></a>
                            </span>
                            <span class="pl-1" data-toggle="tooltip" title="Borrar." data-placement="right">                               
                                <a type="button" class="btn btn-warning" data-toggle="modal" data-target="#borrarCliente{{$cliente->rut_cliente}}"><i class="fas fa-trash fa-lg"></i></a>
                            </span>  
                            {{-- modal borrar --}}
                            <div class="modal fade text-light bg-dark " id="borrarCliente{{$cliente->rut_cliente}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content bg-dark" style="color: #fff;">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-trash fa-lg"></i>Confirmar Borrar Cliente ?</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true"><i class="fas fa-times border-0" style="color: #fff"></i></span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <i class="fas fa-exclamation-triangle fa-lg pr-2 text-warning"></i>¿Desea eliminar el cliente {{$cliente->nombre_cliente}}?
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                    <form method="POST" action="{{route("clientes.destroy",$cliente->cliente)}}">
                                        @csrf
                                        @method("delete")
                                        <button type="submit" data-toggle="tooltip" title="Borrar" data-placement="right" class="btn btn-warning">Borrar Cliente</button>
                                    </form>
                                    </div>
                                </div>
                                </div>
                            </div>                
                        </div>
                    </td>
                
                </tr>
                 
              @endforeach        
          </tbody>
        </table>
@endsection

