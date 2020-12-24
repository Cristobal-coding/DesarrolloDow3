@extends('layouts/master')

@section('main_content')
<div class="col-lg-8 offset-lg-2 d-flex justify-content-center align-items-center">
    <table class="table mt-2 table-bordered">
        <thead class="bg-dark border-0 text-light">
          <tr>
            <th scope="col">N°</th>
            <th scope="col">Rut</th>
            <th scope="col">Incio</th>
            <th scope="col">Vencimiento</th>
            <th scope="col">Entregada</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>20440649-9</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td class="text-center"><i class="fas fa-camera fa-lg"></i></td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
            <td class="text-center"><i class="fas fa-camera fa-lg"></i></td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Larry the Bird</td>
            <td>Renato</td>
            <td>@twitter</td>
            <td class="text-center"><i class="fas fa-camera fa-lg"></i></td>
          </tr>
        </tbody>
      </table>
</div>
    
@endsection