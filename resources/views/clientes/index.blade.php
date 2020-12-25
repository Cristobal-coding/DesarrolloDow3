@extends('layouts/master')
@section('css-personalizado')
    <link rel="stylesheet" href="{{asset("css/myThemes.css")}}">
@endsection
@section('main_content')
<div class="col-4 mt-4">
    <h5>Clientes</h5>
</div>
<div class="row m-0 my-4">
    <div class="col-lg-4 offset-lg-4 col-12 offset-0">
      <a href=""class="btn btn-primary w-100 text-light shadow-lg"><i class="fas fa-user-alt"></i><i class="fas fa-plus"></i> Añadir Cliente</a>
    </div>
  </div>
  <div class="col-lg-8 offset-lg-2 d-flex justify-content-center align-items-center">
      <table class="table mt-2 table-bordered">
          <thead class="bg-dark border-0 text-light">
            <tr>
              <th scope="col">Rut</th>
              <th scope="col">Nombre Cliente</th>
              <th scope="col">Entrega Pendiente</th>
              <th scope="col">Fono</th>        
            </tr>
          </thead>
          <tbody>
            <tr>
                <td>20440649-9</td>
                <td>Otto</td>
                <th>No</th>
                <td>+5698985622569</td>
              
            </tr>
            
          </tbody>
        </table>
  
        
  

@endsection