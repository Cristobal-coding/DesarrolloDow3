<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Tipo, Vehiculo};
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\{VehiculosRequest};
use DateTime;
class VehiculosController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function index()
    {
        $tipos= Tipo::all();
        $vehiculos= Vehiculo::orderby('marca',"asc")->get();
        $años = range(date('Y'), 1980);
        $total = count($vehiculos); 
        $elementos=6;
        $incompleta=$total % $elementos;
        $totalInPage= $total/$elementos;
        $iteraciones=$total<$elementos?$total:$elementos;
        if($incompleta!=0){
            $totalInPage+=1;
        }
        $estados = array("Disponible", "Arrendado", "En mantenimiento");                          
        return view("vehiculos.index", compact("totalInPage", "elementos", "iteraciones", "tipos", "años","vehiculos",'estados'));
    }

    public function create()
    {
        //
    }


    public function store(VehiculosRequest $request)
    {
        $vehiculo= new Vehiculo();
        $vehiculo->nombre_vehiculo= $request->nombre;
        $vehiculo->marca = $request->marca;
        $vehiculo->estado = $request->estado;
        $vehiculo->nombre_tipo = $request->nombre_tipo;
        $vehiculo->patente = $request->patente;
        $vehiculo->foto=$request->foto->store("public/Vehiculos");
        $vehiculo->year=$request->año;
        $vehiculo->save();
        
        return redirect()->route("vehiculos.index");
        
    }


    public function show($id)
    {
        //
    }


    public function edit(Vehiculo $vehiculo)
    {
        $tipos = Tipo::orderBy('nombre_tipo', 'asc')->get();
        $años = range(date('Y'), 1980);
        return view("vehiculos.edit", compact("vehiculo", 'tipos', "años"));
    }

 
    public function update(Request $request, Vehiculo $vehiculo)
    {
       $vehiculo->nombre_vehiculo=$request->nombre;
       $vehiculo->marca=$request->marca;
       $vehiculo->year= $request->año;
       $vehiculo->patente= $request->patente;
       $vehiculo->nombre_tipo=$request->tipo;
       $vehiculo->estado=$request->estado;
       if($request->foto!=null){
           Storage::delete($vehiculo->foto);
           $vehiculo->foto= $request->foto->store("public/Vehiculos");
       }
       $vehiculo->save();

       return redirect()->route("vehiculos.index");
    }

  
    public function destroy(Vehiculo $vehiculo)
    {
       Storage::delete($vehiculo->foto);
       $vehiculo->delete();

       return redirect()->route("vehiculos.index");
    }

    public function pagina($pagina){
        $tipos= Tipo::all();
        $vehiculos= Vehiculo::orderby('marca',"asc")->get();
        $total = count($vehiculos); 
        $elementos=6;
        $incompleta=$total % $elementos;
        $totalInPage= $total/$elementos;
        $start=$elementos*($pagina-1);
        $iteraciones=$total-$start>6?6:$total-$start;
        if($incompleta!=0){
            $totalInPage+=1;
        }
        //dd("Emperzar: ".$start." Iterar: ".$iteraciones);
        return view("vehiculos.paginaciones", compact("totalInPage", "iteraciones", "start", "vehiculos", "tipos"));
    }


}

