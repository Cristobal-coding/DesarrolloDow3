<?php

namespace App\Http\Controllers;

use App\Models\{Arriendo,Cliente,Vehiculo, Sucursal, Usuario};
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\{ArriendosRequest,ArriendosEditRequest};
use Gate;

class ArriendosController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::denies('bothRols')){
            return redirect()->route('arriendos.index');
        }
        $arriendos= Arriendo::all();
        $cliente=Cliente::all();
        return view("arriendos.index",compact('arriendos','cliente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('noMakeArriendo') || Gate::denies('bothRols') ){
            // dd(Gate::denies('noMakeArriendo'));
            return redirect()->route('arriendos.index');
        }
        $clientes= Cliente::all();
        $sucursales=Sucursal::all();
        return view("arriendos.create",compact("clientes",'sucursales'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArriendosRequest $request)
    {
        if(Gate::denies('bothRols')){
            return redirect()->route('arriendos.index');
        }
        $arriendo= new Arriendo;
        $arriendo->rut_cliente = $request->rut_cliente;
        $arriendo->fecha_recogida= $request->fecha_recogida;
        $arriendo->fecha_devolucion= $request->fecha_devolucion;
        $arriendo->confirmada= false;
        $arriendo->vendedor=Auth::user()->id;
        $arriendo->estado=true;
        $arriendo->id_sucursal=$request->sucursal;
        
        $arriendo->save();

        return redirect()->route('arriendos.carrito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Arriendo  $arriendo
     * @return \Illuminate\Http\Response
     */
    public function show(Arriendo $arriendo)
    {   
        if(Gate::denies('bothRols')){
            return redirect()->route('arriendos.index');
        }
        if($arriendo->confirmada==0){
            return back()->withErrors('Este arriendo aun no esta completo, por lo tanto no puedes verlo.');
        }
        return view('arriendos.detalle', compact('arriendo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Arriendo  $arriendo
     * @return \Illuminate\Http\Response
     */
    public function edit(Arriendo $arriendo)
    {   
        if(Gate::denies('bothRols')){
            return redirect()->route('arriendos.index');
        }
        if($arriendo->confirmada==0){
            return back()->withErrors('Este arriendo aun no esta completo, por lo tanto no puedes editarlo.');
        }
        $sucursales=Sucursal::all();
        $clientes=Cliente::all();
        $usuarios=Usuario::all();
        // dd($arriendo->vehiculos[0]->pivot->entregado);
        return view('arriendos.edit', compact('arriendo','sucursales','clientes','usuarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Arriendo  $arriendo
     * @return \Illuminate\Http\Response
     */
    public function update(ArriendosEditRequest $request, Arriendo $arriendo)
    {
        if(Gate::denies('bothRols')){
            return redirect()->route('arriendos.index');
        }

        foreach($arriendo->vehiculos as $num=>$vehiculo){
            $arriendof='fotoArriendo'.$num;
            $entrega='fotoEntrega'.$num;
            $estado='estado'.$num;
            $fotoArriendo=$request->$arriendof;
            $fotoEntrega=$request->$entrega;
            if($request->estadoArriendo !=1 && $request->estadoArriendo !=0 ){
                return back()->withErrors('Valor inválido definido para el estado del arriendo.');
            }
            if($request->$estado !=1 && $request->$estado !=0 ){
                return back()->withErrors('Valor inválido definido para el estado de un vehículo.');
            }
            //Que pasa si existe ya la foto de arriendo?
            if($fotoArriendo!=null && $vehiculo->pivot->foto_arriendo!=null){
                Storage::delete( $vehiculo->pivot->foto_arriendo);
            }
            //Que pasa si existe ya la foto de entrega?
            if($fotoEntrega!=null && $vehiculo->pivot->foto_entrega!=null){
                Storage::delete( $vehiculo->pivot->foto_entrega);
            }

            if($request->estadoArriendo==0){
                //reviso si los vehiculos fueron entregados y si tiene sus fotos
                $todoOk=true; //Para Autos
                $fechaOk=true;// Para las fechas del arriendo
                if($vehiculo->pivot->entregado!=0 ||$request->$estado!=0){
                    if($vehiculo->pivot->foto_arriendo==null || $vehiculo->pivot->foto_entrega==null) {
                        if($fotoArriendo==null || $fotoEntrega==null){
                            $todoOk=false;
                        }
                    }
                }else{
                    $todoOk=false;
                }
                if($arriendo->hora_recepcion_cliente==null || $arriendo->fecha_recepcion_vehiculos==null){
                    if($request->hora==null ||$request->fechaEntrega==null ){
                        $fechaOk=false;
                    }
                }
                if($todoOk!=true){
                    return back()->withErrors('Para finalizar un arriendo, los vehiculos deben estar devueltos y con sus respectivas fotos.');
                }
                if($fechaOk!=true){
                    return back()->withErrors('Para finalizar un arriendo, la fecha de devolucion y hora de recepcion del cliente deben estar definidos.');
                }
            }
            if($request->$estado !=0){
                // dd($vehiculo->pivot->entregado);
                if($vehiculo->pivot->entregado==0 && $vehiculo->pivot->foto_arriendo==null && $vehiculo->pivot->foto_entrega==null && $fotoArriendo==null && $fotoEntrega==null){
                    return back()->withErrors('Si un vehiculo ha sido entregado, debe tener sus fotos definidas');
                }
            }
            //Devuelvo a Disponible el estado de un Vehiculo
            if($request->$estado==1 || $request->estadoArriendo==0){
                $vehiculo->estado='Disponible';
                $vehiculo->save();
            }else{
                $vehiculo->estado='Arrendado';
                $vehiculo->save();
            }
            $arriendo->vehiculos()->updateExistingPivot($vehiculo->id,['entregado'=>$request->$estado, 'foto_arriendo'=>$fotoArriendo!=null?$fotoArriendo->store("public/FotosArriendos"):$vehiculo->pivot->foto_arriendo, 'foto_entrega'=>$fotoEntrega!=null?$fotoEntrega->store("public/FotosEntregas"):$vehiculo->pivot->foto_entrega]);

        }
        if(Auth::user()->rol->nombre=='Ejecutivo'){
            $arriendo->fecha_recepcion_vehiculos=$request->fechaEntrega;
            $arriendo->save();
            return redirect()->route("arriendos.index"); 
        }else{
            $arriendo->rut_cliente = $request->rut_cliente;
            $arriendo->fecha_recogida= $request->fechaInicio;
            $arriendo->fecha_devolucion= $request->fechaFinal;
            $arriendo->hora_recepcion_cliente=$request->hora;
            $arriendo->estado=$request->estadoArriendo;
            $arriendo->fecha_recepcion_vehiculos=$request->fechaEntrega;
            $arriendo->save();
            return redirect()->route("arriendos.index"); 
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Arriendo  $arriendo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Arriendo $arriendo)
    {
        if(Gate::denies('onlyAdmin')){
            return redirect()->route('arriendos.index');
        }
        foreach($arriendo->vehiculos as $vehiculo){
            $vehiculo->estado='Disponible';
            $vehiculo->save();
        }
        $arriendo->vehiculos()->detach();
        $arriendo->delete();
         return redirect()->route("arriendos.index"); 
    }
    private function getArriendoActual(){
        foreach(Auth::user()->arriendos as $arriendo){
            if($arriendo->confirmada==0){
                return $arriendo;
            }
        }
    }
    public function carrito(){
        if(Gate::denies('bothRols')){
            return redirect()->route('arriendos.index');
        }
        $usuario=Auth::user();
        $confirmado='ok';
        $i=0;
        while ($confirmado=='ok' && $i<count($usuario->arriendos)) {
            if($usuario->arriendos[$i]->confirmada!=1){
                $arriendo=$usuario->arriendos[$i];
                if(count($arriendo->vehiculos)==null){
                    $confirmado='not_but_empty';
                }else{
                    $confirmado='not';
                }
                return view('arriendos.carro', compact('confirmado','arriendo'));

            }else{
                $i++;  
            }
        }
        if($confirmado=='ok'){
            return view('arriendos.carro', compact('confirmado'));
        }

    }

    public function addCarrito(Vehiculo $vehiculo, SessionManager $sessionManager){
        if(Gate::denies('bothRols')){
            return redirect()->route('vehiculos.index');
        }
        if($vehiculo->estado=='Disponible'){
            //  existe ya el vehiculo que clickea?
            $arriendo=$this->getArriendoActual();
            if($arriendo!=null){
                foreach( $arriendo->vehiculos as $producto){
                    if($producto->id==$vehiculo->id){
                        $arriendo->vehiculos()->detach($producto->id);
                    }
                }
                $arriendodisponible="existe";
                $arriendo->vehiculos()->attach($vehiculo->id,  ['entregado'=>false,'foto_arriendo'=>null, 'foto_entrega'=>null]);
                return redirect()->route('arriendos.carrito');
    
            }else{
                $sessionManager->flash('mensaje', 'Para añadir al carrito, crea un arriendo para un cliente.');
                return $this->index();
            }

        }else{
            return back()->withErrors('Este Vehículo ya esta arriendado');
        }
        // dd('hola');
       
    }

    public function removeCarrito(Vehiculo $vehiculo){
        if(Gate::denies('bothRols')){
            return redirect()->route('arriendos.index');
        }
        $arriendo= $this->getArriendoActual();
        $arriendo->vehiculos()->detach($vehiculo->id);
        return redirect()->route('arriendos.carrito');
    }

    public function removeCarritoAll(){
        if(Gate::denies('bothRols')){
            return redirect()->route('arriendos.index');
        }
        $arriendo=$this->getArriendoActual();
        $arriendo->vehiculos()->detach();
        $arriendo->delete();
        return redirect()->route('arriendos.carrito');
    }

    public function confirmArriendo(Arriendo $arriendo, SessionManager $sessionManager){
        if(Gate::denies('bothRols')){
            return redirect()->route('arriendos.index');
        }
        $acumulado=0;
        foreach($arriendo->vehiculos as $vehiculo){
            $acumulado+=$vehiculo->tipo->valor_diario;
            $vehiculo->estado='Arrendado';
            $vehiculo->save();
        }
        $dias = (strtotime($arriendo->fecha_recogida)-strtotime($arriendo->fecha_devolucion))/86400;
        $dias = abs($dias);
        $dias = floor($dias);
        $total = $acumulado*$dias;
        $arriendo->confirmada=true;
        $arriendo->total=$total;
        $arriendo->save();
        $sessionManager->flash('mensaje', 'El arriendo se ha completado exitosamente haz click ');
        return redirect()->route('arriendos.carrito');
    }

    

}
