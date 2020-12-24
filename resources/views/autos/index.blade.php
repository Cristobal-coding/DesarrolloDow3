@extends('layouts/master')
@section('css-personalizado')
    <link rel="stylesheet" href="{{asset("css/myThemes.css")}}">
@endsection
@section('main_content')
<div class="col-lg-8 col-10 offset-1 offset-lg-2">
    @php
    $numbers = array(1,2,3,4,5,6,7,8,9,10,11);
    @endphp
        <div class="row m-0 pt-3">
        @for ($i=0;$i<$elementos;$i++)
            <div class="card m-2 shadow-lg px-0" style="width:18rem" >
                <img src="{{asset("../Imgs/fondoLogin1.jpg")}}" class="img-top" width="xl-285px" height="259.94px" >
                <div class="card-body d-flex flex-column flex-fill "  >                
                        <h5 class="card-title">
                            -Mazda MX-7 MIATA {{$numbers[0]}}
                        </h5>
                        <p class="card-text flex-fill">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. In                       
                        </p>
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
                            <div class="col mb-2 px-0">
                                    <a href="" class="btn btn-dark" data-toggle="tooltip" data-placement="top" title="Mas Detalles" > <i class="fas fa-question-circle fa-3x "></i></a>
                            </div>
                            <div class="col mb-2">
                                    <a href="" class="btn btn-primary">Agregar a la Orden</a>
                            </div>
                        </div>                
                </div>
        </div>
        @endfor
        <div class="col-12 d-flex justify-content-center ">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  @for($i=1; $i<=$totalInPage;$i++)
                    @if($i==1)
                    <li class="page-item"><a class="page-link" href="{{route("autos.index")}}">{{$i}}</a></li>
                    @else
                    <li class="page-item"><a class="page-link" href="{{route("autos.paginas", $i)}}">{{$i}}</a></li>
                    @endif
                  @endfor
                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                </ul>
              </nav>

        </div>
            
</div>



@endsection