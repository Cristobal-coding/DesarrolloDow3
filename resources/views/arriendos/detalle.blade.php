@extends('layouts/master')
@section('css-personalizado')
    <link rel="stylesheet" href="{{asset("css/myThemes.css")}}">
@endsection
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
            <div class="row">
                <div class="col-6 px-3 my-0 text-center">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fotoArriendo{{$vehiculo->id}}">
                        <i class="fas fa-camera"></i>
                    </button>
                    <small class="d-block">Foto Arriendo</small>
                </div>
                <div class="col-6 px-3 my-0 text-center">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fotoEntrega{{$vehiculo->id}}">
                        <i class="fas fa-camera"></i>
                    </button>
                    <small class="d-block">Foto Entrega</small>
                </div>
            </div>
        </div>
        
        {{-- /informacion --}}
        {{-- precio --}}
        <div class="col-3 px-1">
            <div class="row">
                <div class="col-12 text-right px-0">
                    <h5 class="px-2 mt-3">${{number_format($vehiculo->tipo->valor_diario,0,".",".")}} CLP</h5>
                </div>
                
                    
            </div>
        
        </div>
        {{-- /precio --}}
        <!-- Modal Foto Arriendo -->
        <div class="modal fade" id="fotoArriendo{{$vehiculo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{$vehiculo->marca}} {{$vehiculo->nombre_vehiculo}} arriendo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if($vehiculo->pivot->foto_arriendo==null)
                    <h6 class="text-primary"><i class="fas fa-info-circle mr-1 fa-lg"></i>Este vehiculo aún no ha sido entregado al cliente.</h6>
                    @else
                    <img src="{{Storage::url($vehiculo->pivot->foto_arriendo)}}" alt="{{$vehiculo->id_vehiculo}}" class="img-fluid">
                   @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary text-light w-100" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
            </div>
        </div>
        <!-- Modal de Foto Entrega -->
        <div class="modal fade" id="fotoEntrega{{$vehiculo->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{$vehiculo->marca}} {{$vehiculo->nombre_vehiculo}} entrega</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                @if($vehiculo->pivot->foto_entrega==null)
                 <h6 class="text-primary"><i class="fas fa-info-circle mr-1 fa-lg"></i>Este vehículo aún no ha sido devuelto.</h6>
                 @else
                 <img src="{{Storage::url($vehiculo->pivot->foto_entrega)}}" alt="{{$vehiculo->id_vehiculo}}" class="img-fluid">
                @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary text-light w-100" data-bs-dismiss="modal">Cerrar</button>
               
                </div>
            </div>
            </div>
        </div>
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
            <h6 class="text-primary">Fecha Inicio: <br class="d-lg-none"> <span class="text-dark">{{date('d-m-Y',strtotime($arriendo->fecha_recogida))}}</span></h6>
        </div>
        <div class="col-6">
            <h6 class="text-primary">Fecha fin: <br class="d-lg-none"> <span class="text-dark">{{date('d-m-Y',strtotime($arriendo->fecha_devolucion))}}</span></h6>
        </div>
    </div>
    <div class="row pt-3 px-lg-4 border-bottom shadow-sm">
        <div class="col-6 border-right">
            <h6 class="text-primary">Fecha Devolución: <br class="d-lg-none"> <span class="text-dark">{{$arriendo->fecha_recepcion_vehiculos!=null?date('d-m-Y',strtotime($arriendo->fecha_recepcion_vehiculos)):'No devueltos'}}</span></h6>
        </div>
        <div class="col-6">
            <h6 class="text-primary">Hora: <br class="d-lg-none"> <span class="text-dark">{{$arriendo->fecha_recepcion_vehiculos!=null?date('H:i',strtotime($arriendo->fecha_recepcion_vehiculos)):'No devueltos'}}</span></h6>
        </div>
    </div>
    <div class="row pt-3 px-lg-4 border-bottom shadow-sm">
        @php
            $diff = (strtotime($arriendo->fecha_recogida)-strtotime($arriendo->fecha_devolucion))/86400;
            if($arriendo->fecha_entrega_autos!=null){
                $atraso= (strtotime($arriendo->fecha_devolucion)-strtotime($arriendo->fecha_entrega_autos))/86400;
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
        <div class="col-6 border-right">
            <h6 class="text-primary">Días Atraso: <br class="d-lg-none"> <span class="text-dark">{{abs($atraso)}}</span></h6>
        </div>
        <div class="col-5">
            <h6 class="text-primary">Valor: <br class="d-lg-none"> <span class="text-dark">${{number_format($arriendo->total,0,".",".")}} CLP</span></h6>
        </div>
        
    </div>
    <div class="row pt-3 px-lg-4 border-bottom shadow-sm">
        <div class="col-12 border-bottom text-center">
            <h6 class="text-primary">Si quieres editar este arriendo, haz<br class="d-lg-none"> <a href="{{route('arriendos.edit', $arriendo->id)}}" class="text-secondary">click aquí.</a></h6>
        </div>
    </div>
    <div class="row pt-3 px-lg-4 border-bottom shadow-sm">
        <div class="col-12 border-bottom text-center">
            <h6 class="text-primary">Ver todos los<br class="d-lg-none"> <a href="{{route('arriendos.index')}}" class="text-secondary">arriendos.</a></h6>
        </div>
    </div>
</div>
@endsection