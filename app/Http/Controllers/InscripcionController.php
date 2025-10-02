<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscripcion;
use App\Models\ActividadRecreacional;
use App\Models\Formacion;

class InscripcionController extends Controller
{
   public function mostrarFormulario(Request $request)
    {
        $tipo = $request->input('tipo');
        $formacion_id = $request->input('formacion_id');

        // Obtener todas las formaciones para los selects
        $talleres = Formacion::where('tipo', 'T')->get();
        $cursos = Formacion::where('tipo', 'C')->get();
        $diplomados = Formacion::where('tipo', 'D')->get();

        // Si viene de la página de formaciones, mostrar esa formación específica
        $formacion = null;
        $actividadRecreacional = null;
        
        if ($tipo && $formacion_id) {
            if ($tipo === 'R') {
                // Es una actividad recreacional
                $actividadRecreacional = ActividadRecreacional::find($formacion_id);
            } else {
                // Es una formación normal (Taller, Curso o Diplomado)
                $formacion = Formacion::where('tipo', $tipo)->find($formacion_id);
            }
        }

        return view('inscripcion', [
            'tipoSeleccionado' => $tipo,
            'formacion' => $formacion,
            'actividadRecreacional' => $actividadRecreacional,
            'talleres' => $talleres,
            'cursos' => $cursos,
            'diplomados' => $diplomados,
            'all_formaciones' => Formacion::all()->keyBy('id') // Para el JavaScript
        ]);
    }

   public function procesarFormulario(Request $request)
    {
        // Determinar qué formación se seleccionó
        $formacionId = $request->input('id_formacion');

        $formacion = Formacion::find($formacionId)->first();

        // Obtener la duración correcta
        $duracion = auth()->user() && auth()->user()->is_admin && $request->duracion 
                    ? $request->duracion 
                    : $request->duracion_predeterminada;

        $inscripcion = new Inscripcion();
        $inscripcion->nombre = $request->input('nombre');
        $inscripcion->cedula = $request->input('cedula');
        $inscripcion->estado = $request->input('estado');
        $inscripcion->estado_formacion = 'pendiente';

        $campo = match($formacion->tipo) {
            'T' => 'taller',
            'C' => 'curso',
            'D' => 'diplomado',
            'R' => null
        };
        $inscripcion->$campo = $request->input('nombre_formacion');

        $inscripcion->horas = $duracion;
        $inscripcion->tipo_formacion = $request->input('tipo_formacion');
        $inscripcion->facilitador = $request->input('facilitador');
        $inscripcion->codigo_facilitador = $request->input('codigo_facilitador');
        $inscripcion->user_id = auth()->id();
        
        if ($formacion) {
            $inscripcion->formacion_id = $formacion->id;
        }
        
        $inscripcion->save();

        return redirect()->back()->with('success', '¡Inscripción registrada correctamente!');
    }

    public function verPanel()
    {
        $inscripciones = Inscripcion::where('user_id', auth()->id())->get();
        return view('usuario.panel', compact('inscripciones'));
    }

    public function actualizarEstado(Request $request, $id)
    {
        $request->validate([
            'estado_formacion' => 'required|in:pendiente,aprobado,rechazado',
        ]);

        $inscripcion = Inscripcion::findOrFail($id);
        $inscripcion->estado_formacion = $request->estado_formacion;
        $inscripcion->save();

        return redirect()->back()->with('success', 'Estado actualizado correctamente.');
    }
}