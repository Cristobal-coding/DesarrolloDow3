<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutosController extends Controller
{

    public function index()
    {
        $total = 33; 
        $elementos=6;
        $incompleta=$total % $elementos;
        $totalInPage= $total/$elementos;
        $iteraciones=$total<$elementos?$total:$elementos;
        if($incompleta!=0){
            $totalInPage+=1;
        }
        return view("autos.index", compact("totalInPage", "elementos", "iteraciones"));
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
        $total = 33; 
        $elementos=6;
        $incompleta=$total % $elementos;
        $totalInPage= $total/$elementos;


        $start=$elementos*($pagina-1);
        $iteraciones=$total-$start>6?6:$total-$start;
        if($incompleta!=0){
            $totalInPage+=1;
        }
        //dd("Emperzar: ".$start." Iterar: ".$iteraciones);
        return view("autos.paginaciones", compact("totalInPage", "iteraciones", "start"));
    }


}

