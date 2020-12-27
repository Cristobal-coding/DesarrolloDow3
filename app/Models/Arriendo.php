<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arriendo extends Model
{
    use HasFactory;

    protected $table= "arriendos";

    public function cliente(){
        return $this->belongsTo("App\Models\Cliente",'rut_cliente','rut_cliente');
    }

    // public function vehiculos(){
    //     return $this->belongsToMany('App\Models\Vehiculo','arriendo_vehiculo','id_vehiculo','id_vehiculo');
    // }
    public function vehiculos(){
        return $this->belongsToMany('App\Models\Vehiculo');
    }
    
}
