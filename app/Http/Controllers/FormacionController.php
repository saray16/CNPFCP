<?php

namespace App\Http\Controllers;

use App\Models\Formacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Models\ActividadRecreacional;

class FormacionController extends Controller
{
    public function index()
{
    // Obtener las formaciones normales
    $talleres = Formacion::where('tipo', 'T')
        ->disponibles()
        ->orderBy('disponible_hoy', 'desc')
        ->orderBy('created_at', 'desc')
        ->get(['id', 'nombre', 'tipo', 'descripcion', 'facilitador', 'categoria', 'duracion', 'disponible_hoy', 'icono']);

    $cursos = Formacion::where('tipo', 'C')
        ->disponibles()
        ->orderBy('disponible_hoy', 'desc')
        ->orderBy('created_at', 'desc')
        ->get(['id', 'nombre', 'tipo', 'descripcion', 'facilitador', 'categoria', 'duracion', 'disponible_hoy', 'icono']);

    $diplomados = Formacion::where('tipo', 'D')
        ->disponibles()
        ->orderBy('disponible_hoy', 'desc')
        ->orderBy('created_at', 'desc')
        ->get(['id', 'nombre', 'tipo', 'descripcion', 'facilitador', 'categoria', 'duracion', 'disponible_hoy', 'icono']);

    // Obtener actividades recreacionales y convertirlas en formaciones
    $actividadesRecreacionales = ActividadRecreacional::orderBy('fecha')
        ->orderBy('hora_inicio')
        ->get();

    // Agregar actividades recreacionales como talleres
    foreach ($actividadesRecreacionales as $actividad) {
        $talleres->push((object)[
            'id' => $actividad->id,
            'nombre' => $actividad->nombre,
            'descripcion' => $actividad->tipo . ' para ' . $actividad->rango_edad,
            'tipo' => 'T',
            'categoria' => 'Plan Recreacional',
            'duracion' => $actividad->horas_formacion,
            'disponible_hoy' => true,
            'fecha' => $actividad->fecha,
            'hora_inicio' => $actividad->hora_inicio,
            'hora_fin' => $actividad->hora_fin,
            'rango_edad' => $actividad->rango_edad,
            'semana' => $actividad->semana,
            'icono' => 'bi-emoji-smile',
            'rating' => '5.0',
            'facilitador' => null // O puedes agregar un facilitador si lo necesitas
        ]);
    }

    return view('welcome', compact('talleres', 'cursos', 'diplomados', 'actividadesRecreacionales'));
}

    public function show($id)
    {
        $formacion = Formacion::disponibles()->findOrFail($id);
        return view('formaciones.show', compact('formacion'));
    }

    public function filtrarPorCategoria($categoria)
    {
        $query = Formacion::disponibles()
             ->select(['id', 'nombre', 'tipo', 'descripcion', 'facilitador', 'categoria', 'duracion', 'disponible_hoy', 'icono', 'cupos_disponibles'])
             ->orderBy('disponible_hoy', 'desc')
             ->orderBy('created_at', 'desc');

    if ($categoria === 'hoy') {
        $query->where('disponible_hoy', true);
          } elseif ($categoria === 'Plan Recreacional') {
    } elseif ($categoria !== 'all') {
        $query->where('categoria', $categoria);
    }

    $formaciones = $query->paginate(6);
    return view('formaciones.index', compact('formaciones', 'categoria'));
}
public function store(Request $request)
{
    // Forzar respuesta JSON
    $request->headers->set('Accept', 'application/json');

    // Validación directa con Request
    $validated = $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'required|string',
        'tipo' => 'required|in:T,C,D',
        'categoria' => 'required|string',
        'duracion' => 'nullable|integer|min:1',
        'disponible_hoy' => 'required|boolean',
          'facilitador' => 'nullable|string|max:255',
    ]);

    try {
        $formacion = Formacion::create([
            'nombre' => $validated['nombre'],
            'descripcion' => $validated['descripcion'],
            'tipo' => $validated['tipo'],
            'categoria' => $validated['categoria'],
            'duracion' => $validated['duracion'] ?? null,
            'disponible_hoy' => $validated['disponible_hoy'],
            'facilitador' => $validated['facilitador'] ?? null,
            'icono' => $this->getIconForCategory($validated['categoria']),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Formación creada exitosamente',
            'data' => $formacion
        ], 200, [
            'Content-Type' => 'application/json; charset=utf-8'
        ], JSON_UNESCAPED_UNICODE);

    } catch (\Exception $e) {
        Log::error('Error al crear formación: '.$e->getMessage());
        return response()->json([
            'success' => false,
            'message' => 'Error interno del servidor',
            'error' => env('APP_DEBUG') ? $e->getMessage() : null
        ], 500, [
            'Content-Type' => 'application/json; charset=utf-8'
        ], JSON_UNESCAPED_UNICODE);
    }
}
    public function edit($id)
    {
        $formacion = Formacion::disponibles()->findOrFail($id);
        return view('formaciones.edit', compact('formacion'));
    }

   public function update(Request $request, $id)
{
    $validated = $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'required|string',
        'tipo' => 'required|in:T,C,D',
        'categoria' => 'required|string',
        'duracion' => 'nullable|integer|min:1',
        'disponible_hoy' => 'required|boolean',
          'facilitador' => 'nullable|string|max:255',
    ]);

    try {
        $formacion = Formacion::findOrFail($id);
        
        $formacion->update([
            'nombre' => $validated['nombre'],
            'descripcion' => $validated['descripcion'],
            'tipo' => $validated['tipo'],
            'categoria' => $validated['categoria'],
            'duracion' => $validated['duracion'] ?? null, // Corregir si es 'duracion' o 'duración'
            'disponible_hoy' => $validated['disponible_hoy'],
            'facilitador' => $validated['facilitador'] ?? null,
            'icono' => $this->getIconForCategory($validated['categoria']),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Formación actualizada exitosamente',
            'data' => $formacion
        ], 200, ['Content-Type' => 'application/json;charset=UTF-8'], JSON_UNESCAPED_UNICODE);

    } catch (\Exception $e) {
        Log::error('Error al actualizar formación: ' . $e->getMessage());
        return response()->json([
            'success' => false,
            'message' => 'Error al actualizar la formación: ' . $e->getMessage()
        ], 500, ['Content-Type' => 'application/json;charset=UTF-8'], JSON_UNESCAPED_UNICODE);
    }
}
    public function destroy($id)
    {
        try {
            $formacion = Formacion::findOrFail($id);
            $formacion->delete();

            return redirect()->route('formaciones.index')
                ->with('success', 'Formación eliminada exitosamente');

        } catch (\Exception $e) {
            Log::error('Error al eliminar formación: ' . $e->getMessage());
            return back()->with('error', 'Error al eliminar la formación');
        }
    }

    private function getIconForCategory($category)
    {
        $icons = [
            'Biología' => 'bi-flower3',
            'Física' => 'bi-eyedropper',
            'Química' => 'bi-funnel',
            'Matemática' => 'bi-calculator',
            'Artes' => 'bi-palette',
            'Idiomas' => 'bi-translate',
            'Tecnología' => 'bi-cpu',
            'Ambiente' => 'bi-tree',
            'OCEV' => 'bi-clipboard-data',
            'Ajedrez' => 'bi-chess',
            'Lectura/Escritura' => 'bi-book',
            'TICs' => 'bi-laptop',
            'EIS' => 'bi-lightbulb',
            'Deporte' => 'bi-trophy',
            'HSE' => 'bi-shield-check',
        ];

        return $icons[$category] ?? 'bi-journal-bookmark';
    }
    
    
}