<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
  <table class="table mt-2 table-bordered">
      <thead class="bg-secondary border-0 text-light">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Vendedor</th> 
          <th scope="col">Sucursal</th>                     
          <th scope="col">Nom. Cliente</th>                     
          <th scope="col">N° Vehículos</th> 
          <th scope="col">Estado</th> 
          <th scope="col">Total</th>                     
        </tr>
      </thead>    
      <tbody >
           @php
            $todos=($arriendos->count()-1);
            $cont=0; 
          @endphp
          @foreach ($arriendos as $arriendo)
            @php
                $acumulado+=$arriendo->total;             
            @endphp
            @if($arriendo->confirmada!=0)
              <tr>
                <td>{{$arriendo->id}}</td>
                <td>{{$arriendo->usuariovendedor->nombre}}</td>
                <td>{{$arriendo->sucursal->nombre}}</td>
                <td>{{$arriendo->cliente->nombre_cliente}}</td>
                <td class="text-center">{{count($arriendo->vehiculos)}}</td>
                <td>{{$arriendo->estado==0?'Vigente':'Finalizado'}}</td>
                <td>${{ number_format($arriendo->total,0,".",".")}}CLP</td>
              </tr>
              @endif
            @if($cont==$todos)
              <tr style="border: 0 !important;">
                <td  style="border: 0 !important;"></td>
                <td  style="border: 0 !important;"></td>
                <td  style="border: 0 !important;"></td>
                <td  style="border: 0 !important;"></td>
                <td  style="border: 0 !important;"></td>
                <td> Total a pagar:</td>
                <td>${{ number_format($acumulado,0,".",".")}}</td>
                {{-- <td  class="d-flex justify-content-end border" style="border-right:0 !important; border-top:0 !important;"> Total a pagar:</td>
                <td  class="border" style="border-left:0 !important;">${{ number_format($acumulado,0,".",".")}}</td> --}}
                </tr>
            @endif
            @php
              $cont+=1; 
            @endphp
         @endforeach
      </tbody>      
    </table>

    {{-- <div class="row">
      <div class="col-12 d-flex justify-content-end">
        <h6>${{ number_format($acumulado,0,".",".")}}CLP</h6>
      </div>
    </div> --}}
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
</body>
</html>
