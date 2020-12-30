<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
class EstadisticasController extends Controller
{
    public function downloadReporte(){
        $pdf=PDF::loadView('estadisticas.tabla');
        $pdf->setPaper('letter', 'portrait');
        return $pdf->download('Reporte-Arriendos.pdf');
    }
}
