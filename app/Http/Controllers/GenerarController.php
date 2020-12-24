<?php

namespace App\Http\Controllers;

use App\Models\Generar;
use Illuminate\Http\Request;

class GenerarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("generar.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Generar  $generar
     * @return \Illuminate\Http\Response
     */
    public function show(Generar $generar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Generar  $generar
     * @return \Illuminate\Http\Response
     */
    public function edit(Generar $generar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Generar  $generar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Generar $generar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Generar  $generar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Generar $generar)
    {
        //
    }
}
