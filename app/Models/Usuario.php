<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use DateTime;

class Usuario extends Authenticable
{
    use HasFactory;
    protected $table = 'usuarios';

    public function registrarLastLogin(){
        $this->last_login = new DateTime('NOW');
        $this->save();
    }

    public function rol(){
        return $this->belongsTo('App\Models\Rol');
    }
    public function arriendos(){
        return $this->hasMany("App\Models\Arriendo", 'vendedor','id');
    }

    // public function arriendosinconfirmar(){
    //     $confirmados=true;
    //     foreach($this->arriendos as $arriendo){
    //         if($arriendo->confirmada==0){
    //             $confirmados=false;
    //             return $arriendo->id;
    //         }
    //     }
    // }
}
