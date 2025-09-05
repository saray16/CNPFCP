<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ControlEstudio;
use App\Models\Inscripcion;
use App\Models\ActividadRecreacional;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CuentoImport;
use App\Imports\AjedrezImport;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $usuarios = User::all();
        $control_estudio = ControlEstudio::all();
        $inscripciones = Inscripcion::whereIn('estado_formacion', ['pendiente_admin', 'rechazado_facilitador'])->get();
        $actividades = ActividadRecreacional::with('participantes')->get();

        return view('admin.index', compact('usuarios', 'control_estudio', 'inscripciones', 'actividades'));
    }

    public function importar(Request $request)
    {
        $request->validate([
            'tipo' => 'required|in:cuento,ajedrez',
            'archivo' => 'required|mimes:xlsx,xls'
        ]);
        
        try {
            if($request->tipo == 'cuento') {
                Excel::import(new CuentoImport, $request->file('archivo'));
            } else {
                Excel::import(new AjedrezImport, $request->file('archivo'));
            }
            
            return back()->with('success', 'Datos importados correctamente');
        } catch (\Exception $e) {
            return back()->with('error', 'Error al importar: '.$e->getMessage());
        }
    }
}