@extends('layouts/master')
@section('css-personalizado')
    <link rel="stylesheet" href="{{asset("css/myThemes.css")}}">
@endsection
@section('main_content')
<div class="col d-flex justify-content-center align-items-center img-home vh-100">
    <section class="py-5 text-center  text-light" >
        <div class="row py-lg-5">
          <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">¡Consigue uno como este!</h1>
            <p class="lead  text-light mb-0">“Miré a mi alrededor y no encontré el auto de mis sueños por lo que decidí construirlo yo mismo.”</p>
              <a href="#" class="btn btn-secondary text-light mb-2 mt-3">Ir Vehículos</a>
              <a href="#" class="btn btn-secondary text-light mb-2 mt-3">Ir Arriendos</a>
            </p>
          </div>
        </div>
      </section>

</div>
@endsection