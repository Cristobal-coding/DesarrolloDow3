@extends('layouts/master')

@section('main_content')
    <div class="col-lg-7 offset-lg-2 mt-4 px-0">
        <div class="row px-0 mx-0">
            <div class="col-lg-6 col-7">
                <h5><i class="fas fa-shopping-cart mr-2"></i>Carrito @if(count($arriendos[0]->vehiculos)!=null)({{count($arriendos[0]->vehiculos)}} Vehículos) @endif</h5>
            </div>
            @if(count($arriendos[0]->vehiculos)!=null)
            <div class="col-lg-6 col-5 text-right">
                <a href="{{route("vehiculos.index")}}" class="text-decoration-none text-primary text-right">Continuar Viendo<i class="fas fa-long-arrow-alt-right"></i></a>
            </div>
            @endif
        </div>
       
    </div>
    <div class="col-lg-7 offset-lg-2 mt-4  shadow-lg mb-5">
        @if(count($arriendos[0]->vehiculos)==null)
        <div class="row">
            <div class="col-lg-1 col-3 d-flex justify-content-center align-items-center">
                <i class="fas fa-info-circle fa-3x text-dark"></i>
            </div>
            <div class="col-lg-11 col-9 p-3">
                <h5 class="text-primary">Tu Carrito esta vacío</h5>  
                <h6>Solo tienes que llenarlo y arrendar tu vehículo favorito. <a href="{{route('vehiculos.index')}}" class="text-decoration-none text-secondary">Continuar Viendo <i class="fas fa-long-arrow-alt-right"></i></a></h6>

            </div>
        </div>
        @else
         <div class="row mb-3">
                <div class="col-12 py-0 text-right pt-3">
                    <button class="btn text-primary">Tramitar Pedido<i class="fas fa-long-arrow-alt-right"></i></button>
                </div>
            </div>
            @foreach ($arriendos[0]->vehiculos as $vehiculo )
                
            <div class="row px-0 mx-0 border-top">
                {{-- imagen --}}
                <div class="col-4 py-2 px-0 rounded">
                    <div class="card border-0 rounded">
                        <div class="card-body p-0 border-0 rounded">
                            <img src="{{Storage::url($vehiculo->foto)}}" alt="" class="img-fluid rounded w-100" style="max-height: 155px !important;">
                        </div>
                    </div>
                </div>
                {{-- /imagen --}
                {{-- informacion --}}
                <div class="col-5 px-1 ">
                    <div class="row">
                        <div class="col-12 px-3 pt-3 my-0">
                            <h6 class="px-2" style="font-weight: bold">{{$vehiculo->marca}} {{$vehiculo->nombre_vehiculo}}</h6>
                        </div>
                        <div class="col-12 px-3 my-0">
                            <small class="px-2"><span class="text-primary">Patente:</span>{{$vehiculo->patente}}</small>
                            <small class="px-2"><span class="text-primary">Tipo:</span> {{$vehiculo->tipo->nombre_tipo}}</small>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12 px-3 my-0">
                            <small class="px-2"><span class="text-primary">Año:</span> {{$vehiculo->year}}</small>
                        </div>
                    </div>
                </div>
                {{-- /informacion --}}
                {{-- precio --}}
                <div class="col-3 px-1">
                    <div class="row">
                        <div class="col-10 text-right px-0">
                            <h5 class="px-2 mt-3">${{number_format($vehiculo->tipo->valor_diario,0,".",".")}} CLP</h5>
                        </div>
                        <div class="col-2 px-0 d-flex justify-content-center">
                            <form action="{{route("arriendos.removecart",$vehiculo->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn mt-2"><i class="fas fa-times"></i></button>
                            </form>
                        </div>
                            
                    </div>
                
                </div>
                {{-- /precio --}}
            </div>
            @endforeach
            <div class="row border-top border-bottom mt-2 mb-5 px-0 mx-0">
                <div class="col-8 py-3">
                    <h6 class="d-inline pr-1"><span class="text-primary">Cliente:</span> {{$arriendos[0]->cliente->nombre_cliente}}</h6>
                    <h6 class="d-inline"><span class="text-primary">Rut:</span> {{$arriendos[0]->rut_cliente}}</h6>
                    <h6 class="mt-1"><span class="text-primary">Fecha de Devolución:</span> 25/12/30</h6>
    
                </div>
                <div class="col-4 text-right py-3">
                    @for ($i =0,$acumulado=0; $i < count($arriendos[0]->vehiculos) ; $i++)
                        @php
                        $acumulado+=$arriendos[0]->vehiculos[$i]->tipo->valor_diario;
                        @endphp           
                    @endfor
                    <h5 class="text-primary">Total ${{number_format($acumulado,0,".",".")}} CLP</h5>
                </div>
                <div class="col-lg-6 col-5 text-left py-3">
                    <form action="{{route('arriendos.removeAll',$arriendos[0]->id)}}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-dark d-lg-inline d-none"><i class="fas fa-times"></i> Cancelar todo</button>
                        <button type="submit" class="btn btn-dark d-lg-none w-100"><i class="fas fa-times"></i> Cancelar</button>
                    </form>
                </div>
                <div class="col-lg-6 col-7 text-right py-3">
                    <button class="btn btn-primary"><i class="fas fa-shopping-cart mr-1"></i> Tramitar Pedido <i class="fas fa-long-arrow-alt-right ml-1"></i></button>
                </div>
            </div>
        @endif
        {{-- <div class="row px-0 mx-0 border-top">
    
            <div class="col-4 py-2 px-0 rounded">
                <div class="card border-0 rounded">
                    <div class="card-body p-0 border-0 rounded">
                        <img src="./imgs/ranger.jpg" alt="" class="img-fluid rounded">
                    </div>
                </div>
            </div>
 
            <div class="col-5 px-1 ">
                <div class="row">
                    <div class="col-12 px-3 pt-3 my-0">
                        <h6 class="px-2" style="font-weight: bold">Mazda MX-7</h6>
                    </div>
                    <div class="col-12 px-3 my-0">
                        <small class="px-2"><span class="text-primary">Patente:</span> HG-KJ-09</small>
                        <small class="px-2"><span class="text-primary">Tipo:</span> Coupe</small>
                    </div>

                </div>
                <div class="row">
                    <div class="col-12 px-3 my-0">
                        <small class="px-2"><span class="text-primary">Año:</span> 2019</small>
                    </div>
                </div>
            </div>
          
            <div class="col-3 px-1">
                <div class="row">
                    <div class="col-10 text-right px-0">
                        <h5 class="px-2 mt-3">$40.670 CLP</h5>
                    </div>
                    <div class="col-2 px-0 d-flex justify-content-center">
                        <button class="btn mt-2"><i class="fas fa-times"></i></button>
                    </div>
                        
                </div>
               
            </div>
          
        </div> --}}

        
        
        
        
       
    </div>
@endsection