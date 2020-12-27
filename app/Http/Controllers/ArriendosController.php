<?php

namespace App\Http\Controllers;

use App\Models\{Arriendo,Cliente,Vehiculo};
use Illuminate\Http\Request;

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
        return view("arriendos.create",compact("clientes"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $arriendo= new Arriendo;
        $arriendo->rut_cliente = $request->rut_cliente;
        $arriendo->arriendo_fecha_inicio= $request->arriendo_fecha_inicio;
        $arriendo->arriendo_fecha_final= $request->arriendo_fecha_final;
        $arriendo->confirmada= false;
        
        $arriendo->save();

        return redirect()->route("arriendos.index");
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
        $arriendo->delete();
         return redirect()->route("arriendos.index"); 
    }

    public function carrito(){
        $arriendos= Arriendo::all();
        $vehiculos= Vehiculo::all();
        return view('arriendos.carro', compact('vehiculos','arriendos'));
    }

    public function addCarrito(Vehiculo $vehiculo){
        $arriendos= Arriendo::all();
        for ($i=0;$i<count($arriendos);$i++){
            if($arriendos[$i]->rut_cliente=="20.440.649-9"){ //Depende del rut por ahora, como vemos quien creo la orden?
                //existe ya el vehiculo que clickea?
                foreach( $arriendos[$i]->vehiculos as $producto){
                    if($producto->id==$vehiculo->id){
                        $arriendos[$i]->vehiculos()->detach($producto->id);
                    }
                }
                $arriendos[$i]->vehiculos()->attach($vehiculo->id,  ['entregado'=>false,'foto_arriendo'=>null, 'foto_entrega'=>null]);
                
            }
        }

        return redirect()->route('arriendos.carrito');
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

    

}
