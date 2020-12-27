<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;
    protected $table= "vehiculos";
    protected $primaryKey ="id_vehiculo";


    public function tipo(){
        return $this->belongsTo("App\Models\Tipo", "nombre_tipo", 'nombre_tipo');
    }
    // public function arriendos(){
    //     return $this->belongsToMany('App\Models\Arriendo','arriendo_vehiculo','id_arriendo','id');
    // }
    public function arriendos(){
        return $this->belongsToMany('App\Models\Arriendo','arriendo_vehiculo','id_arriendo','id');
    }
    
}
