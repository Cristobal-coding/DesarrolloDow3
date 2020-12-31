<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use Illuminate\Http\Request;
use App\Http\Requests\{TiposRequest,TiposEditRequest};
Use Gate;
class TiposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         if(Gate::denies('onlyAdmin')){
            return redirect()->route('home.index');
        }
        $tipo_vehiculo= Tipo::all();
        return view("tipos.index",compact("tipo_vehiculo"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         if(Gate::denies('onlyAdmin')){
            return redirect()->route('home.index');
        }
        return view("tipos.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TiposRequest $request)
    {
         if(Gate::denies('onlyAdmin')){
            return redirect()->route('home.index');
        }
        $tipo_vehiculo = new Tipo;
        $tipo_vehiculo->nombre_tipo = $request->nombre;
        $tipo_vehiculo->valor_diario= $request->valor;
        $tipo_vehiculo->save();
        return redirect()->route("tipos.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tipos  $tipos
     * @return \Illuminate\Http\Response
     */
    public function show(Tipos $tipos)
    {
         if(Gate::denies('onlyAdmin')){
            return redirect()->route('home.index');
        }
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tipos  $tipos
     * @return \Illuminate\Http\Response
     */
    public function edit(Tipo $tipo)
    {
         if(Gate::denies('onlyAdmin')){
            return redirect()->route('home.index');
        }
        $tipo=$tipo;
         return view("tipos.edit",compact("tipo"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tipos  $tipos
     * @return \Illuminate\Http\Response
     */
    public function update(TiposEditRequest $request, Tipo $tipo)
    {
         if(Gate::denies('onlyAdmin')){
            return redirect()->route('home.index');
        }
        $tipo->valor_diario= $request->valor;
        $tipo->save();
        return redirect()->route("tipos.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tipos  $tipos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tipo $tipo)
    {
         if(Gate::denies('onlyAdmin')){
            return redirect()->route('home.index');
        }
        if(count($tipo->vehiculos)!=null){
            return back()->withErrors('No puedes eliminar este tipo de vehiculo, ya que hay muchas ventas asociadas a el..');
        }
        foreach($tipo->vehiculos as $vehiculo){
            foreach($vehiculo->arriendos as $arriendo){
                foreach($arriendo->vehiculos as $auto){
                    if($auto->pivot->entregado!=1 && $vehiculo->id==$auto->id){
                        return back()->withErrors('No puedes eliminar este tipo de vehiculo, ya que hay muchas ventas asociadas a el..');
                    }else if(count($vehiculo->arriendos) !=null ){
                        return back()->withErrors('No puedes eliminar este tipo de vehiculo, ya que hay muchas ventas asociadas a el.');
                    }
                }
            }
        }
 
        $tipo->delete();
         return redirect()->route("tipos.index"); 
    }
}
