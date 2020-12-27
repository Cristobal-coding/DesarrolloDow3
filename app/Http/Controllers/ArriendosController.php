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
        
        return view("arriendos.index");
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
        //
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
        //
    }

    public function carrito(){
        $arriendos= Arriendo::all();
        $vehiculos= Vehiculo::all();
        $acumulado=0;
        // dd($arriendos[0]->vehiculos);
        // dd($vehiculos[0]->arriendos);
        return view('arriendos.carro', compact('vehiculos','arriendos','acumulado'));
    }

    public function addCarrito(Vehiculo $vehiculo){
        $arriendos= Arriendo::all();
        for ($i=0;$i<count($arriendos);$i++){
            if($arriendos[$i]->rut_cliente=="20440649-9"){
                // $arriendoActualizado= new Arriendo();
                // $id=$arriendos[$i]->id;
                // $arriendoActualizado->rut_cliente=$arriendos[$i]->rut_cliente;
                // $arriendoActualizado->arriendo_fecha_inicio=$arriendos[$i]->arriendo_fecha_inicio;
                // $arriendoActualizado->arriendo_fecha_final=$arriendos[$i]->arriendo_fecha_final;
                // $arriendoActualizado->confirmada=$arriendos[$i]->confirmada;
                // $arriendos[$i]->vehiculos()->detach();
                // $arriendos[$i]->delete();
                // $arriendoActualizado->id=$id;
                // $arriendoActualizado->save();
                $arriendos[$i]->vehiculos()->attach($vehiculo->id_vehiculo,  ['entregado'=>false,'foto_arriendo'=>null, 'foto_entrega'=>null]);
                
            }
        }

        return redirect()->route('arriendos.carrito');
    }

    

}
