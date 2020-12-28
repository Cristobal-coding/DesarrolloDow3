@extends('layouts/master')
@section('css-personalizado')
    <link rel="stylesheet" href="{{asset("css/myThemes.css")}}">
@endsection

@section('main_content')
    <h5>Bievenido a edit con el arriendo {{$arriendo->id}}</h5>
    <div class="col-lg-5 shadow-lg overflow-auto mi-scrol" style="max-height: 400px !important; overflow-x: hidden !important;">
        @foreach ($arriendo->vehiculos as $vehiculo)
        <div class="row px-1 mx-1 w-100 border-top  w-100" >
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
    <div class="col-7 shadow-lg">
        <div class="row p-3">
            <div class="col-12">
                <form action="">
                    @csrf
                    @method('put')
                    {{-- request de cada vehiculo --}}
                    <div class="text-center">
                        <h6 class="text-primary">Vehiculos Arrendados:</h6>
                    </div>
                    <div class="row px-3 overflow-auto mi-scrol shadow-sm rounded" style="max-height: 100px !important;">
                        @foreach ($arriendo->vehiculos as $vehiculo)
                            <div class="col-12 mx-0 py-1 px-1 form-floating">
                                <h6 class="text-primary">{{$vehiculo->marca}} {{$vehiculo->nombre_vehiculo}} {{$vehiculo->year}}</h6>
                            </div>
                            <div class="col-2 mx-0 py-1 px-1 form-floating">
                                <select class="form-select" id="estado" aria-label="estado" name="estado">
                                    <option value="Arrendado" @if($vehiculo->estado=='Arrendado') selected="selected" @endif>Arrendado</option>
                                    <option value="Disponible" @if($vehiculo->estado=='Disponible') selected="selected" @endif>Disponible</option>
                                </select>
                                <label for="estado" class="text-primary">Estado:</label>
                            </div>
                            <div class="col-5 mx-0 py-1 px-1 form-floating">
                                <div class="mb-3">
                                    <label for="fotoEntrega" class="form-label text-primary py-0 my-0" style="font-size: 14px">Foto Entrega:</label>
                                    <input class="form-control form-control-sm text-primary" id="fotoEntrega" type="file" name="fotoEntrega">
                                </div>
                            </div>
                            <div class="col-5 mx-0 py-1 px-1 form-floating">
                                <div class="mb-3">
                                    <label for="fotoArriendo" class="form-label text-primary py-0 my-0" style="font-size: 14px">Foto Arriendo:</label>
                                    <input class="form-control form-control-sm text-primary" id="fotoArriendo" type="file" name="fotoArriendo">
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{-- request de cada vehiculo --}}
                    <div class="text-center pt-4">
                        <h6 class="text-primary">Detalles del arriendo:</h6>
                    </div>
                    <div class="row px-3 pt-2">
                        <div class="col-4 mx-0 px-0 form-floating">
                            <input type="text" class="form-control" id="rutCliente" name="rutCliente" value="{{$arriendo->rut_cliente}}">
                            <label for="rutCliente" class="text-primary">Rut Cliente:</label>
                        </div>
                        <div class="col-8 mx-0 px-0 form-floating">
                            <select class="form-select" id="estado" aria-label="estado" name="estado">
                                <option value="0" @if($arriendo->estado==0) selected="selected" @endif>Finalizada</option>
                                <option value="1" @if($arriendo->estado==1) selected="selected" @endif>Vigente</option>
                            </select>
                            <label for="estado" class="text-primary">Estado:</label>
                        </div>

                    </div>
                </form>
            </div>
        </div>
        
    </div>
@endsection