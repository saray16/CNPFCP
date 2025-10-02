<?php

namespace App\Http\Controllers;

use App\Models\Formacion;
use App\Models\Inscripcion;
use Illuminate\Support\Facades\DB;
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
        $this->middleware(\App\Http\Middleware\RolFacilitador::class);
    }

    // Obtener formaciones donde el usuario es facilitador con sus inscripciones
    public function index()
    {
        $inscripciones = Inscripcion::all();
        return view('facilitador.index', [
            'inscripciones' => $inscripciones,
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


    public function aprobar(Inscripcion $item)
    {
        $inscripcion = $item;
        $inscripcion->update([
            'aprobado_por_facilitador' => true,
            'fecha_aprobacion_facilitador' => now(),
            'estado_formacion' => 'pendiente_admin' // Nuevo estado para aprobación del admin
        ]);

        return back()->with('success', 'Inscripción aprobada. Esperando aprobación del administrador.');
    }



    public function rechazar(Request $request)
    {
        dd($request->input());
        $request->validate([
            'motivo' => 'required|string|max:500'
        ]);
        
        $inscripcion = Inscripcion::findOrFail($id);
        
        // Validar que el usuario actual es facilitador de esta formación
        $esFacilitador = false;
        
        if ($inscripcion->tipo_formacion === 'C' && $inscripcion->curso_facilitador_id == auth()->id()) {
            $esFacilitador = true;
        } elseif ($inscripcion->tipo_formacion === 'T' && $inscripcion->taller_facilitador_id == auth()->id()) {
            $esFacilitador = true;
        } elseif ($inscripcion->tipo_formacion === 'D' && $inscripcion->diplomado_facilitador_id == auth()->id()) {
            $esFacilitador = true;
        }
        
        if (!$esFacilitador) {
            return back()->with('error', 'No tienes permiso para rechazar esta inscripción');
        }

        // Actualizar la inscripción
        $inscripcion->update([
            'aprobado_por_facilitador' => false,
            'fecha_aprobacion_facilitador' => now(),
            'comentarios_rechazo_facilitador' => $request->motivo,
            'estado_formacion' => 'rechazado_facilitador'
        ]);
        

        return redirect()->route('facilitador.index')
            ->with('success', 'Certificado rechazado. El administrador ha sido notificado.');
    }

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