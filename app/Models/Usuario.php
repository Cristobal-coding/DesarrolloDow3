<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $table = 'users';

    public function registrarLastLogin(){
        $this->last_login = new DateTime('NOW');
        $this->save();
    }

    public function rol(){
        return $this->belongsTo('App\Models\Rol');
    }
}
