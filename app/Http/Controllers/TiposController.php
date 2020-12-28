<?php

namespace App\Http\Controllers;

use App\Models\Tipo;
use Illuminate\Http\Request;
use App\Http\Requests\{TiposRequest,TiposEditRequest};

class TiposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $tipo->delete();
         return redirect()->route("tipos.index"); 
    }
}
