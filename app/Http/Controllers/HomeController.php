<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formacion;

class HomeController extends Controller
{
    public function index()
    {
        
        // Obtener todas las categorías disponibles para el sidebar
        $categorias = Formacion::select('categoria')
            ->whereNotNull('categoria')
            ->distinct()
            ->pluck('categoria');
            
        // Obtener formaciones por tipo, ordenadas y paginadas
        $talleres = $this->getFormacionesPorTipo('Taller');
        $cursos = $this->getFormacionesPorTipo('Curso');
        $diplomados = $this->getFormacionesPorTipo('Diplomado');

        return view('welcome', compact('talleres', 'cursos', 'diplomados', 'categorias',));
    }

    protected function getFormacionesPorTipo($tipo)
    {
        return Formacion::porTipo($tipo)
            ->disponibles()
            ->orderBy('disponible_hoy', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(6); // Paginación para mejor rendimiento
    }

    // Método para filtrar por categoría
    public function filtrarPorCategoria($categoria)
    {
        $formaciones = Formacion::porCategoria($categoria)
            ->disponibles()
            ->orderBy('disponible_hoy', 'desc')
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        return view('formaciones.index', compact('formaciones', 'categoria'));
    }
}