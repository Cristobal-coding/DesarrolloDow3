@extends('layouts/master')

@section('main_content')
    <div class="col-7 offset-1 mt-4">
        <div class="row px-0 mx-0">
            <div class="col-6">
                <h5><i class="fas fa-shopping-cart mr-1"></i>Carrito (3 Vehículos)</h5>
            </div>
            <div class="col-6 text-right">
                <a href="{{route("autos.index")}}" class="text-decoration-none text-primary text-right">Continuar Viendo <i class="fas fa-long-arrow-alt-right"></i></a>
            </div>
        </div>
       
    </div>
    <div class="col-7 offset-1 mt-4  shadow-lg mb-5">
        <div class="row mb-3">
            <div class="col-12 py-0 text-right pt-3">
                <button class="btn text-primary">Tramitar Pedido<i class="fas fa-long-arrow-alt-right"></i></button>
            </div>
        </div>
        <div class="row px-0 mx-0 border-top">
            {{-- imagen --}}
            <div class="col-4 py-2 px-0 rounded">
                <div class="card border-0 rounded">
                    <div class="card-body p-0 border-0 rounded">
                        <img src="./imgs/ranger.jpg" alt="" class="img-fluid rounded">
                    </div>
                </div>
            </div>
            {{-- /imagen --}
            {{-- informacion --}}
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
            {{-- /informacion --}}
            {{-- precio --}}
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
            {{-- /precio --}}
        </div>
        <div class="row px-0 mx-0 border-top">
            {{-- imagen --}}
            <div class="col-4 py-2 px-0 rounded">
                <div class="card border-0 rounded">
                    <div class="card-body p-0 border-0 rounded">
                        <img src="./imgs/ranger.jpg" alt="" class="img-fluid rounded">
                    </div>
                </div>
            </div>
            {{-- /imagen --}
            {{-- informacion --}}
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
            {{-- /informacion --}}
            {{-- precio --}}
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
            {{-- /precio --}}
        </div>

        <div class="row border-top border-bottom mt-2 mb-2 px-0 mx-0">
            <div class="col-8 py-3">
                <h6 class="d-inline pr-1"><span class="text-primary">Cliente:</span> Cristóbal</h6>
                <h6 class="d-inline"><span class="text-primary">Rut:</span> 20440649-9</h6>
                <h6 class="mt-1"><span class="text-primary">Fecha de Devolución:</span> 25/12/30</h6>

            </div>
            <div class="col-4 text-right py-3">
                <h5 class="text-primary">Total $81.500 CLP</h5>
            </div>
            <div class="col-12 text-right py-3">
                <button class="btn btn-primary"><i class="fas fa-shopping-cart mr-1"></i> Tramitar Pedido <i class="fas fa-long-arrow-alt-right ml-1"></i></button>
            </div>
        </div>
        
        
        
       
    </div>
@endsection