<?php

namespace App\Http\Controllers;

use App\Models\{Usuario,Rol};
use Illuminate\Support\Facades\{Auth,Hash};
use Illuminate\Http\Request;
use App\Http\Requests\{UsuariosRequest,UsuariosEditRequest,EditPassRequest};
use Gate;

class UsuariosController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->except('login');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuario= Usuario::all();
        return view("usuarios.index",compact('usuario'));
    }
    public function indexpass()
    {
        $usuario= Usuario::all();
        return view("editpass.editpass",compact('usuario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('onlyAdmin')){
            return redirect()->route('usuarios.index');
        }
        $roles= Rol::all();
        return view("usuarios.create",compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuariosRequest $request)
    {

        if(Gate::denies('onlyAdmin')){
            return redirect()->route('usuarios.index');
        } 
        $usuario= new Usuario;
        $usuario->nombre = $request->nombre;
        $usuario->password= Hash::make($request->password);
        $usuario->rol_id= $request->rol_id;
        $usuario->email= $request->email;
        $usuario->save();

        return redirect()->route("usuarios.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        if(Gate::denies('onlyAdmin')){
            return redirect()->route('usuarios.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        if(Gate::denies('onlyAdmin')){
            return redirect()->route('usuarios.index');
        }
        $usuarios=$usuario;
        $roles= Rol::all();
         return view("usuarios.edit",compact("usuario","roles"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(UsuariosEditRequest $request, Usuario $usuario)
    {   
        if(Gate::denies('onlyAdmin')){
            return redirect()->route('usuarios.index');
        }
        $usuario->nombre = $request->nombre;
        $usuario->password= Hash::make($request->password);
        $usuario->rol_id= $request->rol_id;
        $usuario->save();
        return redirect()->route("usuarios.index");
    }
    public function updatepass(EditPassRequest $request, Usuario $usuario)
    {   

        $usuario->password= Hash::make($request->password);
        $usuario->save();
        return redirect()->route("usuarios.index");
        

        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        if(Gate::denies('onlyAdmin') || Auth::user()->id==$usuario->id){
            return redirect()->route('usuarios.index');
        }
        $usuario->delete();
         return redirect()->route("usuarios.index"); 
    }
    

    public function login(Request $request){

        $credenciales=($request->only("email", "password"));
        if(Auth::attempt($credenciales)){
            //dd('Usuario Confirmado');
            $usuario= Usuario::where('email',$request->email)->first();
           // $usuario->registrarLastLogin();
            return redirect()->route('home.index');

        }else{

            return back()->withErrors('Credenciales Incorrectas o Cuenta bloqueada.');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('home.login');
    }
}
