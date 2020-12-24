<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutosController extends Controller
{
    public function index()
    {
        $total = 11; //LO que hay en el BD
        $elementos=6;
        $incompleta=$total % $elementos;
        $totalInPage= $total/$elementos;
        if($incompleta!=0){
            $totalInPage+=1;
        }
        return view("autos.index", compact("totalInPage", "elementos"));
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

    public function pagina($pagina){
        dd("La pagina es: ".$pagina);
    }
}

