<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    use HasFactory;
    protected $table='sucursales';

    public function arriendos(){
        return  $this->hasMany("App\Models\Arriendo", 'id_sucursal');
    }
}
