<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Http\Requests\{ClientesRequest,ClientesEditRequest};
use Gate;

class ClientesController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::denies('bothRols')){
            return redirect()->route('home.index');
        }
        $clientes= Cliente::all();
        return view("clientes.index",compact("clientes"));
    }
    public function create()
    {
        if(Gate::denies('bothRols')){
            return redirect()->route('home.index');
        }
        
        return view("clientes.create");
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientesRequest $request)
    {
        if(Gate::denies('bothRols')){
            return redirect()->route('home.index');
        }
        $cliente= new Cliente;
        $cliente->rut_cliente = $request->rut;
        $cliente->nombre_cliente= $request->nombre;
        $cliente->fono_cliente = $request->fono;
        // $cliente->entrega_pendiente = 'no';
        $cliente->save();

        return redirect()->route("clientes.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    { 
        if(Gate::denies('bothRols')){
            return redirect()->route('home.index');
        }  

        return view('clientes.show', compact('cliente'));
        // dd('El cliente es: '.$cliente->nombre_cliente);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        if(Gate::denies('bothRols')){
            return redirect()->route('home.index');
        }
        $clientes=$cliente;
         return view("clientes.edit",compact("cliente"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(ClientesEditRequest $request, Cliente $cliente)
    {
        if(Gate::denies('bothRols')){
            return redirect()->route('home.index');
        }
        $cliente->rut_cliente=$cliente->rut_cliente;
        $cliente->nombre_cliente=$request->nombre;
        $cliente->fono_cliente=$request->fono;
        // $cliente->entrega_pendiente=$request->entrega_pendiente;
        
        $cliente->save();
        return redirect()->route("clientes.index");
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        if(Gate::denies('bothRols')){
            return redirect()->route('home.index');
        }
        
        $cliente->delete();
         return redirect()->route("clientes.index"); 
    }
}
