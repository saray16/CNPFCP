<?php

namespace App\Http\Controllers;

use App\Models\Formacion;
use App\Models\Inscripcion;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


class FacilitadorController extends BaseController
{
     use AuthorizesRequests, ValidatesRequests;
       public function __construct()
    {
        $this->middleware('auth');
          $this->middleware('facilitador');
    }

    public function index()
    {
        // Obtener formaciones donde el usuario es facilitador con sus inscripciones
        $formaciones = Formacion::with(['inscripciones.user'])
            ->where('facilitador_id', auth()->id())
            ->get();

        return view('facilitador.dashboard', [
            'formaciones' => $formaciones,
            'esFacilitador' => true
        ]);
    }

    public function verEstudiantes($id)
    {
        $formacion = Formacion::with(['inscripciones.user'])
            ->where('facilitador_id', auth()->id())
            ->findOrFail($id);
        
        return view('facilitador.estudiantes', compact('formacion'));
    }
    public function aprobar($id)
    {
        // Versión mejorada de tu método original
        $inscripcion = Inscripcion::whereHas('formacion', function($q) {
            $q->where('facilitador_id', auth()->id());
        })->findOrFail($id);
        
        
    if (!is_null($inscripcion->aprobado_por_facilitador)) {
        return back()->with('error', 'Ya has tomado una decisión sobre este certificado');
    }
   if($inscripcion->aprobado_por_facilitador === true) {
        return back()->with('error', 'Este certificado ya fue aprobado');
    }

        $inscripcion->update([
            'aprobado_por_facilitador' => true,
            'fecha_aprobacion' => now(),
            'facilitador_id' => auth()->id()
        ]);

        return back()->with('success', 'Certificado aprobado correctamente');
    }

    public function rechazar($id)
    {
        // Versión mejorada de tu método original
        $inscripcion = Inscripcion::whereHas('formacion', function($q) {
            $q->where('facilitador_id', auth()->id());
        })->findOrFail($id);

        $inscripcion->update([
            'aprobado_por_facilitador' => false,
            'fecha_aprobacion' => now(),
            'facilitador_id' => auth()->id()
        ]);

        return back()->with('success', 'Certificado rechazado');
    }
    
    // Nuevo método para evaluación detallada (opcional)
    public function evaluar($id)
    {
        $inscripcion = Inscripcion::with(['user', 'formacion'])
                            ->whereHas('formacion', function($q) {
                                $q->where('facilitador_id', auth()->id());
                            })
                            ->findOrFail($id);

        return view('facilitador.evaluar', compact('inscripcion'));
    }
}