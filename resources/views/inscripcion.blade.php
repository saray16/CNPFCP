@extends('layouts.app')

@section('title', 'Formulario de Inscripción')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Encabezado con icono -->
            <div class="text-center mb-5">
                <div class="icon-circle bg-primary text-white mb-3">
                    <i class="bi bi-pencil-square fs-3"></i>
                </div>
                <h1 class="fw-bold text-gradient">Formulario de Inscripción</h1>
                <p class="text-muted">Complete todos los campos requeridos para inscribirse en la formación</p>
            </div>

            <!-- Alertas -->
            @if (session('success'))
                <div class="alert alert-success alert-elegant alert-dismissible fade show" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-check-circle-fill me-2 fs-4"></i>
                        <div>{{ session('success') }}</div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger alert-elegant alert-dismissible fade show" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-exclamation-triangle-fill me-2 fs-4"></i>
                        <div>
                            <h5 class="alert-heading mb-2">Por favor corrige los siguientes errores:</h5>
                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
<!-- Después de las alertas y antes del formulario -->
@if(isset($actividadRecreacional) && $actividadRecreacional)
<div class="card mb-4 shadow-sm" id="formacion-details" style="max-width: 700px; margin: auto; border: 1px solid #dbe9f6; background-color: #f8fbfd;">
    <div class="card-header" style="background-color: #1e3a8a; color: #fff; padding: 0.75rem 1rem;">
        <h5 class="mb-0 fw-semibold">Detalles de la Actividad Recreacional</h5>
    </div>
    <div class="card-body py-3 px-4 d-flex flex-wrap align-items-center gap-3" style="background-color: #e6f0fa;">
        <div class="flex-grow-1">
            <h4 class="mb-1" id="formacion-nombre" style="color: #1e40af; font-size: 1.25rem;">{{ $actividadRecreacional->nombre }}</h4>
            <div class="d-flex flex-wrap gap-2 mb-2">
                <span class="badge bg-primary">{{ $actividadRecreacional->tipo }}</span>
                <span class="badge bg-secondary">{{ $actividadRecreacional->edades }}</span>
            </div>
            <div class="text-muted small">
                <div><i class="bi bi-calendar me-1"></i> {{ $actividadRecreacional->fecha_inicio }} - {{ $actividadRecreacional->fecha_fin }}</div>
                <div><i class="bi bi-clock me-1"></i> {{ $actividadRecreacional->horario }}</div>
                <div><i class="bi bi-geo-alt me-1"></i> {{ $actividadRecreacional->espacio }}</div>
            </div>
        </div>
        <div class="facilitador-card p-3 rounded border d-flex align-items-center" style="min-width: 220px; background-color: #f1f5f9; border-color: #cbd5e1;">
            <i class="fas fa-chalkboard-teacher" style="color: #2563eb; font-size: 1.25rem; margin-right: 0.75rem;"></i>
            <div>
                <h6 class="mb-0 fw-semibold" id="formacion-facilitador" style="font-size: 1rem; color: #1e3a8a;">{{ $actividadRecreacional->facilitador ?? 'Por asignar' }}</h6>
                <small style="font-size: 0.8rem; color: #6b7280;">Actividad Recreacional</small>
            </div>
        </div>
    </div>
</div>

@elseif(isset($formacion) && $formacion)
<div class="card mb-4 shadow-sm" id="formacion-details" style="max-width: 700px; margin: auto; border: 1px solid #dbe9f6; background-color: #f8fbfd;">
    <div class="card-header" style="background-color: #1e3a8a; color: #fff; padding: 0.75rem 1rem;">
        <h5 class="mb-0 fw-semibold">Detalles de la Formación</h5>
    </div>
    <div class="card-body py-3 px-4 d-flex flex-wrap align-items-center gap-3" style="background-color: #e6f0fa;">
        <div class="flex-grow-1">
            <h4 class="mb-1" id="formacion-nombre" style="color: #1e40af; font-size: 1.25rem;">{{ $formacion->nombre }}</h4>
            <p class="text-muted mb-0" id="formacion-descripcion" style="font-size: 0.9rem; line-height: 1.4; color: #4b5563;">{{ $formacion->descripcion }}</p>
        </div>
        <div class="facilitador-card p-3 rounded border d-flex align-items-center" style="min-width: 220px; background-color: #f1f5f9; border-color: #cbd5e1;">
            <i class="fas fa-chalkboard-teacher" style="color: #2563eb; font-size: 1.25rem; margin-right: 0.75rem;"></i>
            <div>
                <h6 class="mb-0 fw-semibold" id="formacion-facilitador" style="font-size: 1rem; color: #1e3a8a;">{{ $formacion->facilitador ?? 'Por asignar' }}</h6>
                <small id="formacion-categoria-text" style="font-size: 0.8rem; color: #6b7280;">Experto en {{ $formacion->categoria }}</small>
            </div>
        </div>
    </div>
</div>
@endif


            <!-- Formulario -->
            <div class="card shadow-sm border-0">
                <div class="card-body p-4 p-md-5">
                    <form method="POST" action="{{ route('inscribir') }}" class="needs-validation" novalidate>
                        @csrf

                        <!-- Sección 1: Datos del Participante -->
                        <div class="mb-5">
                            <div class="section-header mb-4">
                                <div class="section-icon">
                                    <i class="bi bi-person-badge"></i>
                                </div>
                                <h2 class="section-title">Datos del Participante</h2>
                            </div>

                            <div class="row g-3">
                                <!-- Nombre -->
                                <div class="col-md-12">
                                    <div class="form-floating">
                                        <input type="text" id="nombre" name="nombre" class="form-control" 
                                               placeholder="Nombre completo" required value="{{ old('nombre') }}">
                                        <label for="nombre" class="form-label">Nombre y Apellido <span class="text-danger">*</span></label>
                                        <div class="invalid-feedback">
                                            Por favor ingrese su nombre completo
                                        </div>
                                    </div>
                                </div>

                                <!-- Cédula y Estado -->
                            <div class="col-md-6">
    <div class="form-floating">
        <div class="input-group">
            <select class="form-select" id="tipo_cedula" name="tipo_cedula" style="max-width: 80px;" required>
                <option value="V" {{ old('tipo_cedula') == 'V' ? 'selected' : '' }}>V</option>
                <option value="E" {{ old('tipo_cedula') == 'E' ? 'selected' : '' }}>E</option>
                <option value="J" {{ old('tipo_cedula') == 'J' ? 'selected' : '' }}>J</option>
                <option value="P" {{ old('tipo_cedula') == 'P' ? 'selected' : '' }}>P</option>
            </select>
            <input type="text" id="cedula" name="cedula" class="form-control" 
                   placeholder="Número" required value="{{ old('cedula') }}"
                   pattern="\d{6,8}" title="Formato: 12345678 (6-8 dígitos)">
            <label for="cedula" class="form-label position-absolute" style="top: -10px; left: 90px; background: white; padding: 0 5px; z-index: 5;">Cédula <span class="text-danger">*</span></label>
        </div>
        <div class="invalid-feedback">
            Ingrese un número de cédula válido (6-8 dígitos)
        </div>
    </div>
</div>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select id="estado" name="estado" class="form-select" required>
                                            <option value="" disabled selected>Seleccione un estado</option>
                                            <option value="Amazonas" {{ old('estado') == 'Amazonas' ? 'selected' : '' }}>Amazonas</option>
                                            <option value="Anzoátegui" {{ old('estado') == 'Anzoátegui' ? 'selected' : '' }}>Anzoátegui</option>
                                            <option value="Apure" {{ old('estado') == 'Apure' ? 'selected' : '' }}>Apure</option>
                                            <option value="Aragua" {{ old('estado') == 'Aragua' ? 'selected' : '' }}>Aragua</option>
                                            <option value="Barinas" {{ old('estado') == 'Barinas' ? 'selected' : '' }}>Barinas</option>
                                            <option value="Bolívar" {{ old('estado') == 'Bolívar' ? 'selected' : '' }}>Bolívar</option>
                                            <option value="Carabobo" {{ old('estado') == 'Carabobo' ? 'selected' : '' }}>Carabobo</option>
                                            <option value="Cojedes" {{ old('estado') == 'Cojedes' ? 'selected' : '' }}>Cojedes</option>
                                            <option value="Delta Amacuro" {{ old('estado') == 'Delta Amacuro' ? 'selected' : '' }}>Delta Amacuro</option>
                                            <option value="Distrito Capital" {{ old('estado') == 'Distrito Capital' ? 'selected' : '' }}>Distrito Capital</option>
                                            <option value="Falcón" {{ old('estado') == 'Falcón' ? 'selected' : '' }}>Falcón</option>
                                            <option value="Guárico" {{ old('estado') == 'Guárico' ? 'selected' : '' }}>Guárico</option>
                                            <option value="Lara" {{ old('estado') == 'Lara' ? 'selected' : '' }}>Lara</option>
                                            <option value="Mérida" {{ old('estado') == 'Mérida' ? 'selected' : '' }}>Mérida</option>
                                            <option value="Miranda" {{ old('estado') == 'Miranda' ? 'selected' : '' }}>Miranda</option>
                                            <option value="Monagas" {{ old('estado') == 'Monagas' ? 'selected' : '' }}>Monagas</option>
                                            <option value="Nueva Esparta" {{ old('estado') == 'Nueva Esparta' ? 'selected' : '' }}>Nueva Esparta</option>
                                            <option value="Portuguesa" {{ old('estado') == 'Portuguesa' ? 'selected' : '' }}>Portuguesa</option>
                                            <option value="Sucre" {{ old('estado') == 'Sucre' ? 'selected' : '' }}>Sucre</option>
                                            <option value="Táchira" {{ old('estado') == 'Táchira' ? 'selected' : '' }}>Táchira</option>
                                            <option value="Trujillo" {{ old('estado') == 'Trujillo' ? 'selected' : '' }}>Trujillo</option>
                                            <option value="Vargas" {{ old('estado') == 'Vargas' ? 'selected' : '' }}>Vargas</option>
                                            <option value="Yaracuy" {{ old('estado') == 'Yaracuy' ? 'selected' : '' }}>Yaracuy</option>
                                            <option value="Zulia" {{ old('estado') == 'Zulia' ? 'selected' : '' }}>Zulia</option>
                                        </select>
                                        <label for="estado" class="form-label">Estado <span class="text-danger">*</span></label>
                                        <div class="invalid-feedback">
                                            Por favor seleccione su estado
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Sección 2: Datos de la Formación -->
                        <div class="mb-5">
                            <div class="section-header mb-4">
                                <div class="section-icon">
                                    <i class="bi bi-book"></i>
                                </div>
                                <h2 class="section-title">Datos de la Formación</h2>
                            </div>

                            <!-- Tipo de Formación -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold">Tipo de Formación <span class="text-danger">*</span></label>
                                <div class="d-flex flex-wrap gap-3">
                                    <div class="form-check-card">
                                        <input class="form-check-input" type="radio" name="tipo_formacion" id="tipo_taller" value="T" 
                                            {{ old('tipo_formacion') == 'T' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="tipo_taller">
                                            <i class="bi bi-tools me-2"></i> Taller
                                        </label>
                                    </div>
                                    <div class="form-check-card">
                                        <input class="form-check-input" type="radio" name="tipo_formacion" id="tipo_curso" value="C" 
                                            {{ old('tipo_formacion') == 'C' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="tipo_curso">
                                            <i class="bi bi-journal-text me-2"></i> Curso
                                        </label>
                                    </div>
                                    <div class="form-check-card">
                                        <input class="form-check-input" type="radio" name="tipo_formacion" id="tipo_diplomado" value="D" 
                                            {{ old('tipo_formacion') == 'D' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="tipo_diplomado">
                                            <i class="bi bi-award me-2"></i> Diplomado
                                        </label>
                                    </div>
                               @if(isset($actividadRecreacional))
        <div class="form-check-card">
            <input class="form-check-input" type="radio" name="tipo_formacion" id="tipo_recreacional" value="R" 
                {{ old('tipo_formacion') == 'R' ? 'checked' : 'checked' }} disabled>
            <label class="form-check-label" for="tipo_recreacional">
                <i class="bi bi-emoji-smile me-2"></i> Actividad Recreacional
            </label>
        </div>
        @endif
    </div>
    <div class="invalid-feedback d-block">
        Por favor seleccione un tipo de formación
    </div>
</div>

                            <!-- Selects dinámicos -->
                          <div class="row g-3">
    <div class="col-md-12 select-grupo" id="select_taller" style="display:none;">
        <div class="form-floating">
            <select id="taller" name="taller" class="form-select" required>
                <option value="" disabled {{ old('taller') ? '' : 'selected' }}>Seleccione un taller</option>
                @foreach($talleres as $taller)
                    <option value="{{ $taller->nombre }}" 
                            {{ old('taller') == $taller->nombre ? 'selected' : '' }} 
                            data-id="{{ $taller->id }}"
                            data-duracion="{{ $taller->duracion }}"
                            data-facilitador="{{ $taller->facilitador ?? '' }}"
                            data-categoria="{{ $taller->categoria }}"
                            data-descripcion="{{ $taller->descripcion }}">
                        {{ $taller->nombre }}
                    </option>
                @endforeach
            </select>
            <label for="taller">Seleccione un Taller <span class="text-danger">*</span></label>
            <div class="invalid-feedback">
                Por favor seleccione un taller
            </div>
        </div>
    </div>

    <div class="col-md-12 select-grupo" id="select_curso" style="display:none;">
        <div class="form-floating">
            <select id="curso" name="curso" class="form-select" required>
                <option value="" disabled {{ old('curso') ? '' : 'selected' }}>Seleccione un curso</option>
                @foreach($cursos as $curso)
                    <option value="{{ $curso->nombre }}" 
                            {{ old('curso') == $curso->nombre ? 'selected' : '' }}
                            data-id="{{ $curso->id }}"
                            data-duracion="{{ $curso->duracion }}"
                            data-facilitador="{{ $curso->facilitador ?? '' }}"
                            data-categoria="{{ $curso->categoria }}"
                            data-descripcion="{{ $curso->descripcion }}">
                        {{ $curso->nombre }}
                    </option>
                @endforeach
            </select>
            <label for="curso">Seleccione un Curso <span class="text-danger">*</span></label>
            <div class="invalid-feedback">
                Por favor seleccione un curso
            </div>
        </div>
    </div>

    <div class="col-md-12 select-grupo" id="select_diplomado" style="display:none;">
        <div class="form-floating">
            <select id="diplomado" name="diplomado" class="form-select" required>
                <option value="" disabled {{ old('diplomado') ? '' : 'selected' }}>Seleccione un diplomado</option>
                @foreach($diplomados as $diplomado)
                    <option value="{{ $diplomado->nombre }}" 
                            {{ old('diplomado') == $diplomado->nombre ? 'selected' : '' }}
                            data-id="{{ $diplomado->id }}"
                            data-duracion="{{ $diplomado->duracion }}"
                            data-facilitador="{{ $diplomado->facilitador ?? '' }}"
                            data-categoria="{{ $diplomado->categoria }}"
                            data-descripcion="{{ $diplomado->descripcion }}">
                        {{ $diplomado->nombre }}
                    </option>
                @endforeach
            </select>
            <label for="diplomado">Seleccione un Diplomado <span class="text-danger">*</span></label>
            <div class="invalid-feedback">
                Por favor seleccione un diplomado
            </div>
        </div>
    </div>
</div>
<!-- Campo oculto para la duración predeterminada -->
<input type="hidden" id="duracion_predeterminada" name="duracion_predeterminada" value="">

<!-- Mostrar duración al usuario -->
<div class="col-md-12 mt-3">
    <div class="alert alert-info">
        <strong>Duración:</strong> <span id="duracion_mostrada">0</span> horas
    </div>
</div>

<!-- Campo editable solo para admin -->
@auth
    @if(auth()->check() && auth()->user()->is_admin)
        <div class="col-md-12 mt-3">
            <div class="form-floating">
                <input type="number" id="duracion" name="duracion" class="form-control" 
                       placeholder="Duración en horas" value="{{ old('duracion') }}">
                <label for="duracion" class="form-label">Duración (horas) - Editable para administrador</label>
            </div>
        </div>
    @endif
@endauth
                     @if(isset($formacion) && $formacion && $formacion->facilitador)
    <input type="hidden" id="formacion_id" name="formacion_id" value="{{ $formacion->id ?? '' }}">
<input type="hidden" id="facilitador" name="facilitador" value="{{ $formacion->facilitador ?? '' }}">

@endif   <!-- Botón de envío -->
                        <div class="text-center mt-5">
                            <button type="submit" class="btn btn-primary btn-lg px-5 py-3 fw-bold">
                                <i class="bi bi-send-fill me-2"></i> Enviar Inscripción
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Estilos personalizados con la nueva paleta de colores */
    :root {
        --primary: #2c3e50;
        --secondary: #3498db;
        --accent: #678ca3;
        --light: #f8f9fa;
        --dark: #343a40;
        --text-dark: #2c3e50;
        --text-light: #6c757d;
        --border: #ced4da;
        --success: #27ae60;
        --error: #e74c3c;
    }
    
    body {
        background-color: var(--light);
    }
    
    .text-gradient {
        background: linear-gradient(90deg, var(--primary) 0%, var(--accent) 100%);
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }
    
    .icon-circle {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
        box-shadow: 0 4px 15px rgba(44, 62, 80, 0.3);
    }
    
    .card {
        border: none;
        border-radius: 0.5rem;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background-color: white;
    }
    
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }
    
    .section-header {
        display: flex;
        align-items: center;
        gap: 1rem;
        padding-bottom: 0.5rem;
        border-bottom: 2px solid var(--border);
    }
    
    .section-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: rgba(44, 62, 80, 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary);
    }
    
    .section-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: var(--text-dark);
        margin: 0;
    }
    
    .form-floating label {
        color: var(--text-light);
        font-weight: 500;
    }
    
    .form-control, .form-select {
        border-radius: 0.5rem;
        padding: 1rem 1rem;
        border: 1px solid var(--border);
    }
    
    .form-control:focus, .form-select:focus {
        border-color: var(--secondary);
        box-shadow: 0 0 0 0.25rem rgba(52, 152, 219, 0.25);
    }
    
    .form-check-card {
        flex: 1;
        min-width: 120px;
    }
    
    .form-check-card .form-check-input {
        position: absolute;
        opacity: 0;
    }
    
    .form-check-card .form-check-label {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 1rem;
        border: 1px solid var(--border);
        border-radius: 0.5rem;
        cursor: pointer;
        transition: all 0.3s ease;
        text-align: center;
        height: 100%;
    }
    
    .form-check-card .form-check-input:checked + .form-check-label {
        border-color: var(--secondary);
        background-color: rgba(52, 152, 219, 0.05);
        color: var(--secondary);
        font-weight: 500;
    }
    
    .form-check-card .form-check-input:focus + .form-check-label {
        box-shadow: 0 0 0 0.25rem rgba(52, 152, 219, 0.25);
    }
    
    .btn-primary {
        background: linear-gradient(135deg, var(--primary) 0%, var(--accent) 100%);
        border: none;
        padding: 0.75rem 2rem;
        font-weight: 600;
        letter-spacing: 0.5px;
        transition: all 0.3s ease;
    }
    
    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(44, 62, 80, 0.3);
    }
    
    .alert-elegant {
        border-left: 4px solid;
        border-radius: 0.5rem;
    }
    
    .alert-success.alert-elegant {
        border-left-color: var(--success);
        background-color: rgba(39, 174, 96, 0.1);
    }
    
    .alert-danger.alert-elegant {
        border-left-color: var(--error);
        background-color: rgba(231, 76, 60, 0.1);
    }
    
    .required-field::after {
        content: " *";
        color: var(--error);
    }
    
    .invalid-feedback {
        font-size: 0.85rem;
        color: var(--error);
    }
    
    .text-danger {
        color: var(--error) !important;
    }
    
    @media (max-width: 768px) {
        .section-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 0.5rem;
        }
        
        .form-check-card {
            min-width: 100%;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Validación de Bootstrap
        (function () {
            'use strict'
            
            const forms = document.querySelectorAll('.needs-validation')
            
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    
                    form.classList.add('was-validated')
                }, false)
            })
        })()
        
        // Manejo de selects dinámicos y duración
        const tipoRadios = document.querySelectorAll('input[name="tipo_formacion"]');
        const selectTaller = document.getElementById('select_taller');
        const selectCurso = document.getElementById('select_curso');
        const selectDiplomado = document.getElementById('select_diplomado');

        function toggleSelects() {
            // Ocultar todos
            selectTaller.style.display = 'none';
            selectCurso.style.display = 'none';
            selectDiplomado.style.display = 'none';

            // Mostrar el correspondiente
            const seleccionado = document.querySelector('input[name="tipo_formacion"]:checked');
            if (!seleccionado) return;

            if (seleccionado.value === 'T') {
                selectTaller.style.display = 'block';
                document.getElementById('taller').required = true;
                document.getElementById('curso').required = false;
                document.getElementById('diplomado').required = false;
            } else if (seleccionado.value === 'C') {
                selectCurso.style.display = 'block';
                document.getElementById('taller').required = false;
                document.getElementById('curso').required = true;
                document.getElementById('diplomado').required = false;
            } else if (seleccionado.value === 'D') {
                selectDiplomado.style.display = 'block';
                document.getElementById('taller').required = false;
                document.getElementById('curso').required = false;
                document.getElementById('diplomado').required = true;
            }
            
        
        }

        // Función para actualizar la duración
        function actualizarDuracion() {
            const seleccionado = document.querySelector('input[name="tipo_formacion"]:checked');
            if (!seleccionado) return;

            let selectId = '';
            switch(seleccionado.value) {
                case 'T': selectId = 'taller'; break;
                case 'C': selectId = 'curso'; break;
                case 'D': selectId = 'diplomado'; break;
            }

            if (selectId) {
                const selectEl = document.getElementById(selectId);
                if (selectEl) {
                    const selectedOption = selectEl.options[selectEl.selectedIndex];
                    if (selectedOption && selectedOption.dataset.duracion) {
                        const duracion = selectedOption.dataset.duracion;
                        document.getElementById('duracion_predeterminada').value = duracion;
                        document.getElementById('duracion_mostrada').textContent = duracion;
                        
                        // Si es admin, establecer el valor en el campo editable
                        const duracionInput = document.getElementById('duracion');
                        if (duracionInput) {
                            duracionInput.value = duracion;
                        }
                    }
                }
            }
        }

        // Event listeners
        tipoRadios.forEach(radio => {
            radio.addEventListener('change', toggleSelects);
               toggleSelects();
        actualizarDuracion();
        });

        document.getElementById('taller')?.addEventListener('change', actualizarDuracion);
        document.getElementById('curso')?.addEventListener('change', actualizarDuracion);
        document.getElementById('diplomado')?.addEventListener('change', actualizarDuracion);

        // Ejecutar al cargar
          toggleSelects();
        actualizarDuracion();
 function actualizarDetallesFormacion() {
        const tipoSeleccionado = document.querySelector('input[name="tipo_formacion"]:checked');
        if (!tipoSeleccionado) return;

        let selectId = '';
        switch(tipoSeleccionado.value) {
            case 'T': selectId = 'taller'; break;
            case 'C': selectId = 'curso'; break;
            case 'D': selectId = 'diplomado'; break;
        }

        if (selectId) {
            const selectEl = document.getElementById(selectId);
            if (selectEl && selectEl.selectedIndex > 0) { // selectedIndex > 0 para omitir la opción vacía
                const selectedOption = selectEl.options[selectEl.selectedIndex];
                
                // Mostrar la sección de detalles si estaba oculta
                document.getElementById('formacion-details').style.display = 'block';
                
                // Actualizar los campos con los datos de la formación seleccionada
                document.getElementById('formacion-nombre').textContent = selectedOption.text;
                document.getElementById('formacion-descripcion').textContent = selectedOption.dataset.descripcion || '';
          
                document.getElementById('formacion-facilitador').textContent = selectedOption.dataset.facilitador || 'Por asignar';
                
                // Actualizar campos ocultos
                document.getElementById('formacion_id').value = selectedOption.dataset.id || '';
                document.getElementById('facilitador').value = selectedOption.dataset.facilitador || '';
                    
                // Actualizar duración visible
                document.getElementById('duracion_mostrada').textContent = selectedOption.dataset.duracion || '0';
                
                // Si es admin, establecer el valor en el campo editable
                const duracionInput = document.getElementById('duracion');
                if (duracionInput) {
                    duracionInput.value = selectedOption.dataset.duracion || '';
                }
            } else {
                // Ocultar detalles si no hay selección válida
                document.getElementById('formacion-details').style.display = 'none';
            }
        }
    }

    // Event listeners para cambios en los selects
    document.getElementById('taller')?.addEventListener('change', actualizarDetallesFormacion);
    document.getElementById('curso')?.addEventListener('change', actualizarDetallesFormacion);
    document.getElementById('diplomado')?.addEventListener('change', actualizarDetallesFormacion);

    // Event listeners para cambios en el tipo de formación
    document.querySelectorAll('input[name="tipo_formacion"]').forEach(radio => {
        radio.addEventListener('change', function() {
            // Mostrar el select correspondiente
            document.getElementById('select_taller').style.display = 'none';
            document.getElementById('select_curso').style.display = 'none';
            document.getElementById('select_diplomado').style.display = 'none';
            
            if (this.value === 'T') {
                document.getElementById('select_taller').style.display = 'block';
            } else if (this.value === 'C') {
                document.getElementById('select_curso').style.display = 'block';
            } else if (this.value === 'D') {
                document.getElementById('select_diplomado').style.display = 'block';
            }
            
            // Actualizar detalles después de un pequeño retraso para permitir que el select se muestre
            setTimeout(actualizarDetallesFormacion, 100);
        });
    });

    // Ejecutar al cargar si hay una formación seleccionada inicialmente
    if (document.getElementById('formacion_id').value) {
        actualizarDetallesFormacion();
    }
    });
</script>
@endsection