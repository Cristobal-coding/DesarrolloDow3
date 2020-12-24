<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutosController extends Controller
{
    public function index()
    {
        return view("autos.index");
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        dd("Entrando al metodo exitosamente");
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        dd("Entrando al metodo exitosamente");
    }

 
    public function update(Request $request, $id)
    {
        dd("Entrando al metodo exitosamente");
    }

  
    public function destroy($id)
    {
        dd("Entrando al metodo exitosamente");
    }
}

