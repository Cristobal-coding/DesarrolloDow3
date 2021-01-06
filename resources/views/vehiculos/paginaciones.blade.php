@extends('layouts/master')
@section('css-personalizado')
    <link rel="stylesheet" href="{{asset("css/myThemes.css")}}">
@endsection
@section('main_content')
<div class="col-lg-8 col-10 offset-1 offset-lg-2">
  <div class="row m-0 pt-3 d-flex align-items-center justify-content-center">
    @for ($i=$start, $j=0;$j<$iteraciones;$i++,$j++)
        <div class="card m-2 shadow-lg px-0 border-0 rounded-lg" style="width:18rem" >
            <img src="{{Storage::url($vehiculos[$i]->foto)}}" class="img-top rounded-top" width="xl-285px" height="259.94px" >
            <div class="card-body d-flex flex-column flex-fill "  >                
                <h5 class="card-title overflow-hidden " style="text-overflow: ellipsis;
                    overflow: hidden; 
                    width: 260px; 
                    height: 1.2em; 
                    white-space: nowrap;">{{$vehiculos[$i]->marca}} {{$vehiculos[$i]->nombre_vehiculo}} {{$vehiculos[$i]->year}}</h5>
                <h6 class="text-primary">Patente: <span style="color: black">{{$vehiculos[$i]->patente}}</span></h6>
                <h6 class="text-primary">Tipo: <span style="color: black">{{$vehiculos[$i]->nombre_tipo}}</span></h6>
                <h6 class="text-primary">Estado: <span 
                @if($vehiculos[$i]->estado=="Disponible")    
                    style="color: #80EF10"
                @else 
                    @if($vehiculos[$i]->estado=="Arrendado")
                        style="color: #E8F20B "
                    @else
                        @if($vehiculos[$i]->estado=="En Mantenimiento")
                            style="color: #0B1EF2"
                        @else
                            @if($vehiculos[$i]->estado=="De Baja")
                                style="color: #F20B0B"
                            @else
                                @if($vehiculos[$i]->estado=="En Tramite")
                                    style="color: #f47cfd"
                                @endif
                            @endif
                        @endif
                    @endif
                @endif
                >{{$vehiculos[$i]->estado}}</span></h6>
                <div class="row m-0">
                    <div class="col-6 mb-1 px-0">
                        <a href="{{route("vehiculos.edit", $vehiculos[$i]->id)}}" class="btn btn-outline-dark w-100" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="far fa-edit fa-lg"></i></a>
                    </div>
                    <div class="col-6 mb-1 px-0">
                        @if($vehiculos[$i]->estado=='Arrendado' || $vehiculos[$i]->estado=='De Baja' || $vehiculos[$i]->estado=='En Mantenimiento' || Gate::denies('onlyAdmin'))
                        <span data-toggle="tooltip" data-placement="right" title="Eliminar">
                            <button class="btn btn-outline-dark w-100 disabled"><i class="fas fa-times-circle fa-lg"></i></button>
                         </span>
                        @else
                        <span data-toggle="tooltip" data-placement="right" title="Eliminar">
                           <button class="btn btn-outline-dark w-100" data-bs-toggle="modal" data-bs-target="#borrarVehiculo{{$vehiculos[$i]->id}}"><i class="fas fa-times-circle fa-lg"></i></button>
                        </span>
                        @endif
                    </div>
                    @if($vehiculos[$i]->estado=='Arrendado' || $vehiculos[$i]->estado=='De Baja' || $vehiculos[$i]->estado=='En Mantenimiento' || $vehiculos[$i]->estado=='En Tramite')
                        <div class="col-12 px-0">
                            <a class="btn btn-outline-primary w-100 disabled" ><i class="fas fa-shopping-cart fa-lg"></i> ${{number_format($vehiculos[$i]->tipo->valor_diario,0,".",".")}} CLP</a>        
                        </div>
                    @else
                    <div class="col-12 px-0">
                        <form action="{{route('arriendos.addCarrito',$vehiculos[$i]->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <button type="submit" class="btn btn-outline-primary w-100 @if(Gate::denies('bothRols')) disabled @endif"><i class="fas fa-shopping-cart fa-lg"></i> ${{number_format($vehiculos[$i]->tipo->valor_diario,0,".",".")}} CLP</button>
                        </form>
                    </div>

                    @endif
                </div>  
                <!-- Modal -->
                @if($vehiculos[$i]->estado!='Arrendado' || $vehiculos[$i]->estado!='De Baja' || $vehiculos[$i]->estado!='En Mantenimiento' || Gate::allows('onlyAdmin'))
                <div class="modal fade" id="borrarVehiculo{{$vehiculos[$i]->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{$vehiculos[$i]->marca}} {{$vehiculos[$i]->nombre_vehiculo}} {{$vehiculos[$i]->year}}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            ¿Desea borrar este Vehículo?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <form method="POST" action="{{route("vehiculos.destroy", $vehiculos[$i]->id)}}"  >
                                    @csrf
                                    @method('delete')   
                                    <button type="submit" class="btn btn-primary">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>              
                @endif
            </div>
        </div>
    @endfor
</div>
<div class="col-12 d-flex justify-content-center ">
    <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item">
            @if(Request::segments()[2]=="2")
            <a class="page-link"  href="{{route("vehiculos.index")}}" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
            </a>
            @else
            <a class="page-link" href="{{Request::segments()[2]-1}}" aria-label="Previous">
              <span aria-hidden="true">&laquo;</span>
            </a>
            @endif
          </li>
          @for($i=1; $i<=$totalInPage;$i++)
            @if($i==1)
            <li class="page-item"><a class="page-link" href="{{route("vehiculos.index")}}">{{$i}}</a></li>
            @else            
                <li class="page-item"><a class="page-link" href="{{route("vehiculos.paginas", $i)}}">{{$i}}</a></li>
            @endif
          @endfor
          @if($iteraciones>=6) 
          <li class="page-item">
            <a class="page-link" href="{{Request::segments()[2]+1}}" aria-label="Next">
              <span aria-hidden="true">&raquo;</span>
            </a>
          </li>
          @endif
        </ul>
      </nav>

</div>
            
</div>
@endsection