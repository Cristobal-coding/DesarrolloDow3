@extends('layouts/master')
@section('css-personalizado')
    <link rel="stylesheet" href="{{asset("css/myThemes.css")}}">
@endsection
@section('main_content')
    <div class="col-lg-6 offset-lg-3 px-2 pt-5 d-flex align-items-center justify-content-center flex-column ">
        <h5 class="text-primary pb-3">Arriendos del cliente <span class="text-secondary">{{$cliente->nombre_cliente}}</span></h5>
        <h6 class="text-primary pb-3 d-inline">Total de arriendos: <span class="text-secondary">{{count($cliente->arriendos)}}</span> <a href="{{route('clientes.index')}}" class="text-dark d-inline ml-3"><i class="fas fa-undo-alt"></i>Volver</a></h6>
        
        <div class="row w-100 overflow-auto mi-scrol mx-0">
        @foreach ($cliente->arriendos as $arriendo)
                <div class="col-4 shadow-sm mb-2">
                    <small class="text-primary d-block">Fecha de inicio: <span class="text-secondary">{{date('d-m-Y', strtotime($arriendo->arriendo_fecha_inicio))}}</span></small>
                    <small class="text-primary">Fecha de Devolucion: <span class="text-secondary">{{date('d-m-Y', strtotime($arriendo->arriendo_fecha_inicio))}}</span></small>
                </div>
                <div class="col-5 shadow-sm mb-2">
                    <small class="text-primary d-block">N° Vehículos: <span class="text-secondary">{{count($arriendo->vehiculos)}}</span></small>
                    {{-- <small class="text-primary">Fecha de Devolucion: <span class="text-secondary">{{date('d-m-Y', strtotime($arriendo->arriendo_fecha_inicio))}}</span></small> --}}
                    <small class="text-primary">Estado: <span class="text-secondary">{{$arriendo->estado==0?'Vigente':'Finalizado'}}</span></small>    
                </div>
                <div class="col-3 shadow-sm mb-2 text-center">
                    <a href="{{route('arriendos.show',$arriendo->id)}}" class="btn btn-secondary text-light">Detalle <i class="fas fa-arrow-right fa-lg ml-1"></i></a>
                </div>
        @endforeach
        </div>
    </div>
@endsection