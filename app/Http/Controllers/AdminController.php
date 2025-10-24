<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Materia;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    
    public function index()
    {

        $total_carreras = Carrera::count();
        $total_materias = Materia::count();
        
        $porcentaje_completado = 65;
        $documentos_completos = 10; 
        $documentos_pendientes = 3;
        $total_documentos = 16;
        
        return view('admin.index',compact('total_carreras','total_materias','porcentaje_completado',
                                          'documentos_completos','documentos_pendientes','total_documentos'));
    }
}
