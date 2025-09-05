<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InscripcionController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CertificadoController;
use App\Http\Controllers\FormacionController;
use App\Http\Controllers\FacilitadorController;
use App\Http\Controllers\ActividadRecreacionalController;


Route::get('/api/actividades/{id}/participantes', [ActividadRecreacionalController::class, 'getParticipantes']);


Route::get('/certificado/{tipo}/{id}', [CertificadoController::class, 'descargar'])
    ->middleware(['auth']) // si usas autenticación
    ->name('certificado.descargar');

// Rutas Admin Usuarios
Route::middleware(['auth', 'rol:admin'])->prefix('admin')->group(function () {
    // Dashboard principal del admin
  
    // Gestión de usuarios
    Route::post('/usuarios/crear', [AdminController::class, 'create'])->name('admin.usuarios.create'); // Corregida la URL para ser más clara
    Route::delete('/usuarios/{id}', [AdminController::class, 'destroy'])->name('admin.usuarios.destroy');
    Route::put('/usuarios/{id}', [AdminController::class, 'update'])->name('admin.usuarios.update');
    Route::get('/usuarios/{id}/editar', [AdminController::class, 'edit'])->name('admin.usuarios.edit'); // Si tienes un método 'edit' para usuarios
    
});
Route::middleware(['auth'])->group(function () {
    // Actividades recreacionales
    Route::put('actividades-recreacionales/{id}', [ActividadRecreacionalController::class, 'update'])
        ->name('actividades-recreacionales.update');
    Route::delete('actividades-recreacionales/{id}', [ActividadRecreacionalController::class, 'destroy'])
        ->name('actividades-recreacionales.destroy');
        Route::get('/actividades-recreacionales/{actividad}/participantes', [ActividadRecreacionalController::class, 'getParticipantes'])
    ->name('actividades-recreacionales.participantes');
});

// NUEVA RUTA PARA ACTUALIZAR ESTADO DE INSCRIPCIONES DESDE EL ADMIN
Route::put('/admin/inscripciones/{id}/estado', [InscripcionController::class, 'actualizarEstado'])
    ->name('inscripciones.actualizarEstado')
    ->middleware('auth');
Route::get('/admin/certificados/{id}/descargar', [AdminController::class, 'descargarCertificado'])
     ->name('admin.certificados.descargar');
// Rutas usuario
Route::middleware(['auth'])->prefix('admin')->group(function () {
 Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
Route::put('/certificados/{id}/aprobar', [AdminController::class, 'aprobarInscripcion'])->name('admin.certificados.aprobar');
   Route::put('/certificados/{id}/rechazar', [AdminController::class, 'rechazarInscripcion'])->name('admin.certificados.rechazar');
   });

Route::get('/usuario', [InscripcionController::class, 'verPanel'])->middleware('auth')->name('usuario.panel');

// Otras rutas existentes
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login')->name('login.submit');
    Route::post('/logout', 'logout')->name('logout');
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('/registro', 'showRegistrationForm')->name('registro');
    Route::post('/registro', 'register')->name('registro.submit');
});
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

Route::controller(AdminController::class)->group(function () {
    Route::get('/admin', 'index')->name('admin.dashboard');
    Route::post('/admin/crear/usuario', 'create')->name('admin.usuarios.create');
    Route::delete('/admin/usuarios/{id}', 'destroy')->name('admin.usuarios.destroy');
  
Route::resource('actividades-recreacionales', 'ActividadRecreacionalController');


});
// Ruta principal - Mostrar formaciones
Route::get('/', [FormacionController::class, 'index'])->name('home');

// Otras rutas de formaciones
Route::get('/formaciones', [FormacionController::class, 'index'])->name('formaciones.index');
Route::get('/formaciones/{id}', [FormacionController::class, 'show'])->name('formaciones.show');
Route::get('/formaciones/categoria/{categoria}', [FormacionController::class, 'filtrarPorCategoria'])->name('formaciones.categoria');

// Crear formación (protegido por auth)
Route::post('/formaciones', [FormacionController::class, 'store'])
    ->name('formaciones.store')
    ->middleware('auth');

// Rutas protegidas por auth y admin
Route::middleware(['auth'])->group(function () {
    // Editar (form)
    Route::get('/formaciones/{id}/edit', [FormacionController::class, 'edit'])
        ->name('formaciones.edit');
    
    // Actualizar
    Route::put('/formaciones/{id}', [FormacionController::class, 'update'])
        ->name('formaciones.update');
    
    // Eliminar
    Route::delete('/formaciones/{id}', [FormacionController::class, 'destroy'])
        ->name('formaciones.destroy');
    Route::middleware(['auth'])->prefix('facilitador')->group(function () {
    Route::get('/dashboard', [FacilitadorController::class, 'index'])->name('facilitador.index');
     Route::post('/dashboard', [FacilitadorController::class, 'index'])->name('facilitador.index');
    Route::post('/inscripciones/{id}/aprobar', [FacilitadorController::class, 'aprobar'])->name('facilitador.aprobar');
    Route::post('/inscripciones/{id}/rechazar', [FacilitadorController::class, 'rechazar'])->name('facilitador.rechazar');
    Route::get('/inscripciones/{id}/evaluar', [FacilitadorController::class, 'evaluar'])->name('facilitador.evaluar');
    // Si tienes un método para guardar la evaluación, asegúrate de que el método exista en el controlador
    // y que tenga la lógica de validación y guardado
    Route::post('/inscripciones/{id}/evaluar', [FacilitadorController::class, 'guardarEvaluacion'])->name('facilitador.guardar-evaluacion');
    // Actividades recreacionales
    Route::prefix('admin')->group(function() {
    Route::get('/actividades', [ActividadController::class, 'index']);
    Route::post('/actividades/import', [ActividadController::class, 'import'])->name('actividades.import');
    Route::post('/admin/actividades/import', [AdminController::class, 'importarActividades'])
     ->name('admin.actividades.import');
     // Rutas para debugging
Route::get('/debug/participantes-table', [ActividadRecreacionalController::class, 'debugTable']);
Route::get('/debug/actividad/{id}', [ActividadRecreacionalController::class, 'checkActividadData']);
});


});
});