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
        $inscripciones = Inscripcion::all();
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

    // Solo permite aprobar si el facilitador ya aprobó
    if ($inscripcion->aprobado_por_facilitador !== true) {
        return redirect()->back()->with('error', 'El facilitador aún no ha aprobado este certificado.');
    }

    $inscripcion->estado_formacion = 'aprobado';
    $inscripcion->aprobado_por_admin = true;
    $inscripcion->save();

    return redirect()->back()->with('success', 'Inscripción aprobada correctamente.');
}

public function rechazarInscripcion($id)
{
    $inscripcion = Inscripcion::findOrFail($id);

    // Puedes decidir si quieres permitir rechazar aunque el facilitador no haya aprobado
    $inscripcion->estado_formacion = 'rechazado';
    $inscripcion->aprobado_por_admin = false;
    $inscripcion->save();

    return redirect()->back()->with('success', 'Inscripción rechazada correctamente.');
}


}
