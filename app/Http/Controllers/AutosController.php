<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Tipo,Auto};
use Illuminate\Support\Facades\Storage;
use DateTime;
class AutosController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function index()
    {
        $tipos= Tipo::all();
        $autos= Auto::orderby('marca',"asc")->get();
        $años = range(date('Y'), 1980);
        $total = count($autos); 
        $elementos=6;
        $incompleta=$total % $elementos;
        $totalInPage= $total/$elementos;
        $iteraciones=$total<$elementos?$total:$elementos;
        if($incompleta!=0){
            $totalInPage+=1;
        }
        return view("autos.index", compact("totalInPage", "elementos", "iteraciones", "tipos", "años","autos"));
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
        $auto->year=$request->año;
        $auto->save();

        return redirect()->route("autos.index");
    }


    public function show($id)
    {
        //
    }


    public function edit(Auto $auto)
    {
        $tipos = Tipo::orderBy('nombre_tipo', 'asc')->get();
        $años = range(date('Y'), 1980);
        return view("autos.edit", compact("auto", 'tipos', "años"));
    }

 
    public function update(Request $request, Auto $auto)
    {
       
    }

  
    public function destroy(Auto $auto)
    {
       Storage::delete($auto->foto);
       $auto->delete();

       return redirect()->route("autos.index");
    }

    public function pagina($pagina){
        $tipos= Tipo::all();
        $autos= Auto::orderby('marca',"asc")->get();
        $total = count($autos); 
        $elementos=6;
        $incompleta=$total % $elementos;
        $totalInPage= $total/$elementos;
        $start=$elementos*($pagina-1);
        $iteraciones=$total-$start>6?6:$total-$start;
        if($incompleta!=0){
            $totalInPage+=1;
        }
        //dd("Emperzar: ".$start." Iterar: ".$iteraciones);
        return view("autos.paginaciones", compact("totalInPage", "iteraciones", "start", "autos", "tipos"));
    }


}

