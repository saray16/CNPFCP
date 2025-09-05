<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Inscripcion;        // Agregado para certificados
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        $totalUsuarios = $usuarios->count();
        $control_estudio = DB::table('control_de_estudios')->take(10)->get();
        $inscripciones = Inscripcion::whereIn('estado_formacion', [
            'pendiente_admin', 
            'rechazado_facilitador', 
            'aprobado', 
            'rechazado_admin'
        ])
        ->with(['user']) // Cargar relación user si existe
        ->latest()
        ->get();
        
         $actividades = \App\Models\ActividadRecreacional::with('participantes')->get();
    return view('dashboard', compact('usuarios', 'control_estudio', 'totalUsuarios', 'inscripciones'));
}

    public function create(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'rol' => 'required|in:admin,usuario',
            'password' => 'required|string|min:6',
        ]);
    
        User::create([
            'name' => $request->nombre,
            'email' => $request->email,
            'rol' => $request->rol,
            'password' => Hash::make($request->password),
        ]);
    
        return redirect()->route('admin.dashboard')->with('success', 'Usuario creado correctamente.');
    }
    
    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:255', // Cambiado de 'name' a 'nombre'
            'email' => 'required|email|unique:users,email,'.$usuario->id,
            'rol' => 'required|in:admin,usuario',
            'password' => 'nullable|min:6' // Hacer el password opcional
        ]);

        $data = [
            'name' => $request->nombre, // Mapear 'nombre' del request a 'name' en la BD
            'email' => $request->email,
            'rol' => $request->rol,
        ];

        // Solo actualizar password si se proporcionó uno nuevo
        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $usuario->update($data);

        return redirect()->route('admin.dashboard')->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Usuario eliminado correctamente.');
    }

    // ------------------------------------------
    // NUEVAS FUNCIONES PARA SUBIR CERTIFICADOS PDF
    // ------------------------------------------

    // Mostrar formulario para subir/editar certificado
    public function editarCertificado($id)
    {
        $inscripcion = Inscripcion::findOrFail($id);
        return view('admin.certificado_edit', compact('inscripcion'));
    }

    // Guardar certificado PDF
    public function actualizarCertificado(Request $request, $id)
    {
        $request->validate([
            'certificado_pdf' => 'required|mimes:pdf|max:5120', // máximo 5MB
        ]);

        $inscripcion = Inscripcion::findOrFail($id);

        // Eliminar certificado viejo si existe
        if ($inscripcion->certificado_pdf_path) {
            Storage::delete($inscripcion->certificado_pdf_path);
        }

        // Guardar nuevo archivo
        $path = $request->file('certificado_pdf')->store('certificados');

        // Guardar ruta en DB
        $inscripcion->certificado_pdf_path = $path;
        $inscripcion->save();

        return redirect()->route('admin.dashboard')->with('success', 'Certificado PDF actualizado correctamente.');
    }

public function aprobarInscripcion($id)
{
    $inscripcion = Inscripcion::findOrFail($id);
    
    // Validar que el facilitador ya lo aprobó
  //  if($inscripcion->aprobado_por_facilitador !== true) {
      //  return back()->with('error', 'El facilitador debe aprobar primero esta inscripción');
   // }

    $inscripcion->update([
        'aprobado_por_admin' => true,
        'fecha_aprobacion_admin' => now(),
        'estado_formacion' => 'aprobado' // Estado final
    ]);

    return back()->with('success', 'Certificado aprobado. El usuario puede descargarlo ahora.');
}


public function rechazarInscripcion($id, Request $request)
{
    $request->validate(['motivo' => 'required|string|max:500']);
    
    $inscripcion = Inscripcion::findOrFail($id);

    $inscripcion->update([
        'aprobado_por_admin' => false,
        'fecha_aprobacion_admin' => now(),
        'comentarios_rechazo_admin' => $request->motivo,
        'comentarios_rechazo_facilitador' => null, // Limpiar comentario previo de facilitador si existía
        'estado_formacion' => 'rechazado_admin'
    ]);

    return back()->with('success', 'Inscripción rechazada. El usuario será notificado.');
}

}
