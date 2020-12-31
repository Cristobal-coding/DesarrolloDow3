<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Arriendo};
use PDF;
class EstadisticasController extends Controller
{
    public function reporteArriendos(){
        $arriendos= $this->getArriendos();
        $acumulado=0;
        return view('estadisticas.tabla' ,compact('arriendos', 'acumulado'));
    }
    private function getArriendos(){
        $arriendos=Arriendo::all();
        return $arriendos;
    }
    public function downloadReporte(){
        $acumulado=0;
        $arriendos= $this->getArriendos();
        $pdf=PDF::loadView('estadisticas.tabla', compact('arriendos','acumulado'));
        $pdf->setPaper('letter', 'portrait');
        return $pdf->download('Reporte-Arriendos.pdf');
    }
}
