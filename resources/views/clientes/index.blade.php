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
  {{-- dentro de un foreach --}}
  <div class="col-lg-8 offset-lg-2 d-flex justify-content-center align-items-center">
      <table class="table mt-2 table-bordered">
          <thead class="bg-dark border-0 text-light">
            <tr>
              <th scope="col">Rut</th>
              <th scope="col">Nombre Cliente</th>
              <th scope="col">Entrega Pendiente</th>
              <th scope="col">Fono</th>      
              <th scope="col">Gestionar</th>     
            </tr>
          </thead>
          <tbody>
            <tr>
                <td>20440649-9</td>
                <td>Otto</td>
                <th>No</th>
                <td>+5698985622569</td>
                <td>
                    <div class="btn-group w-100 justify-content-center align-items-center" role="group" aria-label="Button group with nested dropdown">
                        <span class="pr-1" data-toggle="tooltip" title="Editar." data-placement="bottom">                               
                            <a  href="" class="btn btn-secondary"><i class="far fa-edit fa-lg"></i></a>
                        </span>
                        <span class="pl-1" data-toggle="tooltip" title="Borrar." data-placement="right">                               
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#borrarDirector"><i class="fas fa-trash fa-lg"></i></button>
                        </span>                 
                     </div>
                 </td>
              
            </tr>
            
          </tbody>
        </table>
  
        
  

@endsection