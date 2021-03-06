@extends('layouts/master')
@section('css-personalizado')
    <link rel="stylesheet" href="{{asset("css/myThemes.css")}}">
@endsection
@section('main_content')



{{-- <div class="col-6 offset-4">
</div> --}}

<div class="col-12 w-100 mx-0 px-0">
  <div class="row">
    <div class="col-8 offset-2 text-center pt-3">
      <a href="{{route("arriendos.create")}}"class="btn btn-primary text-light shadow-lg @if(Gate::denies('noMakeArriendo')) disabled @endif"><i class="fas fa-plus"></i> Generar nueva orden</a>
    </div>
  </div>
  <div class="row">
    <div class="col-6 offset-3 text-center">
      <h2 class="display-5">Ordenes</h2>
      <p class="lead">Hasta ahora hay  <span style="color:red; font-weight: bold;">{{$arriendos->count()}}</span> Ordenes.</p>
  </div>
  </div>
  
  {{-- ojo con este, es intermedio --}}
  @if(Session::has('mensaje'))
  <div class="row">
    <div class="col-6 offset-3 text-center">
      <h6 class="text-primary"><i class="fas fa-info-circle mr-1"></i>{{Session::get('mensaje')}} <i class="fas fa-arrow-up fa-lg ml-1"></i></h6>
    </div>
  </div>
  @endif
  @if ($errors->any())                    
    @foreach ($errors->all() as $error)
      <div class="row">
        <div class="col-6 offset-3 text-center">

          <p class="text-secondary"><i class="fas fa-info-circle mr-1"></i>{{ $error }}</p>
        </div>
      </div>   
    @endforeach
  @endif

  <div class="row">
    <div class="col-lg-10 offset-lg-1">
      <table class="table mt-2 table-bordered table-striped ">
        <thead class="bg-dark border-0 text-light">
          <tr>
            <th scope="col">Rut Cliente</th>
            <th scope="col">Nombre Cliente</th>

            <th scope="col">Usuario Vendedor</th>
            <th scope="col">Estado</th>
            <th scope="col">Total</th>
            <th scope="col">Gestionar</th>        
          </tr>
        </thead>
        <tbody class="mi-scrol">
          @if(count($arriendos)!=null)
            @foreach ($arriendos as $arriendo )
            <tr>
              <td>{{$arriendo->rut_cliente}}</td>
              <td>
                {{$arriendo->cliente->nombre_cliente}}
              </td>
              <td>
                {{$arriendo->usuariovendedor->nombre}} 
              </td>   
              <th scope="row">@if($arriendo->confirmada==0) En Curso @else {{$arriendo->estado==1?'Vigente':'Finalizada'}}@endif</th>
              <td>
                @if($arriendo->confirmada==0) En Curso @else ${{number_format($arriendo->total,0,".",".")}} CLP @endif
                
              </td>   
              <td class="text-center">
                <span class="pr-1" data-toggle="tooltip" title="Detalles Orden." data-placement="bottom">                               
                  <a  href="{{route('arriendos.show',$arriendo->id)}}" class="btn btn-success"><i class="fas fa-info-circle fa-lg"></i></a>
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
          @else
          <tr class="text-center border-0 bg-light">
            <td colspan="6" rowspan="1" class="text-center">
                <div class="alert alert-primary mb-0 w-100 border-o " role="alert">
                    Aun no se ha han creado arriendos
                </div>
            </td>
        </tr>
          @endif              
        </tbody>
      </table>
    </div>
  </div>
</div>


    
    
    
  
@endsection

          

    
    