<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Tipo, Vehiculo};
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\{VehiculosRequest,VehiculosEditRequest};
use Illuminate\Support\Facades\Auth;
use DateTime;
use Gate;
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
        $total = count($vehiculos); //11
        $elementos=6;
        $incompleta=$total % $elementos; //1
        $totalInPage= $total/$elementos; //1.5
        $iteraciones=$total<$elementos?$total:$elementos;//6
        if($incompleta!=0){
            $totalInPage+=1; //2.5
        }
        $estados = array("Disponible", "Arrendado", "En mantenimiento");                          
        return view("vehiculos.index", compact("totalInPage", "elementos", "iteraciones", "tipos", "años","vehiculos",'estados'));
        dd(date('H:i:s',strtotime($vehiculos[0]->created_at)));
    }

    public function create()
    {
        //
    }


    public function store(VehiculosRequest $request)
    {
        if(Gate::denies('onlyAdmin')){
            return redirect()->route('vehiculos.index');
        }
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

 
    public function update(VehiculosEditRequest $request, Vehiculo $vehiculo)
    {   
        //Se valida si esta siendo tramitado y le cambian el arriendo
        $tramite=false;
        foreach(Auth::user()->arriendos as $arriendo){
            if($arriendo->confirmada==0){
                foreach ($arriendo->vehiculos as $vehiculoEnArriendo) {
                    if($vehiculoEnArriendo->id==$vehiculo->id){
                        $tramite=true;
                    }
                }
            }
        }   
        if($tramite==true && $request->estado!=null){
            return back()->withErrors('Este vehiculo esta siendo tramitado en un arriendo, no puedes cambiar su estado actual');
        }
        //Se valida si pertecene a un arriendo y no esta entregado, y le quieren cambiar su estado
        foreach($vehiculo->arriendos as $arriendo){
            foreach($arriendo->vehiculos as $vehiculoArrendado){
                if($vehiculoArrendadado->pivot->entregado==0 && $vehiculoArrendadado->id==$vehiculo->id && $request->estado!='Arrendado'){
                    return back()->withErrors('Este vehiculo esta arrendado y no ha sido entregado, por lo tanto no puedes cambiar su estado actual');
                }
            }
        }
        if(Auth::user()->rol->nombre=='Ejecutivo'){
            $vehiculo->estado=$request->estado;
            $vehiculo->save();

        }else{
            
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

        }

       return redirect()->route("vehiculos.index");
    }

  
    public function destroy(Vehiculo $vehiculo)
    {
        if(Gate::denies('onlyAdmin')){
            return redirect()->route('vehiculos.index');
        }
       Storage::delete($vehiculo->foto);
       $vehiculo->delete();

       return redirect()->route("vehiculos.index");
    }

    public function pagina($pagina){
        if($pagina==1){
            return $this->index();
        }else{

            $tipos= Tipo::all();
            $vehiculos= Vehiculo::orderby('marca',"asc")->get();
            $total = count($vehiculos); 
            $elementos=6;
            $incompleta=$total % $elementos;
            $totalInPage= $total/$elementos;
            $start=$elementos*($pagina-1);// 6*1=6
            $iteraciones=$total-$start>6?6:$total-$start;
            if($incompleta!=0){
                $totalInPage+=1;
            }
            if($totalInPage<$pagina){
                return $this->index();
            }
            //dd("Emperzar: ".$start." Iterar: ".$iteraciones);
            return view("vehiculos.paginaciones", compact("totalInPage", "iteraciones", "start", "vehiculos", "tipos"));
        }
    }


}

