<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InscripcionController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CertificadoController;
use App\Http\Controllers\FormacionController;
use App\Http\Controllers\FacilitadorController;
use App\Http\Controllers\ActividadRecreacionalController;
use App\Http\Controllers\Api\ActividadParticipanteController;

// Ruta principal - Mostrar formaciones
Route::get('/', [FormacionController::class, 'index'])->name('home');

// Otras rutas de formaciones
Route::get('/formaciones', [FormacionController::class, 'index'])->name('formaciones.index');
Route::get('/formaciones/{id}', [FormacionController::class, 'show'])->name('formaciones.show');
Route::get('/formaciones/categoria/{categoria}', [FormacionController::class, 'filtrarPorCategoria'])->name('formaciones.categoria');

// Autenticación
Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login')->name('login.submit');
    Route::post('/logout', 'logout')->name('logout');
});

// Registro
Route::controller(RegisterController::class)->group(function () {
    Route::get('/registro', 'showRegistrationForm')->name('registro');
    Route::post('/registro', 'register')->name('registro.submit');
});

// Inscripción
Route::get('/inscribirse', function () {
    if (auth('web')->check()) {
        return redirect()->route('inscripcion.formulario');
    } else {
        return redirect()->route('registro');
    }
})->name('inscribirse');

Route::get('/inscripcion', [InscripcionController::class, 'mostrarFormulario'])->name('inscripcion.formulario');
Route::post('/inscripcion', [InscripcionController::class, 'procesarFormulario'])->name('inscribir');

Route::view('/historia', 'quienessomos')->name('historia');

// Dashboard admin
Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

// Certificado
Route::get('/certificado/{tipo}/{id}', [CertificadoController::class, 'descargar'])
    ->middleware(['auth'])
    ->name('certificado.descargar');

// API
Route::get('/api/actividades/{id}/participantes', [ActividadRecreacionalController::class, 'getParticipantes']);

// Rutas Admin Usuarios
Route::middleware(['auth', 'rol:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('/usuarios/crear', [AdminController::class, 'create'])->name('admin.usuarios.create');
    Route::delete('/usuarios/{id}', [AdminController::class, 'destroy'])->name('admin.usuarios.destroy');
    Route::put('/usuarios/{id}', [AdminController::class, 'update'])->name('admin.usuarios.update');
    Route::get('/usuarios/{id}/editar', [AdminController::class, 'edit'])->name('admin.usuarios.edit');
    
    // Certificados admin
    Route::get('/certificados/{id}/descargar', [AdminController::class, 'descargarCertificado'])
        ->name('admin.certificados.descargar');
    Route::put('/certificados/{id}/aprobar', [AdminController::class, 'aprobarInscripcion'])
        ->name('admin.certificados.aprobar');
    Route::put('/certificados/{id}/rechazar', [AdminController::class, 'rechazarInscripcion'])
        ->name('admin.certificados.rechazar');
    
    // Importar actividades
    Route::post('/actividades/import', [AdminController::class, 'importarActividades'])
        ->name('admin.actividades.import');
});

// Rutas autenticadas
Route::middleware(['auth'])->group(function () {
    // Panel usuario
    Route::get('/usuario', [InscripcionController::class, 'verPanel'])->name('usuario.panel');
    
    // Actividades recreacionales
    Route::put('actividades-recreacionales/{id}', [ActividadRecreacionalController::class, 'update'])
        ->name('actividades-recreacionales.update');
    Route::delete('actividades-recreacionales/{id}', [ActividadRecreacionalController::class, 'destroy'])
        ->name('actividades-recreacionales.destroy');
    Route::get('/actividades-recreacionales/{actividad}/participantes', [ActividadRecreacionalController::class, 'getParticipantes'])
        ->name('actividades-recreacionales.participantes');
    
    // Formaciones
    Route::post('/formaciones', [FormacionController::class, 'store'])
        ->name('formaciones.store');
    Route::get('/formaciones/{id}/edit', [FormacionController::class, 'edit'])
        ->name('formaciones.edit');
    Route::put('/formaciones/{id}', [FormacionController::class, 'update'])
        ->name('formaciones.update');
    Route::delete('/formaciones/{id}', [FormacionController::class, 'destroy'])
        ->name('formaciones.destroy');
    
    // Inscripciones
    Route::put('/admin/inscripciones/{id}/estado', [InscripcionController::class, 'actualizarEstado'])
        ->name('inscripciones.actualizarEstado');
});

// Rutas Facilitador
Route::middleware(['auth'])->prefix('facilitador')->group(function () {
    Route::get('/dashboard', [FacilitadorController::class, 'index'])->name('facilitador.index');
    Route::post('/dashboard', [FacilitadorController::class, 'index'])->name('facilitador.index');
    Route::post('/inscripciones/{id}/aprobar', [FacilitadorController::class, 'aprobar'])->name('facilitador.aprobar');
    Route::post('/inscripciones/{id}/rechazar', [FacilitadorController::class, 'rechazar'])->name('facilitador.rechazar');
    Route::get('/inscripciones/{id}/evaluar', [FacilitadorController::class, 'evaluar'])->name('facilitador.evaluar');
    Route::post('/inscripciones/{id}/evaluar', [FacilitadorController::class, 'guardarEvaluacion'])->name('facilitador.guardar-evaluacion');
});

// Rutas para debugging (opcionales)
Route::get('/debug/participantes-table', [ActividadRecreacionalController::class, 'debugTable']);
Route::get('/debug/actividad/{id}', [ActividadRecreacionalController::class, 'checkActividadData']);
Route::get('/actividades/{actividad}/participantes', [Api\ActividadParticipanteController::class, 'getParticipantes']);

// Resource para actividades recreacionales
Route::resource('actividades-recreacionales', ActividadRecreacionalController::class);


Route::get('/participantes-recreacionales/{taller}', [ActividadParticipanteController::class, 'getParticipantesRecreacionales'])->name('getParticipantes.recreacionales');