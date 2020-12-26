@extends('layouts/master')
@section('css-personalizado')
    <link rel="stylesheet" href="{{asset("css/myThemes.css")}}">
@endsection
@section('main_content')
<div class="col-lg-8 col-10 offset-1 offset-lg-2">
  <div class="row m-0 pt-3 d-flex align-items-center justify-content-center">
    @for ($i=$start, $j=0;$j<$iteraciones;$i++,$j++)
        <div class="card m-2 shadow-lg px-0 border-0 rounded-lg" style="width:18rem" >
            <img src="{{Storage::url($autos[$i]->foto)}}" class="img-top rounded-top" width="xl-285px" height="259.94px" >
            <div class="card-body d-flex flex-column flex-fill "  >                
                <h5 class="card-title">{{$autos[$i]->marca}} {{$autos[$i]->nombre_vehiculo}} {{$autos[$i]->year}}</h5>
                <h6 class="text-primary">Patente: <span style="color: black">{{$autos[$i]->patente}}</span></h6>
                <h6 class="text-primary">Tipo: <span style="color: black">{{$autos[$i]->nombre_tipo}}</span></h6>
                <h6 class="text-primary">Estado: <span 
                @if($autos[$i]->estado=="Disponible")    
                    style="color: #80EF10"
                @else 
                    @if($autos[$i]->estado=="Arrendado")
                        style="color: #E8F20B "
                    @else
                        @if($autos[$i]->estado=="En Mantenimiento")
                            style="color: #0B1EF2"
                        @else
                            @if($autos[$i]->estado=="De Baja")
                                style="color: #F20B0B"
                            @endif
                        @endif
                    @endif
                @endif
                >{{$autos[$i]->estado}}</span></h6>
                <div class="row m-0">
                    <div class="col-4 mb-1 px-0">
                        <a href="" class="btn btn-outline-dark w-100" data-toggle="tooltip" data-placement="top" title="Mas Detalles"><i class="fas fa-question-circle fa-lg "></i></a>
                    </div>
                    <div class="col-4 mb-1 px-0">
                        <a href="" class="btn btn-outline-dark w-100" data-toggle="tooltip" data-placement="top" title="Mas Detalles"><i class="far fa-edit fa-lg"></i></a>
                    </div>
                    <div class="col-4 mb-1 px-0">
                        <a href="" class="btn btn-outline-dark w-100" data-toggle="tooltip" data-placement="top" title="Mas Detalles"><i class="fas fa-times-circle fa-lg"></i></a>
                    </div>
                    <div class="col-12 px-0">
                        <a href="" class="btn btn-outline-primary w-100"><i class="fas fa-shopping-cart fa-lg"></i> ${{number_format($autos[$i]->tipo->valor_diario,0,".",".")}} CLP</a>
                    </div>
                </div>                
            </div>
        </div>
    @endfor
</div>
<div class="col-12 d-flex justify-content-center ">
    <nav aria-label="Page navigation example">
        <ul class="pagination">
          <li class="page-item">
            @if(Request::segments()[2]=="2")
            <a class="page-link"  href="{{route("autos.index")}}" aria-label="Previous">
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
            <li class="page-item"><a class="page-link" href="{{route("autos.index")}}">{{$i}}</a></li>
            @else            
                <li class="page-item"><a class="page-link" href="{{route("autos.paginas", $i)}}">{{$i}}</a></li>
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