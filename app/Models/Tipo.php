<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    use HasFactory;
    protected $table= "tipo_vehiculo";

    public function vehiculos(){
        return  $this->hasMany("App\Models\Autos");
    }
}
