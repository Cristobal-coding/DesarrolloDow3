<?php

namespace App\Http\Controllers;

use App\Models\{Arriendo,Cliente,Vehiculo, Sucursal};
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;
use App\Http\Requests\{ArriendosRequest};

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
        $arriendo= new Arriendo;
        $arriendo->rut_cliente = $request->rut_cliente;
        $arriendo->arriendo_fecha_inicio= $request->arriendo_fecha_inicio;
        $arriendo->arriendo_fecha_final= $request->arriendo_fecha_final;
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Arriendo  $arriendo
     * @return \Illuminate\Http\Response
     */
    public function edit(Arriendo $arriendo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Arriendo  $arriendo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Arriendo $arriendo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Arriendo  $arriendo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Arriendo $arriendo)
    {
        $arriendo->vehiculos()->detach();
        $arriendo->delete();
         return redirect()->route("arriendos.index"); 
    }

    public function carrito(){
 
        $usuario=Auth::user();
        $confirmado='ok';
        $i=0;
        while ($confirmado=='ok' && $i<count($usuario->arriendos)) {
            if($usuario->arriendos[$i]->confirmada!=1){
                $arriendo=$usuario->arriendos[$i];
                if(count($arriendo->vehiculos)==null){
                    $confirmado='not_but_empty';
                    // dd($arriendo);
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
        // dd($confirmado);

    }

    public function addCarrito(Vehiculo $vehiculo, SessionManager $sessionManager){
        $arriendos= Arriendo::all();
        $arriendodisponible="ninguno";
        for ($i=0;$i<count($arriendos);$i++){
            if($arriendos[$i]->usuariovendedor->id==Auth::user()->id){ //Depende del rut por ahora, como vemos quien creo la orden?
                //existe ya el vehiculo que clickea?
                foreach( $arriendos[$i]->vehiculos as $producto){
                    if($producto->id==$vehiculo->id){
                        $arriendos[$i]->vehiculos()->detach($producto->id);
                    }
                }
                $arriendodisponible="existe";
                $arriendos[$i]->vehiculos()->attach($vehiculo->id,  ['entregado'=>false,'foto_arriendo'=>null, 'foto_entrega'=>null]);
                return redirect()->route('arriendos.carrito');
                
            }
        }
        if($arriendodisponible=='ninguno'){
            $arriendos= Arriendo::all();
            $cliente=Cliente::all();
            $sessionManager->flash('mensaje', 'Para añadir al carrito, crea un arriendo para un cliente.');
            return view("arriendos.index",compact('arriendos','cliente'));
        }
        
    }

    public function removeCarrito(Vehiculo $vehiculo){
        $arriendos= Arriendo::all();
        for ($i=0;$i<count($arriendos);$i++){
            if($arriendos[$i]->rut_cliente=="20.440.649-9"){ //Depende del rut por ahora, como vemos quien creo la orden?
                $arriendos[$i]->vehiculos()->detach($vehiculo->id);
                
            }
        }
        return redirect()->route('arriendos.carrito');
    }

    public function removeCarritoAll(Arriendo $arriendo){

        $arriendo->vehiculos()->detach();
        $arriendo->delete();
        return redirect()->route('arriendos.carrito');
    }

    public function confirmArriendo(Arriendo $arriendo){
        $acumulado=0;
        foreach($arriendo->vehiculos as $vehiculo){
            $acumulado+=$vehiculo->tipo->valor_diario;
            $vehiculo->estado='Arrendado';
            $vehiculo->save();
        }
        $dias = (strtotime($arriendo->arriendo_fecha_inicio)-strtotime($arriendo->arriendo_fecha_final))/86400;
        $dias = abs($dias);
        $dias = floor($dias);
        $total = $acumulado*$dias;
        $arriendo->confirmada=true;
        $arriendo->total=$total;
        $arriendo->save();

        return redirect()->route('arriendos.carrito');
    }

    

}
