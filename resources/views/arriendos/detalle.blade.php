@extends('layouts/master')

@section('main_content')
   {{-- <div class="col-12 px-4 pt-4 pb-0 shadow">
        <div class="row p-0 overflow-auto mi-scrol rounded" style="!important;">
            
        </div>
   </div> --}}
   <div class="col-lg-6 col-12 py-3 pr-2 overflow-auto mi-scrol d-flex order-lg-0 order-1 flex-column" style="overflow-x: hidden !important; min-height: 376px !important; max-height: 377px !important;">
    @foreach ($arriendo->vehiculos as $vehiculo)
    <div class="row px-1 mx-1 w-100 border-bottom shadow-sm w-100" >
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
                    <small class="px-2 d-block"><span class="text-primary">Tipo:</span> {{$vehiculo->tipo->nombre_tipo}}</small>
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
</div>
<div class="col-lg-6 col-12 d-flex order-0 flex-column">
    <div class="row pt-3 px-lg-4 border-bottom shadow-sm">
        <div class="col-6 border-right">
            <h6 class="text-primary">Usuario Vendedor: <br class="d-lg-none"> <span class="text-dark">{{$arriendo->usuariovendedor->nombre}}</span></h6>
        </div>
        <div class="col-6 ">
            <h6 class="text-primary">Rut Cliente: <br class="d-lg-none"> <span class="text-dark">{{$arriendo->rut_cliente}}</span></h6>
        </div>
    </div>
    <div class="row pt-3 px-lg-4 border-bottom shadow-sm">
        <div class="col-6 border-right">
            <h6 class="text-primary">Fecha Inicio: <br class="d-lg-none"> <span class="text-dark">{{date('d-m-Y',strtotime($arriendo->arriendo_fecha_inicio))}}</span></h6>
        </div>
        <div class="col-6">
            <h6 class="text-primary">Fecha Devolucion: <br class="d-lg-none"> <span class="text-dark">{{date('d-m-Y',strtotime($arriendo->arriendo_fecha_final))}}</span></h6>
        </div>
    </div>
    <div class="row pt-3 px-lg-4 border-bottom shadow-sm">
        <div class="col-6 border-right">
            <h6 class="text-primary">Fecha Entrega: <br class="d-lg-none"> <span class="text-dark">{{$arriendo->fecha_entrega_autos!=null?date('d-m-Y',strtotime($arriendo->fecha_entrega_autos)):'No entregado'}}</span></h6>
        </div>
        <div class="col-6">
            <h6 class="text-primary">Valor: <br class="d-lg-none"> <span class="text-dark">${{number_format($arriendo->total,0,".",".")}} CLP</span></h6>
        </div>
    </div>
    <div class="row pt-3 px-lg-4 border-bottom shadow-sm">
        @php
            $diff = (strtotime($arriendo->arriendo_fecha_inicio)-strtotime($arriendo->arriendo_fecha_final))/86400;
            if($arriendo->fecha_entrega_autos!=null){
                $atraso= (strtotime($arriendo->arriendo_fecha_final)-strtotime($arriendo->fecha_entrega_autos))/86400;
                $atraso = floor($atraso);
                if($atraso>=0){
                    $atraso=0;
                }
            }else {
                $atraso=0;
            }
            $diff = abs($diff);
            $diff = floor($diff);
        @endphp
        @for ($i =0,$acumulado=0; $i < count($arriendo->vehiculos) ; $i++)
            @php
                $acumulado+=$arriendo->vehiculos[$i]->tipo->valor_diario;
            @endphp           
        @endfor
        <div class="col-6 border-right">
            <h6 class="text-primary">Total Días: <br class="d-lg-none"> <span class="text-dark">{{$diff}}</span></h6>
        </div>
        <div class="col-6">
            <h6 class="text-primary">Valor Diario: <br class="d-lg-none"> <span class="text-dark">${{number_format($acumulado,0,".",".")}} CLP</span></h6>
        </div>
    </div>
    <div class="row pt-3 px-lg-4 border-bottom shadow-sm">
        <div class="col-6 border-right">
            <h6 class="text-primary">Cant. Vehículos: <br class="d-lg-none"> <span class="text-dark">{{count($arriendo->vehiculos)}}</span></h6>
        </div>
        <div class="col-6">
            <h6 class="text-primary">Sucursal: <br class="d-lg-none"> <span class="text-dark">{{$arriendo->sucursal->nombre}}</span></h6>
        </div>
    </div>
    <div class="row pt-3 px-lg-4 border-bottom shadow-sm">
        <div class="col-6">
            <h6 class="text-primary">Días Atraso: <br class="d-lg-none"> <span class="text-dark">{{abs($atraso)}}</span></h6>
        </div>
        
    </div>
</div>
@endsection