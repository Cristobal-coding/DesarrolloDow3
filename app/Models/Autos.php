<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autos extends Model
{
    use HasFactory;
    protected $table= "vehiculos";

    public function tipo(){
        return $this->belongsTo("App\Models\Tipo");
    }
}
