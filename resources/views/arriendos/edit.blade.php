@extends('layouts/master')
@section('css-personalizado')
    <link rel="stylesheet" href="{{asset("css/myThemes.css")}}">
@endsection

@section('main_content')
    <div class="col-12 my-4 d-flex align-items-center justify-content-center">
        <h5 class="text-primary">Editando el arriendo con <span class="text-secondary">ID: {{$arriendo->id}}</span></h5>
    </div>
     {{-- Errores --}}
     @if ($errors->any())                       
     <div class=" col-6 offset-3 alert alert-warning  mt-1">
         <ul>
             @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
             @endforeach
         </ul>
     </div>
         @endif
     {{-- Errores --}}
    <div class="col-lg-5 shadow-sm overflow-auto mi-scrol" style="max-height: 400px !important; overflow-x: hidden !important;">
        @foreach ($arriendo->vehiculos as $vehiculo)
        <div class="row px-1 mx-1 w-100 border-bottom  w-100" >
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
    <div class="col-7 shadow-sm">
        <div class="row p-3">
            <div class="col-12">
                <form action="{{route("arriendos.update", $arriendo->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    {{-- request de cada vehiculo --}}
                    <div class="text-center">
                        <h6 class="text-primary">Vehiculos Arrendados:</h6>
                    </div>
                    <div class="row px-3 overflow-auto mi-scrol shadow-sm rounded" style="max-height: 100px !important;">
                        @foreach ($arriendo->vehiculos as $num=>$vehiculo)
                            <div class="col-12 mx-0 py-1 px-1 form-floating">
                                <h6 class="text-primary">{{$vehiculo->marca}} {{$vehiculo->nombre_vehiculo}} {{$vehiculo->year}}</h6>
                            </div>
                            <div class="col-2 mx-0 py-1 px-1 form-floating">
                                <select class="form-select" id="estado{{$num}}" aria-label="estado{{$num}}" name="estado{{$num}}">
                                    <option value="0" @if($vehiculo->pivot->entregado==0) selected="selected" @endif>Pendiente</option>
                                    <option value="1" @if($vehiculo->pivot->entregado==1) selected="selected" @endif>Entregado</option>
                                </select>
                                <label for="estado{{$num}}" class="text-primary">Estado:</label>
                            </div>
                            <div class="col-5 mx-0 py-1 px-1 form-floating">
                                <div class="mb-3">
                                    <label for="fotoEntrega{{$num}}" class="form-label text-primary py-0 my-0" style="font-size: 14px">Foto Entrega @if($vehiculo->pivot->foto_entrega!=null)(<small class="text-secondary">*Foto Ingresada*</small>)@endif:</label>
                                    <input class="form-control form-control-sm text-primary" id="fotoEntrega{{$num}}" type="file" name="fotoEntrega{{$num}}">
                                </div>
                            </div>
                            <div class="col-5 mx-0 py-1 px-1 form-floating">
                                <div class="mb-3">
                                    <label for="fotoArriendo{{$num}}" class="form-label text-primary py-0 my-0" style="font-size: 14px">Foto Arriendo @if($vehiculo->pivot->foto_arriendo!=null)(<small class="text-secondary">*Foto Ingresada*</small>)@endif:</label>
                                    <input class="form-control form-control-sm text-primary" id="fotoArriendo{{$num}}" type="file" name="fotoArriendo{{$num}}">
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{-- request de cada vehiculo --}}

                    {{-- request de la orden --}}
                       
                    <div class="text-center pt-4">
                        <h6 class="text-primary">Detalles del arriendo:</h6>
                    </div>
                    <div class="row px-3 pt-2">
                        <div class="col-4 mx-0 px-1 form-floating">
                            <select class="form-select" @if(Gate::denies('onlyAdmin')) disabled @endif id="rut_cliente" aria-label="rut_cliente" name="rut_cliente">
                                @foreach ($clientes as $cliente )
                                <option value="{{$cliente->rut_cliente}}" @if($arriendo->cliente->rut_cliente==$cliente->rut_cliente) selected="selected" @endif>{{$cliente->rut_cliente}}</option> 
                                @endforeach
                            </select>
                            <label for="rut_cliente" class="text-primary ">Rut Cliente:</label>
                        </div>
                        <div class="col-4 mx-0 px-1 form-floating">
                            <select class="form-select" id="estadoArriendo" @if(Gate::denies('onlyAdmin')) disabled @endif aria-label="estadoArriendo" name="estadoArriendo">
                                <option value="0" @if($arriendo->estado==0) selected="selected" @endif>Finalizada</option>
                                <option value="1" @if($arriendo->estado==1) selected="selected" @endif>Vigente</option>
                            </select>
                            <label for="estadoArriendo" class="text-primary">Estado:</label>
                        </div>
                        <div class="col-4 mx-0 px-1 px-0 form-floating">
                            <input type="time" class="form-control" id="hora" name="hora" @if($arriendo->hora_recepcion_cliente!=null) value="{{date('H:i', strtotime($arriendo->hora_recepcion_cliente))}}" @endif >
                            <label for="hora" class="text-primary">Hora Entrega al Cliente:</label>
                        </div>
                    </div>
                    {{-- 2014-10-08T23:59 --}}
                    <div class="row px-3 pt-2">
                        <div class="col-4 mx-0 px-1 px-0 form-floating">
                            <input type="date" class="form-control @error('fechaInicio') is-invalid @enderror" id="fechaInicio" name="fechaInicio" value="{{date('Y-m-d',strtotime($arriendo->fecha_recogida))}}"> 
                            <label for="fechaInicio" class="text-primary">Fecha inicio:</label>
                        </div>
                        <div class="col-4 mx-0 px-1 px-0 form-floating">
                            <input type="date" class="form-control @error('fechaFinal') is-invalid @enderror" id="fechaFinal" name="fechaFinal" value="{{date('Y-m-d', strtotime($arriendo->fecha_devolucion))}}">
                            <label for="fechaFinal" class="text-primary">Fecha fin Arriendo:</label>
                        </div>
                        <div class="col-4 mx-0 px-1 px-0 form-floating">
                            <input type="datetime-local" class="form-control @error('fechaEntrega') is-invalid @enderror" id="fechaEntrega" name="fechaEntrega" @if($arriendo->fecha_recepcion_vehiculos!=null) value="{{date('Y-m-d', strtotime($arriendo->fecha_recepcion_vehiculos)).'T'.date('H:i', strtotime($arriendo->fecha_recepcion_vehiculos))}}"  @endif >
                            <label for="fechaEntrega" class="text-primary">Fecha de Devolución</label>
                        </div>
                        
                    </div>
                    <div class="row px-3 pt-3">
                        <div class="col-6 mx-0 px-1 px-0 form-floating">
                           <a href="{{route('arriendos.index')}}" class="btn btn-dark w-100">Cancelar</a>
                        </div>
                        <div class="col-6 mx-0 px-1 px-0 form-floating">
                            <button type="submit" class="btn btn-primary w-100">Finalizar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
    </div>
@endsection