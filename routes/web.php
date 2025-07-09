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

// Rutas públicas
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/historia', 'quienessomos')->name('historia');

// Rutas de autenticación
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

// Rutas protegidas por auth
Route::middleware(['auth'])->group(function () {
    // Panel de usuario
    Route::get('/usuario', [InscripcionController::class, 'verPanel'])->name('usuario.panel');
    
    // Rutas de formaciones
    Route::get('/formaciones', [FormacionController::class, 'index'])->name('formaciones.index');
    Route::get('/formaciones/{id}', [FormacionController::class, 'show'])->name('formaciones.show');
    Route::get('/formaciones/categoria/{categoria}', [FormacionController::class, 'filtrarPorCategoria'])->name('formaciones.categoria');
    
    // Rutas de certificados
    Route::get('/certificado/{tipo}/{id}', [CertificadoController::class, 'descargar'])->name('certificado.descargar');
});

// Rutas del facilitador (solo para usuarios con rol facilitador)
Route::middleware(['auth', 'facilitador'])->prefix('facilitador')->group(function () {
    Route::get('/dashboard', [FacilitadorController::class, 'index'])->name('facilitador.dashboard');
    Route::post('/inscripciones/{id}/aprobar', [FacilitadorController::class, 'aprobar'])->name('facilitador.aprobar');
    Route::post('/inscripciones/{id}/rechazar', [FacilitadorController::class, 'rechazar'])->name('facilitador.rechazar');
    Route::get('/inscripciones/{id}/evaluar', [FacilitadorController::class, 'evaluar'])->name('facilitador.evaluar');
    Route::post('/inscripciones/{id}/evaluar', [FacilitadorController::class, 'guardarEvaluacion'])->name('facilitador.guardar-evaluacion');
});

// Rutas del admin (solo para usuarios con rol admin)
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    // Dashboard admin
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    
    // CRUD usuarios
    Route::post('/admin/crear/usuario', [AdminController::class, 'create'])->name('admin.usuarios.create');
    Route::delete('/admin/usuarios/{id}', [AdminController::class, 'destroy'])->name('admin.usuarios.destroy');
    Route::put('/admin/usuarios/{id}', [AdminController::class, 'update'])->name('admin.usuarios.update');
    Route::get('/admin/usuarios/{id}/editar', [AdminController::class, 'edit'])->name('admin.usuarios.edit');
    
    // Inscripciones
    Route::put('/admin/inscripciones/{id}/estado', [InscripcionController::class, 'actualizarEstado'])
        ->name('inscripciones.actualizarEstado');
    
    // Certificados
    Route::get('/admin/certificados/{id}/descargar', [AdminController::class, 'descargarCertificado'])
        ->name('admin.certificados.descargar');
    
    // Aprobación de certificados
    Route::post('/admin/inscripciones/{id}/aprobar', [AdminController::class, 'aprobarInscripcion'])->name('admin.certificados.aprobar');
    Route::post('/admin/inscripciones/{id}/rechazar', [AdminController::class, 'rechazarInscripcion'])->name('admin.certificados.rechazar');
});

// Rutas de formaciones protegidas
Route::middleware(['auth'])->group(function () {
    Route::post('/formaciones', [FormacionController::class, 'store'])->name('formaciones.store');
});

// Rutas de formaciones con protección adicional
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/formaciones/{id}/edit', [FormacionController::class, 'edit'])->name('formaciones.edit');
    Route::put('/formaciones/{id}', [FormacionController::class, 'update'])->name('formaciones.update');
    Route::delete('/formaciones/{id}', [FormacionController::class, 'destroy'])->name('formaciones.destroy');
});