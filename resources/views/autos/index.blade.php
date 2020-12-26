@extends('layouts/master')
@section('css-personalizado')
    <link rel="stylesheet" href="{{asset("css/myThemes.css")}}">
@endsection
@section('main_content')
<div class="col-8 ">
    @php
    $numbers = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33);
    @endphp
        <div class="row m-0 pt-3 d-flex align-items-center justify-content-center">
            @for ($i=0;$i<$iteraciones;$i++)
                <div class="card m-2 shadow-lg px-0 border-0 rounded-lg" style="width:18rem" >
                    <img src="{{asset("../Imgs/fondoLogin1.jpg")}}" class="img-top rounded-top" width="xl-285px" height="259.94px" >
                    <div class="card-body d-flex flex-column flex-fill "  >                
                        <h5 class="card-title">Mazda MX-7 MIATA {{$numbers[$i]}}</h5>
                        <h6>$6000</h6>
                        <p class="card-text flex-fill">Lorem ipsum dolor sit amet consectetur adipisicing elit. In s</p>
                        <div class="col">
                            <?php
                            if (0 > 2) {
                            echo "Disponible";
                            }
                            else {
                                echo"No Disponible";
                            }
                            ?>
                        </div>
                        <div class="row m-0">
                            <div class="col-6">
                                    <a href="" class="btn btn-outline-dark w-100" data-toggle="tooltip" data-placement="top" title="Mas Detalles"><i class="fas fa-question-circle fa-lg "></i></a>
                            </div>
                            <div class="col-6">
                                    <a href="" class="btn btn-outline-primary w-100"><i class="far fa-clipboard"></i></a>
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
                    <li class="page-item"><a class="page-link" href="{{route("autos.index")}}">{{$i}}</a></li>
                    @else
                    <li class="page-item"><a class="page-link" href="{{route("autos.paginas", $i)}}">{{$i}}</a></li>
                    @endif
                  @endfor
                  
                  <li class="page-item">
                    <a class="page-link" href="{{route("autos.paginas",2)}}" aria-label="Next">
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
            <form action="{{route("autos.store")}}" method="POST">
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
                        <select class="form-control @error('director_id') is-invalid @enderror" name="nombre_tipo" id="nombre_tipo" style="color: #fff;">
                            @foreach ($tipos as $tipo)
                                <option value="{{$tipo->nombre_tipo}}">{{$tipo->nombre_tipo}}</option>                        
                            @endforeach                      
                        </select> 
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="año">Año:</label>
                            <select class="form-control @error('director_id') is-invalid @enderror" name="año" id="año" style="color: #fff;">                
                                <option value="{{$tipo->nombre_tipo}}">{{$tipo->nombre_tipo}}</option>                        
                            </select> 
                        </div>
                    </div>
                </div>
                <div class="row m-0 px-0">
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="formFileSm" class="form-label">Imagen del Vehículo:</label>
                            <input class="form-control form-control-sm" id="formFileSm" type="file">
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