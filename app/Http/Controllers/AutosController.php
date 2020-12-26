<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Tipo,Autos};
use Illuminate\Support\Facades\Storage;
class AutosController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function index()
    {
        $tipos= Tipo::all();
        $años = range(date('Y'), 1980);
        $total = 33; 
        $elementos=6;
        $incompleta=$total % $elementos;
        $totalInPage= $total/$elementos;
        $iteraciones=$total<$elementos?$total:$elementos;
        if($incompleta!=0){
            $totalInPage+=1;
        }
        return view("autos.index", compact("totalInPage", "elementos", "iteraciones", "tipos", "años"));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $auto= new Auto();
        $auto->nombre_vehiculo= $request->nombre;
        $auto->marca = $request->marca;
        $auto->estado = $request->estado;
        $auto->nombre_tipo = $request->nombre_tipo;
        $auto->patente = $request->patente;
        $auto->foto=$request->foto->store("public/Vehiculos");
        $auto->save();

        return redirect()->route("autos.index");
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

