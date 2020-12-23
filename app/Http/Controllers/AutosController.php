<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutosController extends Controller
{
    public function index()
    {
        return view("autos.index");
    }
}

