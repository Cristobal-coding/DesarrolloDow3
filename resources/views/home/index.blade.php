@extends('layouts/master')
@section('css-personalizado')
    <link rel="stylesheet" href="{{asset("css/myThemes.css")}}">
@endsection
@section('main_content')
<div class="col d-flex justify-content-center align-items-start img-home ">
    <section class="py-5 text-center text-light" >
        <div class="row py-lg-5">
          <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light" style="font-weight: bold;">¡Consigue uno como este!</h1>
            <p class="lead  text-light mb-0">“Miré a mi alrededor y no encontré el auto de mis sueños por lo que decidí construirlo yo mismo.”</p>
              <a href="{{route("vehiculos.index")}}" class="btn btn-secondary text-light mb-2 mt-3">Ir Vehículos</a>
              <a href="{{route("arriendos.index")}}" class="btn btn-secondary text-light mb-2 mt-3">Ir Arriendos</a>
            </p>
          </div>
        </div>
      </section>
      
</div>
<div class="col-12 w-100 mx-0 px-0 my-container pb-4">
  {{-- <div class="d-md-flex flex-md-equal w-100">
    <div class="bg-dark mx-0 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
      <div class="my-3 py-3">
        <h2 class="display-5">Another headline</h2>
        <p class="lead">And an even wittier subheading.</p>
      </div>
      <div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 500px; border-radius: 21px 21px 0 0; background-image: url(../imgs/autorojo.jpg");></div>
    </div>
    <div class="bg-primary mx-0 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
      <div class="my-3 p-3 text-light">
        <h2 class="display-5">Another headline</h2>
        <p class="lead">And an even wittier subasdheading.</p>
      </div>
      <div class="bg-light shadow-sm mx-auto" style="width: 80%; height: 500px; border-radius: 21px 21px 0 0; background-image: url(../imgs/autoverde.jpg");></div>
    </div>
  </div> --}}
  <div class="my-card m-3">
    <div class="box">
      <div class="content p-2 text-center">
        <h2>01</h2>
        <h3>Vehículos</h3>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsum vitae blanditiis perspiciatis distinctio, quae officia maxime quam temporibus nesciunt! Ab ut eligendi libero aspernatur debitis alias? Maxime quaerat nobis commodi?</p>
        <a href="{{route('vehiculos.index')}}" class="text-light text-decoration-none">Ver más</a>
      </div>
    </div>
  </div>
  <div class="my-card m-3">
    <div class="box">
      <div class="content p-2 text-center">
        <h2>02</h2>
        <h3>Arriendos</h3>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsum vitae blanditiis perspiciatis distinctio, quae officia maxime quam temporibus nesciunt! Ab ut eligendi libero aspernatur debitis alias? Maxime quaerat nobis commodi?</p>
        <a href="{{route('arriendos.index')}}" class="text-light text-decoration-none">Ver más</a>
      </div>
    </div>
  </div>
  <div class="my-card m-3">
    <div class="box">
      <div class="content p-2 text-center">
        <h2>03</h2>
        <h3>Clientes</h3>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsum vitae blanditiis perspiciatis distinctio, quae officia maxime quam temporibus nesciunt! Ab ut eligendi libero aspernatur debitis alias? Maxime quaerat nobis commodi?</p>
        <a href="{{route('clientes.index')}}" class="text-light text-decoration-none">Ver más</a>
      </div>
    </div>
  </div>
</div>
@endsection
