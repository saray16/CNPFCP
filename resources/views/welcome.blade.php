@extends('layouts.app') 
@section('title', 'Inicio') 
@section('content')
<section class="hero-section hero-fullwidth">
    <div class="hero-content">
        <h1 class="hero-title">Todas las habilidades que necesitas en un único lugar</h1>
        <p class="hero-subtitle">Desde habilidades esenciales hasta temas técnicos, CENAMEC respalda tu desarrollo profesional</p>
    </div>
</section>

<section class="py-5" style="background-color: #f8fafc;">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-4 fw-bold mb-3" style="color: #2c3e50;">Nuestras Formaciones</h2>
            <div class="divider mx-auto" style="width: 80px; height: 4px; background: linear-gradient(90deg, #2c3e50, #678ca3);"></div>
            <p class="lead mt-3" style="color: #678ca3;">Programas diseñados para la excelencia educativa</p>
        </div>

        <ul class="nav nav-tabs justify-content-center mb-4" id="formacionesTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="talleres-tab" data-bs-toggle="tab" data-bs-target="#talleres" type="button" role="tab" aria-controls="talleres" aria-selected="true" style="color:rgb(80, 44, 44); font-weight: 600;">
                    Talleres
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="cursos-tab" data-bs-toggle="tab" data-bs-target="#cursos" type="button" role="tab" aria-controls="cursos" aria-selected="false" style="color:#808080; font-weight: 600;">
                    Cursos
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="diplomados-tab" data-bs-toggle="tab" data-bs-target="#diplomados" type="button" role="tab" aria-controls="diplomados" aria-selected="false" style="color: #2c3e50; font-weight: 600;">
                    Diplomados
                </button>
            </li>
        </ul>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 col-lg-2 d-md-block sidebar px-0">
                    <div class="sidebar-sticky pt-3">
                        <h3 class="sidebar-heading px-3 mb-3">Categorías de Formación</h3>
                        <ul class="nav flex-column" id="category-filters">
                            <li class="nav-item"><a class="nav-link category-filter" href="#" data-category="Plan Recreacional"><i class="bi bi-emoji-smile me-2"></i>Plan Recreacional</a></li>
                            <li class="nav-item"><a class="nav-link category-filter active" href="#" data-category="all"><i class="bi bi-grid-fill me-2"></i>Todas</a></li>
                            <li class="nav-item"><a class="nav-link category-filter" href="#" data-category="hoy"><i class="bi bi-check2-circle me-2"></i>Disponibles hoy</a></li>
                            <li class="nav-item"><a class="nav-link category-filter" href="#" data-category="Biología"><i class="bi bi-flower3 me-2"></i>Biología</a></li>
                            <li class="nav-item"><a class="nav-link category-filter" href="#" data-category="Física"><i class="bi bi-eyedropper me-2"></i>Física</a></li>
                            <li class="nav-item"><a class="nav-link category-filter" href="#" data-category="Química"><i class="bi bi-funnel me-2"></i>Química</a></li>
                            <li class="nav-item"><a class="nav-link category-filter" href="#" data-category="Matemática"><i class="bi bi-calculator me-2"></i>Matemática</a></li>
                            <li class="nav-item"><a class="nav-link category-filter" href="#" data-category="Artes"><i class="bi bi-palette me-2"></i>Artes</a></li>
                            <li class="nav-item"><a class="nav-link category-filter" href="#" data-category="Idiomas"><i class="bi bi-translate me-2"></i>Idiomas</a></li>
                            <li class="nav-item"><a class="nav-link category-filter" href="#" data-category="Tecnología"><i class="bi bi-cpu me-2"></i>Tecnología</a></li>
                            <li class="nav-item"><a class="nav-link category-filter" href="#" data-category="Ambiente"><i class="bi bi-tree me-2"></i>Ambiente</a></li>
                            <li class="nav-item"><a class="nav-link category-filter" href="#" data-category="OCEV"><i class="bi bi-clipboard-data me-2"></i>OCEV</a></li>
                            <li class="nav-item"><a class="nav-link category-filter" href="#" data-category="Ajedrez"><i class="bi bi-chess me-2"></i>Ajedrez</a></li>
                            <li class="nav-item"><a class="nav-link category-filter" href="#" data-category="Lectura/Escritura"><i class="bi bi-book me-2"></i>Lectura/Escritura</a></li>
                            <li class="nav-item"><a class="nav-link category-filter" href="#" data-category="TICs"><i class="bi bi-laptop me-2"></i>TICs</a></li>
                            <li class="nav-item"><a class="nav-link category-filter" href="#" data-category="EIS"><i class="bi bi-lightbulb me-2"></i>EIS</a></li>
                            <li class="nav-item"><a class="nav-link category-filter" href="#" data-category="Deporte"><i class="bi bi-trophy me-2"></i>Deporte</a></li>
                            <li class="nav-item"><a class="nav-link category-filter" href="#" data-category="HSE"><i class="bi bi-shield-check me-2"></i>HSE</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="talleres" role="tabpanel" aria-labelledby="talleres-tab">
                            <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
                                <h2 class="category-title m-0">Talleres Disponibles</h2> 
                                @auth @if(auth()->user()->rol === 'admin')
                                <button class="btn btn-success btn-sm add-formation-btn" data-bs-toggle="modal" data-bs-target="#addFormationModal" data-type="T">
                                    <i class="bi bi-plus-lg me-1"></i> Agregar Taller
                                </button> 
                                @endif @endauth
                            </div>

                            <div class="row g-4" id="talleres-container">
                                @forelse($talleres as $taller)
                                <div class="col-md-4 mb-4 course-item" data-category="{{ $taller->categoria }}" data-hoy="{{ $taller->disponible_hoy ? 'true' : 'false' }}">
                                    <div class="course-card" onclick="showFormationDetails(event, '{{ $taller->nombre }}', '{{ $taller->descripcion }}', 'Taller', '{{ $taller->categoria }}', '{{ $taller->duracion }}', '{{ $taller->rating ?? '4.5' }}', '{{ $taller->disponible_hoy ? '1' : '0' }}', '{{ $taller->facilitador }}', '{{ $taller->icono }}', 'T', '{{ $taller->id }}')">
                                        <div class="course-img">
                                            <i class="bi {{ $taller->icono }}"></i>
                                        </div>
                                        <div class="course-body">
                                            <h3 class="course-title">{{ $taller->nombre }}</h3>
                                            <p class="course-description">{{ Str::limit($taller->descripcion, 100) }}</p>
                                            <div class="course-meta">
                                                @if($taller->duracion)
                                                <div class="duration-above-rating">
                                                    <i class="bi bi-clock"></i> {{ $taller->duracion }} horas
                                                </div>
                                                @endif
                                                <span class="course-rating"><i class="bi bi-star-fill"></i> {{ $taller->rating ?? '4.5' }}</span>
                                                <span class="course-price">Gratis</span>
                                            </div>
                                            @if($taller->facilitador)
                                            <div class="facilitador-info mt-2 small">
                                                <span class="fw-bold">Facilitador:</span>
                                                <span class="text-primary">{{ $taller->facilitador }}</span>
                                            </div>
                                            @endif 
                                            @auth @if(auth()->user()->rol === 'admin')
                                            <div class="d-flex gap-2 mt-2" onclick="event.stopPropagation()">
                                                <button class="btn btn-sm btn-outline-verde-cenamec flex-grow-1 edit-formation-btn" data-bs-toggle="modal" data-bs-target="#editFormationModal" data-id="{{ $taller->id }}" data-tipo="T" data-nombre="{{ $taller->nombre }}" data-descripcion="{{ $taller->descripcion }}" data-categoria="{{ $taller->categoria }}" data-duracion="{{ $taller->duracion }}" data-disponible="{{ $taller->disponible_hoy ? '1' : '0' }}" data-facilitador="{{ $taller->facilitador }}">
                                                    <i class="bi bi-pencil-fill"></i> Editar
                                                </button>
                                                <form action="{{ route('formaciones.destroy', $taller->id) }}" method="POST" class="flex-grow-1">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger w-100" onclick="return confirm('¿Estás seguro de eliminar esta formación?')">
                                                        <i class="bi bi-trash-fill"></i> Eliminar
                                                    </button>
                                                </form>
                                            </div>
                                            @endif @endauth 
                                            @if($taller->disponible_hoy)
                                            <a href="{{ route('inscripcion.formulario', ['tipo' => 'T', 'formacion_id' => $taller->id]) }}" class="btn btn-enroll w-100 py-2 d-flex align-items-center justify-content-center gap-2" onclick="event.stopPropagation()">
                                                <i class="fas fa-sign-in-alt"></i>
                                                <span>Inscribirse</span>
                                            </a>
                                            @else
                                            <button class="btn btn-unavailable w-100 py-2 d-flex align-items-center justify-content-center gap-2" onclick="event.stopPropagation()">
                                                <i class="bi bi-x-circle"></i>
                                                <span>No Disponible</span>
                                            </button> 
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="col-12 text-center py-4">
                                    <div class="alert alert-info">No hay talleres disponibles en este momento</div>
                                </div>
                                @endforelse 
                                
                                @foreach($actividadesRecreacionales as $actividad)
                                <div class="col-md-4 mb-4 course-item" data-category="Plan Recreacional">
                                    <div class="course-card recreacional-card">
                                        <div class="course-img recreacional-img" style="background: linear-gradient(135deg, #4bc0c8 0%, #2c3e50 100%);">
                                            <i class="bi bi-emoji-smile text-white" style="font-size: 2.5rem;"></i>
                                        </div>
                                        <div class="ribbon ribbon-top-right"><span>Recreacional</span></div>
                                        <div class="course-body">
                                            <h3 class="course-title">{{ $actividad->nombre }}</h3>
                                            <div class="course-badge mb-2">
                                                <span class="badge bg-light text-dark"><i class="bi bi-people-fill me-1"></i> {{ $actividad->edades }}</span>
                                                <span class="badge bg-light text-dark"><i class="bi bi-tag-fill me-1"></i> {{ $actividad->tipo }}</span>
                                            </div>
                                            <div class="course-info-grid mb-3">
                                                <div class="info-item">
                                                    <i class="bi bi-calendar-week text-primary"></i>
                                                    <span>{{ $actividad->fecha_inicio }} - {{ $actividad->fecha_fin }}</span>
                                                </div>
                                                <div class="info-item">
                                                    <i class="bi bi-clock text-primary"></i>
                                                    <span>{{ $actividad->horario }}</span>
                                                </div>
                                                <div class="info-item">
                                                    <i class="bi bi-geo-alt text-primary"></i>
                                                    <span>{{ $actividad->espacio }}</span>
                                                </div>
                                            </div>
                                            <div class="facilitador-info">
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-sm me-2">
                                                        <div class="avatar-title bg-primary text-white rounded-circle">
                                                            <i class="bi bi-person-fill"></i>
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <small class="text-muted">Facilitador</small>
                                                        <h6 class="mb-0">{{ $actividad->facilitador }}</h6>
                                                    </div>
                                                </div>
                                            </div>

                                            @auth @if(auth()->user()->rol === 'admin')
<div class="d-flex gap-2 mt-3" onclick="event.stopPropagation()">
    <button class="btn btn-sm btn-outline-primary flex-grow-1 edit-recreacional-btn" 
            data-bs-toggle="modal" 
            data-bs-target="#editRecreacionalModal" 
            data-id="{{ $actividad->id }}" 
            data-nombre="{{ $actividad->nombre }}" 
            data-tipo="{{ $actividad->tipo }}" 
            data-edades="{{ $actividad->edades }}" 
            data-espacio="{{ $actividad->espacio }}" 
            data-horario="{{ $actividad->horario }}" 
            data-fecha_inicio="{{ $actividad->fecha_inicio }}" 
            data-fecha_fin="{{ $actividad->fecha_fin }}" 
            data-facilitador="{{ $actividad->facilitador }}"
            data-cupo_completo="{{ $actividad->cupo_completo ? '1' : '0' }}">
        <i class="bi bi-pencil-fill"></i> Editar
    </button>
    
    <form action="{{ route('actividades-recreacionales.destroy', $actividad->id) }}" method="POST" class="flex-grow-1">
        @csrf @method('DELETE')
        <button type="submit" class="btn btn-sm btn-outline-danger w-100" onclick="return confirm('¿Estás seguro de eliminar esta actividad recreacional?')">
            <i class="bi bi-trash-fill"></i> Eliminar
        </button>
    </form>
</div>

<!-- Botón Ver Participantes FUERA del formulario -->
<button class="btn btn-sm btn-outline-info w-100 mt-2 view-participants-btn" 
        type="button"
        data-bs-toggle="modal" 
        data-bs-target="#participantesModal"
        data-activity-id="{{ $actividad->id }}"
        onclick="event.stopPropagation()">
    <i class="bi bi-people-fill me-1"></i> Ver Participantes
</button>
@endif @endauth

                                            <!-- En la parte de la tarjeta de actividad recreacional, modifica el botón de inscripción: -->
@if($actividad->cupo_completo)
    <button class="btn btn-unavailable w-100 mt-2 py-2 d-flex align-items-center justify-content-center gap-2" onclick="event.stopPropagation()">
        <i class="bi bi-x-circle"></i>
        <span>Cupo Completo</span>
    </button>
@else
    <a href="{{ route('inscripcion.formulario', ['tipo' => 'R', 'formacion_id' => $actividad->id]) }}" 
       class="btn btn-primary w-100 mt-2 py-2 d-flex align-items-center justify-content-center gap-2" 
       onclick="event.stopPropagation()">
        <i class="fas fa-sign-in-alt"></i>
        <span>Inscribirse</span>
    </a>
@endif
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="tab-pane fade" id="cursos" role="tabpanel" aria-labelledby="cursos-tab">
                            <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
                                <h2 class="category-title m-0">Cursos Disponibles</h2> 
                                @auth @if(auth()->user()->rol === 'admin')
                                <button class="btn btn-success btn-sm add-formation-btn" data-bs-toggle="modal" data-bs-target="#addFormationModal" data-type="C">
                                    <i class="bi bi-plus-lg me-1"></i> Agregar Curso
                                </button> 
                                @endif @endauth
                            </div>

                            <div class="row g-4" id="cursos-container">
                                @forelse($cursos as $curso)
                                <div class="col-md-4 mb-4 course-item" data-category="{{ $curso->categoria }}" data-hoy="{{ $curso->disponible_hoy ? 'true' : 'false' }}">
                                    <div class="course-card" onclick="showFormationDetails(event, '{{ $curso->nombre }}', '{{ $curso->descripcion }}', 'Curso', '{{ $curso->categoria }}', '{{ $curso->duracion }}', '{{ $curso->rating ?? '4.5' }}', '{{ $curso->disponible_hoy ? '1' : '0' }}', '{{ $curso->facilitador }}', '{{ $curso->icono }}', 'C', '{{ $curso->id }}')">
                                        <div class="course-img">
                                            <i class="bi {{ $curso->icono }}"></i>
                                        </div>
                                        <div class="course-body">
                                            <h3 class="course-title">{{ $curso->nombre }}</h3>
                                            <p class="course-description">{{ Str::limit($curso->descripcion, 100) }}</p>
                                            <div class="course-meta">
                                                @if($curso->duracion)
                                                <div class="duration-above-rating">
                                                    <i class="bi bi-clock"></i> {{ $curso->duracion }} horas
                                                </div>
                                                @endif
                                                <span class="course-rating"><i class="bi bi-star-fill"></i> {{ $curso->rating ?? '4.5' }}</span>
                                                <span class="course-price">Gratis</span>
                                            </div>
                                            @if($curso->facilitador)
                                            <div class="facilitador-info mt-2 small">
                                                <span class="fw-bold">Facilitador:</span>
                                                <span class="text-primary">{{ $curso->facilitador }}</span>
                                            </div>
                                            @endif 
                                            @auth @if(auth()->user()->rol === 'admin')
                                            <div class="d-flex gap-2 mt-2" onclick="event.stopPropagation()">
                                                <button class="btn btn-sm btn-outline-verde-cenamec flex-grow-1 edit-formation-btn" data-bs-toggle="modal" data-bs-target="#editFormationModal" data-id="{{ $curso->id }}" data-tipo="C" data-nombre="{{ $curso->nombre }}" data-descripcion="{{ $curso->descripcion }}" data-categoria="{{ $curso->categoria }}" data-duracion="{{ $curso->duracion }}" data-disponible="{{ $curso->disponible_hoy ? '1' : '0' }}" data-facilitador="{{ $curso->facilitador }}">
                                                    <i class="bi bi-pencil-fill"></i> Editar
                                                </button>
                                                <form action="{{ route('formaciones.destroy', $curso->id) }}" method="POST" class="flex-grow-1">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger w-100" onclick="return confirm('¿Estás seguro de eliminar esta formación?')">
                                                        <i class="bi bi-trash-fill"></i> Eliminar
                                                    </button>
                                                </form>
                                            </div>
                                            @endif @endauth 
                                            @if($curso->disponible_hoy)
                                            <a href="{{ route('inscripcion.formulario', ['tipo' => 'C', 'formacion_id' => $curso->id]) }}" class="btn btn-enroll w-100 py-2 d-flex align-items-center justify-content-center gap-2" onclick="event.stopPropagation()">
                                                <i class="fas fa-sign-in-alt"></i>
                                                <span>Inscribirse</span>
                                            </a>
                                            @else
                                            <button class="btn btn-unavailable w-100 py-2 d-flex align-items-center justify-content-center gap-2" onclick="event.stopPropagation()">
                                                <i class="bi bi-x-circle"></i>
                                                <span>No Disponible</span>
                                            </button> 
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="col-12 text-center py-4">
                                    <div class="alert alert-info">No hay cursos disponibles en este momento</div>
                                </div>
                                @endforelse
                            </div>
                        </div>

                        <div class="tab-pane fade" id="diplomados" role="tabpanel" aria-labelledby="diplomados-tab">
                            <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
                                <h2 class="category-title m-0">Diplomados Disponibles</h2> 
                                @auth @if(auth()->user()->rol === 'admin')
                                <button class="btn btn-success btn-sm add-formation-btn" data-bs-toggle="modal" data-bs-target="#addFormationModal" data-type="D">
                                    <i class="bi bi-plus-lg me-1"></i> Agregar Diplomado
                                </button> 
                                @endif @endauth
                            </div>

                            <div class="row g-4" id="diplomados-container">
                                @forelse($diplomados as $diplomado)
                                <div class="col-md-4 mb-4 course-item" data-category="{{ $diplomado->categoria }}" data-hoy="{{ $diplomado->disponible_hoy ? 'true' : 'false' }}">
                                    <div class="course-card" onclick="showFormationDetails(event, '{{ $diplomado->nombre }}', '{{ $diplomado->descripcion }}', 'Diplomado', '{{ $diplomado->categoria }}', '{{ $diplomado->duracion }}', '{{ $diplomado->rating ?? '4.5' }}', '{{ $diplomado->disponible_hoy ? '1' : '0' }}', '{{ $diplomado->facilitador }}', '{{ $diplomado->icono }}', 'D', '{{ $diplomado->id }}')">
                                        <div class="course-img">
                                            <i class="bi {{ $diplomado->icono }}"></i>
                                        </div>
                                        <div class="course-body">
                                            <h3 class="course-title">{{ $diplomado->nombre }}</h3>
                                            <p class="course-description">{{ Str::limit($diplomado->descripcion, 100) }}</p>
                                            <div class="course-meta">
                                                @if($diplomado->duracion)
                                                <div class="duration-above-rating">
                                                    <i class="bi bi-clock"></i> {{ $diplomado->duracion }} horas
                                                </div>
                                                @endif
                                                <span class="course-rating"><i class="bi bi-star-fill"></i> {{ $diplomado->rating ?? '4.5' }}</span>
                                                <span class="course-price">Gratis</span>
                                            </div>
                                            @if($diplomado->facilitador)
                                            <div class="facilitador-info mt-2 small">
                                                <span class="fw-bold">Facilitador:</span>
                                                <span class="text-primary">{{ $diplomado->facilitador }}</span>
                                            </div>
                                            @endif 
                                            @auth @if(auth()->user()->rol === 'admin')
                                            <div class="d-flex gap-2 mt-2" onclick="event.stopPropagation()">
                                                <button class="btn btn-sm btn-outline-verde-cenamec flex-grow-1 edit-formation-btn" data-bs-toggle="modal" data-bs-target="#editFormationModal" data-id="{{ $diplomado->id }}" data-tipo="D" data-nombre="{{ $diplomado->nombre }}" data-descripcion="{{ $diplomado->descripcion }}" data-categoria="{{ $diplomado->categoria }}" data-duracion="{{ $diplomado->duracion }}" data-disponible="{{ $diplomado->disponible_hoy ? '1' : '0' }}" data-facilitador="{{ $diplomado->facilitador }}">
                                                    <i class="bi bi-pencil-fill"></i> Editar
                                                </button>
                                                <form action="{{ route('formaciones.destroy', $diplomado->id) }}" method="POST" class="flex-grow-1">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger w-100" onclick="return confirm('¿Estás seguro de eliminar esta formación?')">
                                                        <i class="bi bi-trash-fill"></i> Eliminar
                                                    </button>
                                                </form>
                                            </div>
                                            @endif @endauth 
                                            @if($diplomado->disponible_hoy)
                                            <a href="{{ route('inscripcion.formulario', ['tipo' => 'D', 'formacion_id' => $diplomado->id]) }}" class="btn btn-enroll w-100 py-2 d-flex align-items-center justify-content-center gap-2" onclick="event.stopPropagation()">
                                                <i class="fas fa-sign-in-alt"></i>
                                                <span>Inscribirse</span>
                                            </a>
                                            @else
                                            <button class="btn btn-unavailable w-100 py-2 d-flex align-items-center justify-content-center gap-2" onclick="event.stopPropagation()">
                                                <i class="bi bi-x-circle"></i>
                                                <span>No Disponible</span>
                                            </button> 
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="col-12 text-center py-4">
                                    <div class="alert alert-info">No hay diplomados disponibles en este momento</div>
                                </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal para agregar actividad recreacional -->
<div class="modal fade" id="addRecreacionalModal" tabindex="-1" aria-labelledby="addRecreacionalModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header text-white" style="background: linear-gradient(135deg, #2c3e50, #678ca3);">
                <h5 class="modal-title fs-4 fw-bold">
                    <i class="bi bi-plus-circle me-2"></i>Añadir Actividad Recreacional
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addRecreacionalForm" action="{{ route('actividades-recreacionales.store') }}" method="POST">
                @csrf
                <div class="modal-body py-4">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control" id="recreacionalNombre" name="nombre" required>
                                <label for="recreacionalNombre">Nombre *</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control" id="recreacionalTipo" name="tipo" required>
                                <label for="recreacionalTipo">Tipo *</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control" id="recreacionalEdades" name="edades" required>
                                <label for="recreacionalEdades">Edades *</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control" id="recreacionalEspacio" name="espacio" required>
                                <label for="recreacionalEspacio">Espacio *</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control" id="recreacionalHorario" name="horario" required>
                                <label for="recreacionalHorario">Horario *</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control" id="recreacionalFacilitador" name="facilitador" required>
                                <label for="recreacionalFacilitador">Facilitador *</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-4">
                                <input type="date" class="form-control" id="recreacionalFechaInicio" name="fecha_inicio" required>
                                <label for="recreacionalFechaInicio">Fecha Inicio *</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-4">
                                <input type="date" class="form-control" id="recreacionalFechaFin" name="fecha_fin" required>
                                <label for 'recreacionalFechaFin'>Fecha Fin *</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar Actividad</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal para detalles de formación -->
<div class="modal fade" id="formationDetailsModal" tabindex="-1" aria-labelledby="formationDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="formationDetailsModalLabel">Detalles de la Formación</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-4">
                    <div class="col-md-8">
                        <h3 id="detail-title" class="mb-2"></h3>
                        <div class="badge bg-info text-dark mb-3" id="detail-type"></div>
                    </div>
                    <div class="col-md-4 text-end">
                        <div class="certificate-badge bg-warning text-dark p-2 rounded">
                            <i class="bi bi-award-fill me-1"></i>
                            <span>Certificado de Completación</span>
                            <div class="price-tag mt-1">GRATIS</div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8">
                        <div class="mb-4">
                            <h5 class="section-title border-bottom pb-2">Descripción</h5>
                            <p id="detail-description" class="text-muted mt-2"></p>
                        </div>

                        <div class="mb-4">
                            <h5 class="section-title border-bottom pb-2">Requisitos</h5>
                            <ul id="detail-requirements" class="text-muted mt-2">
                                <li>Dirigido a gerentes, directores, ejecutivos y profesionales</li>
                                <li>Interés en adquirir o mejorar habilidades en el área</li>
                                <li>Compromiso con el aprendizaje y desarrollo profesional</li>
                            </ul>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <h5 class="section-title border-bottom pb-2">Categoría</h5>
                                <p id="detail-category" class="text-muted mt-2"></p>
                            </div>
                            <div class="col-md-6">
                                <h5 class="section-title border-bottom pb-2">Facilitador(es)</h5>
                                <p id="detail-facilitador" class="text-muted mt-2"></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-3">
                                    <span><i class="bi bi-clock me-1"></i> Duración:</span>
                                    <span id="detail-duration" class="fw-bold"></span>
                                </div>
                                <div class="d-flex justify-content-between mb-3">
                                    <span><i class="bi bi-star-fill text-warning me-1"></i> Calificación:</span>
                                    <span id="detail-rating" class="fw-bold"></span>
                                </div>
                                <div class="d-flex justify-content-between mb-3">
                                    <span><i class="bi bi-calendar-check me-1"></i> Disponibilidad:</span>
                                    <span id="detail-availability" class="fw-bold"></span>
                                </div>
                                <div class="text-center mt-4">
                                    <button class="btn btn-primary w-100" id="detail-enroll-btn">
                                        <i class="fas fa-sign-in-alt me-1"></i> Inscribirse
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal para agregar formación -->
<div class="modal fade" id="addFormationModal" tabindex="-1" aria-labelledby="addFormationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header text-white" style="background: linear-gradient(135deg, #2c3e50, #678ca3);">
                <h5 class="modal-title fs-4 fw-bold" id="addFormationModalLabel">
                    <i class="bi bi-plus-circle me-2"></i>Añadir Nueva Formación
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="addFormationForm" action="{{ route('formaciones.store') }}" method="POST">
                @csrf
                <input type="hidden" id="formationType" name="tipo">
                <div class="modal-body py-4">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control" id="formationName" name="nombre" required>
                                <label for="formationName">Nombre *</label>
                            </div>
                            <div class="form-floating mb-4">
                                <textarea class="form-control" id="formationDescription" name="descripcion" style="min-height: 120px;" required></textarea>
                                <label for="formationDescription">Descripción *</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-4">
                                <select class="form-select" id="formationCategory" name="categoria" required>
                                    <option value=""></option>
                                    <option value="Plan Recreacional">Plan recreacional</option>
                                    <option value="Biología">Biología</option>
                                    <option value="Física">Física</option>
                                    <option value="Química">Química</option>
                                    <option value="Matemática">Matemática</option>
                                    <option value="Artes">Artes</option>
                                    <option value="Idiomas">Idiomas</option>
                                    <option value="Tecnología">Tecnología</option>
                                    <option value="Ambiente">Ambiente</option>
                                    <option value="OCEV">OCEV</option>
                                    <option value="Ajedrez">Ajedrez</option>
                                    <option value="Lectura/Escritura">Lectura/Escritura</option>
                                    <option value="TICs">TICs</option>
                                    <option value="EIS">EIS</option>
                                    <option value="Deporte">Deporte</option>
                                    <option value="HSE">HSE</option>
                                </select>
                                <label for="formationCategory">Categoría *</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="number" class="form-control" id="formationDuration" name="duracion">
                                <label for="formationDuration">Duración (horas)</label>
                            </div>
                            <div class="form-check form-switch mb-4">
                                <input class="form-check-input" type="checkbox" id="formationAvailableToday" name="disponible_hoy" value="1">
                                <label class="form-check-label" for="formationAvailableToday">Disponible hoy</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control" id="formationFacilitador" name="facilitador">
                                <label for="formationFacilitador">Facilitador(es)</label>
                                <small class="text-muted">Separa múltiples facilitadores con comas</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar Formación</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal para editar formación -->
<div class="modal fade" id="editFormationModal" tabindex="-1" aria-labelledby="editFormationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header text-white" style="background: linear-gradient(135deg, #2c3e50, #678ca3);">
                <h5 class="modal-title fs-4 fw-bold" id="editFormationModalLabel">
                    <i class="bi bi-pencil-square me-2"></i>Editar Formación
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editFormationForm" method="POST">
                @csrf @method('PUT')
                <input type="hidden" id="editFormationId" name="id">
                <input type="hidden" id="editFormationType" name="tipo">
                <div class="modal-body py-4">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control" id="editFormationName" name="nombre" required>
                                <label for="editFormationName">Nombre *</label>
                            </div>
                            <div class="form-floating mb-4">
                                <textarea class="form-control" id="editFormationDescription" name="descripcion" style="min-height: 120px;" required></textarea>
                                <label for="editFormationDescription">Descripción *</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-4">
                                <select class="form-select" id="editFormationCategory" name="categoria" required>
                                    <option value=""></option>
                                    <option value="Biología">Biología</option>
                                    <option value="Física">Física</option>
                                    <option value="Química">Química</option>
                                    <option value="Matemática">Matemática</option>
                                    <option value="Artes">Artes</option>
                                    <option value="Idiomas">Idiomas</option>
                                    <option value="Tecnología">Tecnología</option>
                                    <option value="Ambiente">Ambiente</option>
                                    <option value="OCEV">OCEV</option>
                                    <option value="Ajedrez">Ajedrez</option>
                                    <option value="Lectura/Escritura">Lectura/Escritura</option>
                                    <option value="TICs">TICs</option>
                                    <option value="EIS">EIS</option>
                                    <option value="Deporte">Deporte</option>
                                    <option value="HSE">HSE</option>
                                </select>
                                <label for="editFormationCategory">Categoría *</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="number" class="form-control" id="editFormationDuration" name="duracion">
                                <label for="editFormationDuration">Duración (horas)</label>
                            </div>
                            <div class="form-check form-switch mb-4">
                                <input class="form-check-input" type="checkbox" id="editFormationAvailableToday" name="disponible_hoy" value="1">
                                <label class="form-check-label" for="editFormationAvailableToday">Disponible hoy</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control" id="editFormationFacilitador" name="facilitador">
                                <label for="editFormationFacilitador">Facilitador(es)</label>
                                <small class="text-muted">Separa múltiples facilitadores con comas</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Actualizar Formación</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal para editar actividad recreacional -->
<div class="modal fade" id="editRecreacionalModal" tabindex="-1" aria-labelledby="editRecreacionalModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header text-white" style="background: linear-gradient(135deg, #2c3e50, #678ca3);">
                <h5 class="modal-title fs-4 fw-bold">
                    <i class="bi bi-pencil-square me-2"></i>Editar Actividad Recreacional
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editRecreacionalForm" method="POST">
                @csrf @method('PUT')
                <input type="hidden" id="editRecreacionalId" name="id">
                <div class="modal-body py-4">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control" id="editRecreacionalNombre" name="nombre" required>
                                <label for="editRecreacionalNombre">Nombre *</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control" id="editRecreacionalTipo" name="tipo" required>
                                <label for="editRecreacionalTipo">Tipo *</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control" id="editRecreacionalEdades" name="edades" required>
                                <label for="editRecreacionalEdades">Edades *</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control" id="editRecreacionalEspacio" name="espacio" required>
                                <label for="editRecreacionalEspacio">Espacio *</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control" id="editRecreacionalHorario" name="horario" required>
                                <label for="editRecreacionalHorario">Horario *</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control" id="editRecreacionalFacilitador" name="facilitador" required>
                                <label for="editRecreacionalFacilitador">Facilitador *</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-4">
                                <input type="date" class="form-control" id="editRecreacionalFechaInicio" name="fecha_inicio" required>
                                <label for="editRecreacionalFechaInicio">Fecha Inicio *</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-4">
                                <input type="date" class="form-control" id="editRecreacionalFechaFin" name="fecha_fin" required>
                                <label for="editRecreacionalFechaFin">Fecha Fin *</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-check form-switch mb-4">
                                <input class="form-check-input" type="checkbox" id="editRecreacionalCupoCompleto" name="cupo_completo" value="1">
                                <label class="form-check-label" for="editRecreacionalCupoCompleto">Cupo Completo</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Actualizar Actividad</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal para ver participantes de actividad recreacional -->
<!-- Modal para ver participantes de actividad recreacional -->
<div class="modal fade" id="participantesModal" tabindex="-1" aria-labelledby="participantesModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header text-white" style="background: linear-gradient(135deg, #2c3e50, #678ca3);">
                <h5 class="modal-title fs-4 fw-bold">
                    <i class="bi bi-people-fill me-2"></i>Participantes Inscritos - <span id="modalActividadTitle"></span>
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body py-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="input-group" style="max-width: 300px;">
                        <span class="input-group-text"><i class="bi bi-search"></i></span>
                        <input type="text" id="searchParticipantes" class="form-control" placeholder="Buscar participante...">
                    </div>
                    <div class="text-muted" id="totalParticipantes"></div>
                </div>
                
                <div class="table-responsive participantes-table">
                    <table class="table table-hover align-middle">
                        <thead class="table-light sticky-thead">
                            <tr>
                                <th>#</th>
                                <th>NOMBRE COMPLETO</th>
                                <th>AÑO</th>
                                <th>FECHA INSCRIPCIÓN</th>
                                <th>ID</th>
                            </tr>
                        </thead>
                        <tbody id="participantesTableBody">
                            <!-- Los participantes se cargarán aquí dinámicamente -->
                        </tbody>
                    </table>
                </div>
                
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div>
                        <button class="btn btn-outline-primary btn-sm" id="exportCSV">
                            <i class="bi bi-download me-1"></i> Exportar CSV
                        </button>
                    </div>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    /* Estilos generales para todas las cards */
    .course-card {
        border: none;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        height: 100%;
        display: flex;
        flex-direction: column;
        background: white;
        position: relative;
    }
    
    .course-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
    
    .course-img {
        background: #f0f4f8;
        color: #2c3e50;
        height: 120px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
    }
    
    /* Estilo especial para cards recreacionales */
    .recreacional-card {
        border-left: 4px solid #4bc0c8;
        box-shadow: 0 4px 15px rgba(75, 192, 200, 0.2);
    }
    
    .recreacional-card:hover {
        box-shadow: 0 10px 25px rgba(75, 192, 200, 0.3);
    }
    
    .recreacional-img {
        height: 120px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
    }
    
    .course-body {
        padding: 1.5rem;
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    
    .course-title {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 0.75rem;
        color: #2c3e50;
    }
    
    .course-description {
        color: #678ca3;
        font-size: 0.9rem;
        margin-bottom: 1rem;
        flex: 1;
    }
    
    .course-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
    }
    
    .course-price {
        background: #4bc0c8;
        color: white;
        padding: 0.25rem 0.5rem;
        border-radius: 4px;
        font-size: 0.85rem;
        font-weight: 600;
    }
    
    .course-rating {
        color: #f39c12;
        font-weight: 600;
    }
    
    .btn-enroll {
        background: #4bc0c8;
        color: white;
        border: none;
        font-weight: 500;
        transition: all 0.3s;
    }
    
    .btn-enroll:hover {
        background: #3aa8b0;
        color: white;
    }
    
    /* Ribbon para destacar actividades recreacionales */
    .ribbon {
        width: 150px;
        height: 150px;
        overflow: hidden;
        position: absolute;
        z-index: 1;
    }
    
    .ribbon-top-right {
        top: -10px;
        right: -10px;
    }
    
    .ribbon span {
        position: absolute;
        display: block;
        width: 225px;
        padding: 5px 0;
        background-color: #4bc0c8;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        color: #fff;
        font-size: 0.75rem;
        text-transform: uppercase;
        text-align: center;
        right: -25px;
        top: 30px;
        transform: rotate(45deg);
        font-weight: 600;
    }
    
    /* Estilos específicos para cards recreacionales */
    .course-badge {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        margin-bottom: 0.75rem;
    }
    
    .course-badge .badge {
        font-size: 0.75rem;
        font-weight: 500;
        padding: 0.35rem 0.5rem;
    }
    
    .course-info-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 0.75rem;
        margin-bottom: 1rem;
        font-size: 0.85rem;
    }
    
    .info-item {
        display: flex;
        align-items: center;
        gap: 5px;
        color: #6c757d;
    }
    
    .info-item i {
        color: #4bc0c8;
        font-size: 1rem;
    }
    
    .facilitador-info {
        margin-top: 1rem;
        padding-top: 1rem;
        border-top: 1px solid #eee;
    }
    
    .avatar-sm {
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .avatar-title {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.875rem;
    }
    
    /* Estilos para el sidebar de categorías */
    .sidebar {
        background: white;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
        border-radius: 10px;
        padding: 1rem;
    }
    
    .sidebar-heading {
        font-size: 1.1rem;
        font-weight: 600;
        color: #2c3e50;
    }
    
    .nav.flex-column .nav-link {
        padding: 0.5rem 1rem;
        color: #678ca3;
        border-radius: 6px;
        margin-bottom: 0.25rem;
        transition: all 0.2s;
    }
    
    .nav.flex-column .nav-link:hover {
        color: #2c3e50;
        background: #f0f4f8;
    }
    
    .nav.flex-column .nav-link.active {
        color: white;
        background: linear-gradient(135deg, #2c3e50 0%, #678ca3 100%);
    }
    
    .nav.flex-column .nav-link i {
        width: 20px;
        text-align: center;
    }
    
    /* Estilo especial para el filtro de Plan Recreacional */
    .nav.flex-column .nav-link[data-category="Plan Recreacional"] {
        color: #4bc0c8;
        font-weight: 600;
    }
    
    .nav.flex-column .nav-link[data-category="Plan Recreacional"]:hover {
        background: rgba(75, 192, 200, 0.1);
    }
    
    .nav.flex-column .nav-link[data-category="Plan Recreacional"].active {
        background: linear-gradient(135deg, #4bc0c8 0%, #2c3e50 100%);
        color: white;
    }
</style>
@endsection

@section('script')
<script>
    // Función para mostrar los detalles de la formación
    function showFormationDetails(event, nombre, descripcion, tipo, categoria, duracion, rating, disponible, facilitador, icono, tipoCodigo, id) {
        event.preventDefault();
        event.stopPropagation();
        
        // Configurar los elementos del modal
        document.getElementById('detail-title').textContent = nombre;
        document.getElementById('detail-type').textContent = tipo;
        document.getElementById('detail-description').textContent = descripcion;
        document.getElementById('detail-category').textContent = categoria;
        document.getElementById('detail-duration').textContent = duracion ? duracion + ' horas' : 'No especificada';
        document.getElementById('detail-rating').textContent = rating;
        document.getElementById('detail-facilitador').textContent = facilitador || 'No especificado';
        
        // Configurar disponibilidad
        const availabilityElement = document.getElementById('detail-availability');
        availabilityElement.className = 'fw-bold';
        if (disponible === '1' || disponible === 'true') {
            availabilityElement.textContent = 'Disponible';
            availabilityElement.classList.add('text-success');
        } else {
            availabilityElement.textContent = 'No disponible';
            availabilityElement.classList.add('text-danger');
        }
        
        // Configurar botón de inscripción
        const enrollBtn = document.getElementById('detail-enroll-btn');
        if (disponible === '1' || disponible === 'true') {
            enrollBtn.onclick = function(e) {
                e.preventDefault();
                e.stopPropagation();
                window.location.href = `/inscripcion/formulario?tipo=${tipoCodigo}&formacion_id=${id}`;
            };
            enrollBtn.disabled = false;
            enrollBtn.classList.remove('btn-secondary');
            enrollBtn.classList.add('btn-primary');
        } else {
            enrollBtn.disabled = true;
            enrollBtn.classList.remove('btn-primary');
            enrollBtn.classList.add('btn-secondary');
        }
        
        // Mostrar el modal
        const modal = new bootstrap.Modal(document.getElementById('formationDetailsModal'));
        modal.show();
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Mapeo de categorías
        const CATEGORY_MAP = {
            'all': {key: 'all', label: 'Todas'},
            'hoy': {key: 'hoy', label: 'Disponibles hoy'},
            'Biología': {key: 'Biología', label: 'Biología'},
            'Física': {key: 'Física', label: 'Física'},
            'Química': {key: 'Química', label: 'Química'},
            'Matemática': {key: 'Matemática', label: 'Matemática'},
            'Artes': {key: 'Artes', label: 'Artes'},
            'Idiomas': {key: 'Idiomas', label: 'Idiomas'},
            'Tecnología': {key: 'Tecnología', label: 'Tecnología'},
            'Ambiente': {key: 'Ambiente', label: 'Ambiente'},
            'OCEV': {key: 'OCEV', label: 'OCEV'},
            'Ajedrez': {key: 'Ajedrez', label: 'Ajedrez'},
            'Lectura/Escritura': {key: 'Lectura/Escritura', label: 'Lectura/Escritura'},
            'TICs': {key: 'TICs', label: 'TICs'},
            'EIS': {key: 'EIS', label: 'EIS'},
            'Deporte': {key: 'Deporte', label: 'Deporte'},
            'HSE': {key: 'HSE', label: 'HSE'},
            'Plan Recreacional': {key: 'Plan Recreacional', label: 'Plan Recreacional'}
        };

        let currentCategory = 'all';

        // Función para filtrar formaciones por categoría
        function filterFormations(category) {
            currentCategory = category;
            const activeTab = document.querySelector('.tab-pane.fade.show.active');
            if (!activeTab) return;

            const container = activeTab.querySelector('.row.g-4');
            if (!container) return;

            const courseItems = container.querySelectorAll('.course-item');
            let hasVisibleItems = false;

            courseItems.forEach(item => {
                const itemCategory = item.dataset.category;
                const isAvailableToday = item.dataset.hoy === 'true';
                const isRecreational = itemCategory === 'Plan Recreacional';
                
                let shouldShow = false;
                
                if (category === 'all') {
                    shouldShow = true;
                } else if (category === 'hoy') {
                    shouldShow = isAvailableToday;
                } else if (category === 'Plan Recreacional') {
                    shouldShow = isRecreational;
                } else {
                    shouldShow = (itemCategory === category && !isRecreational);
                }
                
                item.style.display = shouldShow ? 'block' : 'none';
                if (shouldShow) hasVisibleItems = true;
            });

            updateCategoryTitle(activeTab, category);
            showNoResultsMessage(container, hasVisibleItems);
        }

        function updateCategoryTitle(activeTab, category) {
            const titleElement = activeTab.querySelector('.category-title');
            if (!titleElement) return;

            const tabType = activeTab.id;
            const prefixes = {
                'talleres': 'Talleres',
                'cursos': 'Cursos',
                'diplomados': 'Diplomados'
            };

            const baseTitle = prefixes[tabType] || '';
            const categoryData = CATEGORY_MAP[category] || CATEGORY_MAP.all;
            
            if (category === 'all') {
                titleElement.textContent = `${baseTitle} Disponibles`;
            } else if (category === 'hoy') {
                titleElement.textContent = `${baseTitle} Disponibles Hoy`;
            } else if (category === 'Plan Recreacional') {
                titleElement.textContent = 'Actividades Recreacionales';
            } else {
                titleElement.textContent = `${baseTitle} de ${categoryData.label}`;
            }
        }

        function showNoResultsMessage(container, hasVisibleItems) {
            const existingMessages = container.querySelectorAll('.no-results-message');
            existingMessages.forEach(msg => msg.remove());

            if (!hasVisibleItems) {
                const message = document.createElement('div');
                message.className = 'col-12 text-center py-4 no-results-message';
                message.innerHTML = '<div class="alert alert-info">No hay formaciones disponibles en esta categoría</div>';
                container.appendChild(message);
            }
        }

        // Event Listeners
        document.querySelectorAll('.category-filter').forEach(filter => {
            filter.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelectorAll('.category-filter').forEach(f => f.classList.remove('active'));
                this.classList.add('active');
                filterFormations(this.dataset.category);
            });
        });

        // Manejar cambios de pestaña
        const tabEls = document.querySelectorAll('button[data-bs-toggle="tab"]');
        tabEls.forEach(tabEl => {
            tabEl.addEventListener('shown.bs.tab', () => {
                filterFormations(currentCategory);
            });
        });

        // Configurar el modal de edición
        const editFormationModal = document.getElementById('editFormationModal');
        if (editFormationModal) {
            editFormationModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                
                // Obtener los datos del botón
                const id = button.getAttribute('data-id');
                const tipo = button.getAttribute('data-tipo');
                const nombre = button.getAttribute('data-nombre');
                const descripcion = button.getAttribute('data-descripcion');
                const categoria = button.getAttribute('data-categoria');
                const duracion = button.getAttribute('data-duracion');
                const disponible = button.getAttribute('data-disponible') === '1';
                const facilitador = button.getAttribute('data-facilitador');
                
                // Configurar el formulario de edición
                const form = document.getElementById('editFormationForm');
                form.action = `/formaciones/${id}`;
                
                // Llenar los campos del formulario
                document.getElementById('editFormationId').value = id;
                document.getElementById('editFormationType').value = tipo;
                document.getElementById('editFormationName').value = nombre;
                document.getElementById('editFormationDescription').value = descripcion;
                document.getElementById('editFormationCategory').value = categoria;
                document.getElementById('editFormationDuration').value = duracion || '';
                document.getElementById('editFormationAvailableToday').checked = disponible;
                document.getElementById('editFormationFacilitador').value = facilitador || '';
                
                // Actualizar el título del modal según el tipo
                let tipoTexto = '';
                switch(tipo) {
                    case 'T': tipoTexto = 'Taller'; break;
                    case 'C': tipoTexto = 'Curso'; break;
                    case 'D': tipoTexto = 'Diplomado'; break;
                }
                document.getElementById('editFormationModalLabel').innerHTML = 
                    `<i class="bi bi-pencil-square me-2"></i>Editar ${tipoTexto}`;
            });

            // Manejar el envío del formulario de edición
            document.getElementById('editFormationForm').addEventListener('submit', async function(e) {
                e.preventDefault();
                
                const form = e.target;
                const submitBtn = form.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;
                
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Actualizando...';

                try {
                    // Crear FormData para manejar los datos del formulario
                    const formData = new FormData(form);
                    const data = {};
                    
                    // Convertir FormData a objeto
                    formData.forEach((value, key) => {
                        // Manejar el checkbox de disponibilidad
                        if (key === 'disponible_hoy') {
                            data[key] = value === '1';
                        } else {
                            data[key] = value;
                        }
                    });

                    // Asegurar que el método sea PUT
                    data._method = 'PUT';

                    const response = await fetch(form.action, {
                        method: 'POST', // Laravel requiere POST para métodos PUT/PATCH/DELETE
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'X-Requested-With': 'XMLHttpRequest'
                        },
                        body: JSON.stringify(data)
                    });

                    const responseData = await response.json();

                    if (!response.ok) {
                        let errorMessage = 'Error al actualizar la formación';
                        if (responseData.errors) {
                            errorMessage = Object.values(responseData.errors).join('\n');
                        } else if (responseData.message) {
                            errorMessage = responseData.message;
                        }
                        throw new Error(errorMessage);
                    }

                    // Éxito - recargar la página
                    window.location.reload();

                } catch (error) {
                    console.error('Error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: error.message,
                        confirmButtonText: 'Entendido'
                    });
                } finally {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalText;
                }
            });
        }
        
        // Configurar el modal de nueva formación
        const addFormationModal = document.getElementById('addFormationModal');
        if (addFormationModal) {
            addFormationModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const type = button.getAttribute('data-type');
                document.getElementById('formationType').value = type;
                document.getElementById('addFormationForm').reset();
                
                // Actualizar el título del modal según el tipo
                let tipoTexto = '';
                switch(type) {
                    case 'T': tipoTexto = 'Taller'; break;
                    case 'C': tipoTexto = 'Curso'; break;
                    case 'D': tipoTexto = 'Diplomado'; break;
                }
                document.getElementById('addFormationModalLabel').innerHTML = 
                    `<i class="bi bi-plus-circle me-2"></i>Añadir Nuevo ${tipoTexto}`;
            });

            // Manejar el envío del formulario de nueva formación
            document.getElementById('addFormationForm').addEventListener('submit', async function(e) {
                e.preventDefault();
                
                const form = e.target;
                const submitBtn = form.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;
                
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Guardando...';

                try {
                    // Crear objeto con los datos del formulario
                    const formData = {
                        nombre: form.nombre.value,
                        descripcion: form.descripcion.value,
                        tipo: form.tipo.value,
                        categoria: form.categoria.value,
                        duracion: form.duracion.value || null,
                        disponible_hoy: form.disponible_hoy.checked,
                        facilitador: form.facilitador.value || null,
                        _token: document.querySelector('meta[name="csrf-token"]').content
                    };

                    // Validación básica
                    if (!formData.tipo) {
                        throw new Error('Debe seleccionar un tipo de formación');
                    }

                    // Enviar la solicitud
                    const response = await fetch(form.action, {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': formData._token
                        },
                        body: JSON.stringify(formData)
                    });

                    const data = await response.json();

                    // Manejo de respuestas
                    if (!response.ok) {
                        if (data.errors) {
                            // Mostrar errores de validación del servidor
                            const errorMessages = Object.values(data.errors).flat();
                            throw new Error(errorMessages.join('\n'));
                        }
                        throw new Error(data.message || 'Error en el servidor');
                    }

                    // Éxito - recargar la página
                    window.location.reload();

                } catch (error) {
                    console.error('Error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: error.message,
                        confirmButtonText: 'Entendido'
                    });
                } finally {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalText;
                }
            });
        }

        // Configurar el modal de nueva actividad recreacional
        const addRecreacionalModal = document.getElementById('addRecreacionalModal');
        if (addRecreacionalModal) {
            document.getElementById('addRecreacionalForm').addEventListener('submit', async function(e) {
                e.preventDefault();
                
                const form = e.target;
                const submitBtn = form.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;
                
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Guardando...';

                try {
                    // Obtener el token CSRF
                    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
                    
                    // Crear FormData
                    const formData = new FormData(form);
                    const data = {};
                    formData.forEach((value, key) => {
                        data[key] = value;
                    });
                    
                    // Añadir token CSRF
                    data._token = csrfToken;
                    
                    const response = await fetch(form.action, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: JSON.stringify(data)
                    });
                    
                    const responseData = await response.json();
                    
                    if (!response.ok) {
                        let errorMessage = 'Error al crear la actividad';
                        if (responseData.errors) {
                            errorMessage = Object.values(responseData.errors).join('\n');
                        } else if (responseData.message) {
                            errorMessage = responseData.message;
                        }
                        throw new Error(errorMessage);
                    }
                    
                    // Éxito - recargar la página
                    window.location.reload();
                    
                } catch (error) {
                    console.error('Error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: error.message,
                        confirmButtonText: 'Entendido'
                    });
                } finally {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalText;
                }
            });
        }

        // Configurar el modal de edición recreacional
        const editRecreacionalModal = document.getElementById('editRecreacionalModal');
        if (editRecreacionalModal) {
            editRecreacionalModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const form = document.getElementById('editRecreacionalForm');
                
                // Establecer la acción del formulario
                form.action = `/actividades-recreacionales/${button.getAttribute('data-id')}`;
                
                // Llenar los campos del formulario
                document.getElementById('editRecreacionalId').value = button.getAttribute('data-id');
                document.getElementById('editRecreacionalNombre').value = button.getAttribute('data-nombre');
                document.getElementById('editRecreacionalTipo').value = button.getAttribute('data-tipo');
                document.getElementById('editRecreacionalEdades').value = button.getAttribute('data-edades');
                document.getElementById('editRecreacionalEspacio').value = button.getAttribute('data-espacio');
                document.getElementById('editRecreacionalHorario').value = button.getAttribute('data-horario');
                document.getElementById('editRecreacionalFechaInicio').value = button.getAttribute('data-fecha_inicio');
                document.getElementById('editRecreacionalFechaFin').value = button.getAttribute('data-fecha_fin');
                document.getElementById('editRecreacionalFacilitador').value = button.getAttribute('data-facilitador');
                const cupoCompleto = button.getAttribute('data-cupo_completo') === '1';
                document.getElementById('editRecreacionalCupoCompleto').checked = cupoCompleto;
            });
            
            // Manejar el envío del formulario
            document.getElementById('editRecreacionalForm').addEventListener('submit', async function(e) {
                e.preventDefault();
                
                const form = e.target;
                const submitBtn = form.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;
                
                submitBtn.disabled = true;
                submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm"></span> Actualizando...';
                
                try {
                    // Obtener el token CSRF
                    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
                    
                    // Crear FormData
                    const formData = new FormData(form);
                    const data = {};
                    formData.forEach((value, key) => {
                        data[key] = value;
                    });
                    
                    // Añadir método PUT
                    data._method = 'PUT';
                    
                    const response = await fetch(form.action, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': csrfToken
                        },
                        body: JSON.stringify(data)
                    });
                    
                    const responseData = await response.json();
                    
                    if (!response.ok) {
                        let errorMessage = 'Error al actualizar la actividad';
                        if (responseData.errors) {
                            errorMessage = Object.values(responseData.errors).join('\n');
                        } else if (responseData.message) {
                            errorMessage = responseData.message;
                        }
                        throw new Error(errorMessage);
                    }
                    
                    // Éxito - recargar la página
                    window.location.reload();
                    
                } catch (error) {
                    console.error('Error:', error);
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: error.message,
                        confirmButtonText: 'Entendido'
                    });
                } finally {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalText;
                }
            });
        }

        // CONFIGURACIÓN CORREGIDA DEL MODAL DE PARTICIPANTES
       // CONFIGURACIÓN CORREGIDA DEL MODAL DE PARTICIPANTES
const participantesModal = document.getElementById('participantesModal');
if (participantesModal) {
    let participantesData = []; // Almacenar los datos para exportación
    
    participantesModal.addEventListener('show.bs.modal', async function(event) {
        const button = event.relatedTarget;
        const activityId = button.getAttribute('data-activity-id');
        const activityName = button.closest('.course-card').querySelector('.course-title').textContent;
        
        // Actualizar título del modal
        document.getElementById('modalActividadTitle').textContent = activityName;
        
        // Mostrar spinner de carga
        const tableBody = document.getElementById('participantesTableBody');
        tableBody.innerHTML = `
            <tr>
                <td colspan="5" class="text-center py-4">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Cargando...</span>
                    </div>
                    <p class="mt-2">Cargando participantes...</p>
                </td>
            </tr>
        `;
        
        try {
            // Obtener los participantes desde el servidor
            const response = await fetch(`/api/actividades/${activityId}/participantes`);
            const data = await response.json();
            
            if (!response.ok) {
                throw new Error(data.message || 'Error al cargar los participantes');
            }
            
            // CORRECCIÓN: Verificar y procesar los datos para evitar duplicados
            let participantes = data.participantes || [];
            participantesData = []; // Reiniciar datos para exportación
            
            let participantesUnicos = [];
            let idsVistos = new Set();
            
            // Filtrar participantes duplicados
            participantes.forEach(participante => {
                const participanteId = participante.ID || participante.id || 
                                     participante.cedula || participante.documento;
                if (participanteId && !idsVistos.has(participanteId)) {
                    idsVistos.add(participanteId);
                    participantesUnicos.push(participante);
                    
                    // Guardar datos para exportación
                    participantesData.push({
                        numero: participantesUnicos.length,
                        nombre: participante['NOMBRE COMPLETO'] || participante.nombre_completo || participante.nombre || 'N/A',
                        año: participante.ARO || participante.ano || participante.year || 'N/A',
                        fecha: participante['FECHA INSCENPICON'] || participante.fecha_inscripcion || participante.fecha || 'N/A',
                        id: participanteId
                    });
                }
            });
            
            // Actualizar la tabla con los participantes únicos
            if (participantesUnicos.length > 0) {
                let html = '';
                participantesUnicos.forEach((participante, index) => {
                    // Usar datos seguros con valores por defecto
                    const nombreCompleto = participante['NOMBRE COMPLETO'] || 
                                         participante.nombre_completo || 
                                         participante.nombre || 'N/A';
                    
                    const año = participante.ARO || participante.ano || participante.year || 'N/A';
                    const fechaInscripcion = participante['FECHA INSCENPICON'] || 
                                           participante.fecha_inscripcion || 
                                           participante.fecha || 'N/A';
                    const idUnico = participante.ID || participante.id || (index + 1);
                    
                    html += `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${nombreCompleto}</td>
                            <td>${año}</td>
                            <td>${fechaInscripcion}</td>
                            <td>${idUnico}</td>
                        </tr>
                    `;
                });
                tableBody.innerHTML = html;
            } else {
                tableBody.innerHTML = `
                    <tr>
                        <td colspan="5" class="text-center py-4">
                            <i class="bi bi-people-slash fs-1 text-muted"></i>
                            <p class="mt-2">No hay participantes inscritos aún</p>
                        </td>
                    </tr>
                `;
            }
            
            // Actualizar el contador total con participantes únicos
            const totalUnicos = participantesUnicos.length;
            document.getElementById('totalParticipantes').textContent = 
                `Total: ${totalUnicos} participante${totalUnicos !== 1 ? 's' : ''}`;
                
        } catch (error) {
            console.error('Error:', error);
            tableBody.innerHTML = `
                <tr>
                    <td colspan="5" class="text-center py-4 text-danger">
                        <i class="bi bi-exclamation-triangle-fill"></i>
                        <p class="mt-2">${error.message}</p>
                    </td>
                </tr>
            `;
            document.getElementById('totalParticipantes').textContent = 'Error al cargar';
            participantesData = []; // Limpiar datos de exportación
        }
    });
    
    // Función de búsqueda
    document.getElementById('searchParticipantes').addEventListener('input', function(e) {
        const searchTerm = e.target.value.toLowerCase();
        const rows = document.querySelectorAll('#participantesTableBody tr');
        
        let visibleCount = 0;
        
        rows.forEach(row => {
            const nombre = row.cells[1].textContent.toLowerCase();
            if (nombre.includes(searchTerm)) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });
        
        // Actualizar contador de resultados visibles
        document.getElementById('totalParticipantes').textContent = 
            `Mostrando: ${visibleCount} de ${rows.length} participante${rows.length !== 1 ? 's' : ''}`;
    });
    
    // Función de exportación CORREGIDA
    document.getElementById('exportCSV').addEventListener('click', function() {
        if (participantesData.length === 0) {
            Swal.fire({
                icon: 'warning',
                title: 'Sin datos',
                text: 'No hay datos para exportar',
                confirmButtonText: 'Entendido'
            });
            return;
        }
        
        try {
            // Crear contenido CSV
            let csvContent = "Número,Nombre Completo,Año,Fecha de Inscripción,ID\n";
            
            participantesData.forEach(participante => {
                csvContent += `"${participante.numero}","${participante.nombre}","${participante.año}","${participante.fecha}","${participante.id}"\n`;
            });
            
            // Crear blob para descarga
            const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
            const link = document.createElement("a");
            const url = URL.createObjectURL(blob);
            
            link.setAttribute("href", url);
            link.setAttribute("download", `participantes_${new Date().toISOString().split('T')[0]}.csv`);
            link.style.visibility = 'hidden';
            
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            
            // Liberar memoria
            setTimeout(() => URL.revokeObjectURL(url), 100);
            
        } catch (error) {
            console.error('Error al exportar CSV:', error);
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'No se pudo exportar el archivo CSV',
                confirmButtonText: 'Entendido'
            });
        }
    });
    
    // Limpiar la modal cuando se cierre
    participantesModal.addEventListener('hidden.bs.modal', function() {
        document.getElementById('participantesTableBody').innerHTML = '';
        document.getElementById('totalParticipantes').textContent = '';
        document.getElementById('searchParticipantes').value = '';
        participantesData = []; // Limpiar datos
    });
}
        // Inicialización
        filterFormations('all');
    });
</script>
@endsection