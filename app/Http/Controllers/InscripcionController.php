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
    $request->validate([
        'nombre' => 'required|string',
        'cedula' => 'required|string',
        'estado' => 'required|string',
        'taller' => 'nullable|required_if:tipo_formacion,T|string',
        'curso' => 'nullable|required_if:tipo_formacion,C|string',
        'diplomado' => 'nullable|required_if:tipo_formacion,D|string',
        'duracion' => 'nullable|integer',
        'tipo_formacion' => 'required|string|in:T,C,D',
        'facilitador' => 'nullable|string',
        'codigo_facilitador' => 'nullable|string',
            'formacion_id' => 'nullable|integer',
    ]);

    // Determinar qué formación se seleccionó
    $formacionSeleccionada = null;
    $formacionId = null;
    switch($request->tipo_formacion) {
        case 'T':
            $formacionSeleccionada = $request->taller;
            $formacion = Formacion::where('nombre', $request->taller)->where('tipo', 'T')->first();
            break;
        case 'C':
            $formacionSeleccionada = $request->curso;
            $formacion = Formacion::where('nombre', $request->curso)->where('tipo', 'C')->first();
            break;
        case 'D':
            $formacionSeleccionada = $request->diplomado;
            $formacion = Formacion::where('nombre', $request->diplomado)->where('tipo', 'D')->first();
            break;
    }

    // Obtener la duración correcta
    $duracion = auth()->user() && auth()->user()->is_admin && $request->duracion 
                ? $request->duracion 
                : $request->duracion_predeterminada;

    $inscripcion = new Inscripcion();
    $inscripcion->nombre = $request->input('nombre');
    $inscripcion->cedula = $request->input('cedula');
    $inscripcion->estado = $request->input('estado');
    $inscripcion->estado_formacion = 'pendiente';
    $inscripcion->taller = $request->input('taller');
    $inscripcion->curso = $request->input('curso');
    $inscripcion->diplomado = $request->input('diplomado');
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