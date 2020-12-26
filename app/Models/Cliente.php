<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table= "clientes";
    
    public function arriendo(){
        return  $this->hasMany("App\Models\Arriendo");
    }
}
