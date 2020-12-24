@extends('layouts/master')
@section('css-personalizado')
    <link rel="stylesheet" href="{{asset("css/myThemes.css")}}">
@endsection
@section('main_content')
<div class="col-lg-8 col-10 offset-1 offset-lg-2">
    @php
    $numbers = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33);
    @endphp
        <div class="row m-0 pt-3 " style="">
        @for ($i=$start, $j=0;$j<$iteraciones;$i++,$j++)
            <div class="card m-2 shadow-lg px-0 border-0" style="width:18rem" >
                <img src="{{asset("../Imgs/fondoLogin1.jpg")}}" class="img-top rounded-top" width="xl-285px" height="259.94px" >
                <div class="card-body d-flex flex-column flex-fill "  >                
                        <h5 class="card-title">
                            Mazda MX-7 MIATA  {{$numbers[$i]}}
                        </h5>
                        <h6>
                            $6000 {{-- precio --}}
                        </h6>
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
                          <div class="col-6">
                                  <a href="" class="btn btn-outline-dark w-100" data-toggle="tooltip" data-placement="top" title="Mas Detalles"><i class="fas fa-question-circle fa-lg "></i></a>
                          </div>
                          <div class="col-6">
                                  <a href="" class="btn btn-outline-primary w-100"><i class="fas fa-plus fa-lg mr-2"></i><i class="fas fa-shopping-cart fa-lg"></i></a>
                          </div>
                      </div>                
                </div>
        </div>
        @endfor
        <div class="col-12 d-flex justify-content-center ">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                  <li class="page-item">
                    @if(Request::segments()[1]=="2")
                    <a class="page-link"  href="{{route("autos.index")}}" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                    @else
                    <a class="page-link" href="{{Request::segments()[1]-1}}" aria-label="Previous">
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
                    <a class="page-link" href="{{Request::segments()[1]+1}}" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                  @endif
                </ul>
              </nav>

        </div>
            
</div>
@endsection