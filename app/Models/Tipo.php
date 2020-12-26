<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    use HasFactory;
    protected $table= "tipo_vehiculo";
    protected $primaryKey ="nombre_tipo";
    protected $keyType='string';
    public $incrementing = false;

    public function vehiculos(){
        return  $this->hasMany("App\Models\Auto", 'nombre_tipo', 'nombre_tipo');
    }
}
