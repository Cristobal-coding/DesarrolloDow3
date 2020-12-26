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
}
