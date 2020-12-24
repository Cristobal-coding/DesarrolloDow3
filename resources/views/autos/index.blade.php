@extends('layouts/master')
@section('css-personalizado')
    <link rel="stylesheet" href="{{asset("css/myThemes.css")}}">
@endsection
@section('main_content')
<div class="col-lg-8 col-10 offset-1 offset-lg-2">
    @php
    $numbers = array(1,2,3,4,5,6,);
    @endphp
        <div class="row m-0 pt-3">
        @foreach ($numbers as $num)
            <div class="card m-2 shadow-lg px-0">
                <img src="{{asset("../Imgs/fondoLogin1.jpg")}}" class="img-top w-100 mx-0" >
                <div class="card-body d-flex flex-column flex-fill "  >                
                        <h5 class="card-title">
                            Mazda MX-7
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
                                    <a href="" class="btn btn-primary"><i class="fas fa-shopping-cart"></i></a>
                            </div>
                        </div>    
                    
                                   
                </div>
        </div>
        @endforeach
            
</div>



@endsection