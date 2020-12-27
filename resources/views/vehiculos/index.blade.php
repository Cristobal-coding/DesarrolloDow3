@extends('layouts/master')
@section('css-personalizado')
    <link rel="stylesheet" href="{{asset("css/myThemes.css")}}">
@endsection
@section('main_content')
<div class="col-8 ">
    <div class="row m-0 pt-3 d-flex align-items-center justify-content-center">
        @for ($i=0;$i<$iteraciones;$i++)
            <div class="card m-2 shadow-lg px-0 border-0 rounded-lg" style="width:18rem" >
                <img src="{{Storage::url($vehiculos[$i]->foto)}}" class="rounded-top img-fluid" width="xl-285px" min-height="" style="min-height:259.94px !important; " >
                <div class="card-body d-flex flex-column flex-fill "  >                
                    <h5 class="card-title">{{$vehiculos[$i]->marca}} {{$vehiculos[$i]->nombre_vehiculo}} {{$vehiculos[$i]->year}}</h5>
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
                                @endif
                            @endif
                        @endif
                    @endif
                    >{{$vehiculos[$i]->estado}}</span></h6>
                    <div class="row m-0">
                        <div class="col-4 mb-1 px-0">
                            <a href="" class="btn btn-outline-dark w-100" data-toggle="tooltip" data-placement="left" title="Mas Info."><i class="fas fa-question-circle fa-lg "></i></a>
                        </div>
                        <div class="col-4 mb-1 px-0">
                            <a href="{{route("vehiculos.edit", $vehiculos[$i]->id_vehiculo)}}" class="btn btn-outline-dark w-100" data-toggle="tooltip" data-placement="bottom" title="Editar"><i class="far fa-edit fa-lg"></i></a>
                        </div>
                        <div class="col-4 mb-1 px-0">
                            <span data-toggle="tooltip" data-placement="right" title="Eliminar">
                               <button class="btn btn-outline-dark w-100" data-bs-toggle="modal" data-bs-target="#borrarVehiculo{{$vehiculos[$i]->id_vehiculo}}"><i class="fas fa-times-circle fa-lg"></i></button>
                            </span>
                        </div>
                        <div class="col-12 px-0">
                            <form action="{{route('arriendos.addCarrito',$vehiculos[$i]->id_vehiculo)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <button type="submit" class="btn btn-outline-primary w-100"><i class="fas fa-shopping-cart fa-lg"></i> ${{number_format($vehiculos[$i]->tipo->valor_diario,0,".",".")}} CLP</button>
                            </form>
                        </div>
                    </div> 
                    
                    <!-- Modal -->
                    <div class="modal fade" id="borrarVehiculo{{$vehiculos[$i]->id_vehiculo}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <form method="POST" action="{{route("vehiculos.destroy", $vehiculos[$i]->id_vehiculo)}}"  >
                                        @csrf
                                        @method('delete')   
                                        <button type="submit" class="btn btn-primary">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
    </div>
    
    <div class="col-12 d-flex justify-content-center ">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                @for($i=1; $i<=$totalInPage;$i++)
                @if($i==1)
                <li class="page-item"><a class="page-link" href="{{route("vehiculos.index")}}">{{$i}}</a></li>
                @else
                <li class="page-item"><a class="page-link" href="{{route("vehiculos.paginas", $i)}}">{{$i}}</a></li>
                @endif
                @endfor
                
                <li class="page-item">
                <a class="page-link" href="{{route("vehiculos.paginas",2)}}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
                </li>
                
            </ul>
            </nav>
    </div>   
</div>

<div class="col-4">
    <div class="card mt-3">
        <div class="card-body p-0 pt-2">
            <form action="{{route("vehiculos.store")}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row m-0 px-0">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input class="form-control" type="text" name="nombre" id="nombre">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="marca">Marca:</label>
                            <input class="form-control" type="text" name="marca" id="marca">
                        </div>
                    </div>
                </div>
                <div class="row m-0 px-0">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="patente">Patente:</label>
                            <input class="form-control" type="text" name="patente" id="patente">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="estado">Estado:</label>
                            <input class="form-control" type="text" name="estado" id="estado">
                        </div>
                    </div>
                </div>
                <div class="row m-0 mb-3 px-0">
                    <div class="col-6">
                        <label for="nombre_tipo" id="nombre_tipo" name="nombre_tipo">Tipo Vehículo:</label>
                        <select class="form-control mi-scrol @error('director_id') is-invalid @enderror" name="nombre_tipo" id="nombre_tipo" >
                            @foreach ($tipos as $tipo)
                                <option value="{{$tipo->nombre_tipo}}">{{$tipo->nombre_tipo}}</option>                        
                            @endforeach                      
                        </select> 
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="año">Año:</label>
                            <select class="form-control mi-scrol @error('director_id') is-invalid @enderror" name="año" id="año" >                
                                @foreach ($años as $año)
                                    <option value="{{$año}}">{{$año}}</option>
                                @endforeach                       
                            </select> 
                        </div>
                    </div>
                </div>
                <div class="row m-0 px-0">
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="foto" class="form-label">Imagen del Vehículo:</label>
                            <input class="form-control form-control-sm" id="foto" type="file" name="foto">
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

@endsection