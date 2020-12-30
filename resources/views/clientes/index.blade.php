@extends('layouts/master')
@section('css-personalizado')
    <link rel="stylesheet" href="{{asset("css/myThemes.css")}}">
@endsection
@section('main_content')
<div class="col-12 w-100 mx-0 px-0">
<div class="d-md-flex flex-md-equal w-100">
    <div class="bg-danger mx-0 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden"style="width: 80%; height: 1000px;)">
    <div class="col-lg-8 offset-lg-2 d-flex justify-content-center align-items-center">
        <a type="button" href="{{route("clientes.create")}}"class="btn btn-warning">Registrar un cliente.</a>
    </div>
    <div class="my-3 py-3"> 
        <h2 class="display-5">Clientes Registrados</h2>
        <p class="lead">Hasta ahora hay  <span style="color:red; font-weight: bold;">{{$clientes->count()}}</span> clientes registrados.</p>
    </div>
    <div class="bg-light mt-0 shadow-sm mx-auto" style="width: 80%; height: 500px; border-radius: 21px 21px 0 0;);">
        <table class="table mt-2 table-bordered table-striped">
            <thead class="bg-dark border-0 text-light">
                <tr>
                <th scope="col">Rut</th>
                <th scope="col">Nombre Cliente</th>
                <th scope="col">Fono</th>      
                <th scope="col">Gestionar</th>     
                </tr>
            </thead>
            <tbody class="mi-scrol">
                @foreach ($clientes as $num=>$cliente)
                    <tr>
                        <td>{{$cliente->rut_cliente}}</td>
                        <td>{{$cliente->nombre_cliente}}</td>
                        <td>{{$cliente->fono_cliente}}</td>
                        <td>
                            <div class="btn-group w-100 justify-content-center align-items-center" role="group" aria-label="Button group with nested dropdown">
                                <span class="pr-1" data-toggle="tooltip" title="Arriendos." data-placement="bottom">                               
                                    <a  href="{{route("clientes.show",$cliente->rut_cliente)}}" class="btn btn-success"><i class="far fa-eye fa-lg"></i></a>
                                </span>
                                <span class="pr-1" data-toggle="tooltip" title="Editar." data-placement="bottom">                               
                                    <a  href="{{route("clientes.edit",$cliente->rut_cliente)}}" class="btn btn-secondary"><i class="far fa-edit fa-lg"></i></a>
                                </span>
                                <span class="pl-1" data-toggle="tooltip" title="Borrar." data-placement="right">                               
                                    <a type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#borrarCliente{{$num}}"><i class="fas fa-trash fa-lg"></i></a>
                                </span>  
                                {{-- modal borrar --}}
                                <div class="modal fade text-light " id="borrarCliente{{$num}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content bg-dark" style="color: #fff;">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-trash fa-lg"></i>Confirmar Borrar Cliente ?</h5>
                                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true"><i class="fas fa-times border-0" style="color: #fff"></i></span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <i class="fas fa-exclamation-triangle fa-lg pr-2 text-warning"></i>¿Desea eliminar el cliente {{$cliente->nombre_cliente}}?
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <form method="POST" action="{{route("clientes.destroy",$cliente->rut_cliente)}}">
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
    </div>
</div>
    @endsection
    
      





