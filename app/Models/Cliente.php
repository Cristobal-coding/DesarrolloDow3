<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $table= "clientes";
    protected $primaryKey ="rut_cliente";
    protected $keyType='string';
    public $incrementing = false;
    
    public function arriendos(){
        
        return  $this->hasMany("App\Models\Arriendo" , 'rut_cliente');
    }
}
