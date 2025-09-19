@extends('layouts.app') @section('title', 'Panel de Administración') @section('content') <div class="container py-4">
    <h1 class="text-center mb-4 fw-bold" style="color: #1a365d;">Panel de Administración</h1> @if(session('success')) <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
    </div> @endif
    <!-- Tabs -->
    <ul class="nav nav-pills bg-white shadow-sm sticky-top" id="adminTabs" role="tablist" style="top: 56px; z-index: 1030;">
        <li class="nav-item" role="presentation">
            <button class="nav-link custom-tab-btn active" id="usuarios-tab" data-bs-toggle="tab" data-bs-target="#usuarios" type="button" role="tab">
                <i class="bi bi-people-fill me-1"></i> Usuarios </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link text-primary fw-semibold" id="control-estudios-tab" data-bs-toggle="tab" data-bs-target="#control-estudios" type="button" role="tab">
                <i class="bi bi-journal-text me-1"></i> Control de Estudios </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link text-primary fw-semibold" id="certificados-tab" data-bs-toggle="tab" data-bs-target="#certificados" type="button" role="tab">
                <i class="bi bi-file-earmark-check me-1"></i> Aprobación Certificados </button>
        </li>
    </ul>
    <div style="height: 48px;"></div>
    <div class="tab-content mt-3" id="adminTabsContent">
        <!-- TAB: Usuarios con filtrado por rol -->
        <div class="tab-pane fade show active" id="usuarios" role="tabpanel" aria-labelledby="usuarios-tab">
            <div class="d-flex justify-content-between align-items-center mb-4 p-3 rounded-3" style="background: linear-gradient(135deg, #f8f9fa, #e9ecef); border-left: 5px solid #2c3e50;">
                <div>
                    <h3 class="mb-0 fw-bold text-dark" style="color: #1a365d !important;">
                        <i class="bi bi-people-fill me-2"></i>Usuarios Registrados
                    </h3>
                    <p class="mb-0 text-muted">Gestión completa de usuarios del sistema</p>
                </div>
                <div class="d-flex align-items-center">
                    <div class="me-3 text-end">
                        <h6 class="mb-0 text-uppercase text-muted small">Total</h6>
                        <h2 class="mb-0 fw-bold contador-numero" id="contadorUsuarios" data-valor="{{ $totalUsuarios }}">0</h2>
                    </div>
                    <div class="icono-contador p-3 rounded-circle d-flex align-items-center justify-content-center" style="background: linear-gradient(135deg, #2c3e50, #3498db);">
                        <i class="bi bi-person-lines-fill fs-4 text-white"></i>
                    </div>
                </div>
            </div>
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-header text-white d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 py-3" style="background: linear-gradient(90deg, #2c3e50, #678ca3);">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-person-lines-fill me-2"></i>
                        <h5 class="mb-0">Gestión de Usuarios</h5>
                    </div>
                    <div class="d-flex flex-column flex-md-row gap-2 w-100 w-md-auto">
                        <!-- Filtro por rol -->
                        <div class="filter-group">
                            <select id="filtroRol" class="form-select form-select-sm shadow-sm">
                                <option value="">Todos los roles</option>
                                <option value="admin">Administradores</option>
                                <option value="usuario">Usuarios</option>
                            </select>
                        </div>
                        <!-- Buscador general -->
                        <div class="input-group input-group-sm shadow-sm">
                            <input type="text" id="buscadorUsuarios" class="form-control" placeholder="Buscar..." autocomplete="off">
                            <button class="btn btn-outline-light" type="button" id="btnLimpiarFiltrosUsuarios">
                                <i class="bi bi-x-lg"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped align-middle mb-0" id="table-usuarios">
                            <thead class="text-white text-center" style="background: #2c3e50;">
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Rol</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="text-center"> @forelse ($usuarios as $usuario) <tr data-rol="{{ $usuario->rol }}">
                                    <td>{{ $usuario->id }}</td>
                                    <td>{{ $usuario->name }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td> @if($usuario->rol === 'admin') <span class="badge" style="background: linear-gradient(135deg,rgb(46, 84, 153),rgb(36, 85, 158));">Administrador</span> @else <span class="badge" style="background: linear-gradient(135deg, #3498db, #2980b9);">Usuario</span> @endif </td>
                                    <td>
                                        <div class="d-flex gap-2 justify-content-center">
                                            <button class="btn btn-outline-primary btn-sm" title="Editar usuario" data-bs-toggle="modal" data-bs-target="#editarUsuarioModal" data-id="{{ $usuario->id }}" data-name="{{ $usuario->name }}" data-email="{{ $usuario->email }}" data-rol="{{ $usuario->rol }}">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                            <button class="btn btn-outline-danger btn-sm btn-eliminar" title="Eliminar usuario" data-id="{{ $usuario->id }}" data-name="{{ $usuario->name }}">
                                                <i class="bi bi-trash3-fill"></i>
                                            </button>
                                            <form id="delete-form-{{ $usuario->id }}" action="{{ route('admin.usuarios.destroy', $usuario->id) }}" method="POST" class="d-none"> @csrf @method('DELETE') </form>
                                        </div>
                                    </td>
                                </tr> @empty <tr>
                                    <td colspan="5" class="text-muted">No hay usuarios registrados.</td>
                                </tr> @endforelse </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer bg-white d-flex justify-content-between align-items-center">
                    <div class="text-muted small"> Mostrando <span id="contadorUsuariosVisibles">{{ count($usuarios) }}</span> de {{ count($usuarios) }} registros </div>
                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#crearUsuarioModal" style="background: linear-gradient(135deg, #27ae60, #219955); border: none;">
                        <i class="bi bi-plus-lg"></i> Nuevo Usuario </button>
                </div>
            </div>
        </div>
        <!-- TAB: Control de Estudios -->
        <div class="tab-pane fade" id="control-estudios" role="tabpanel" aria-labelledby="control-estudios-tab">
            <div class="card border-0 shadow-sm">
                <div class="card-header text-white d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 py-3" style="background: linear-gradient(90deg, #2c3e50, #678ca3);">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-journal-text me-2"></i>
                        <h5 class="mb-0">Registros Académicos</h5>
                    </div>
                    <div class="d-flex flex-column flex-md-row gap-2 w-100 w-md-auto">
                        <!-- Filtro por Plan Recreacional -->
                        <div class="filter-group">
                            <select id="filtroPlanRecreacional" class="form-select form-select-sm shadow-sm">
                                <option value="">Todos los planes</option>
                                <option value="SI">Plan Recreacional (SI)</option>
                                <option value="NO">Sin Plan Recreacional (NO)</option>
                            </select>
                        </div>
                        <!-- Buscador general -->
                        <div class="input-group input-group-sm shadow-sm">
                            <input type="text" id="buscadorControlEstudios" class="form-control" placeholder="Buscar..." autocomplete="off">
                            <button class="btn btn-outline-light" type="button" id="btnLimpiarFiltrosControl">
                                <i class="bi bi-x-lg"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle mb-0" id="table-control">
                            <thead class="text-white text-center" style="background: #2c3e50;">
                                <tr>
                                    <th>ID</th>
                                    <th>Estado</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Cédula</th>
                                    <th>Certificado</th>
                                    <th>Día</th>
                                    <th>Mes</th>
                                    <th>Año</th>
                                    <th>Duración</th>
                                    <th>Formación</th>
                                    <th>Programa</th>
                                    <th>Cohorte</th>
                                    <th>Fila</th>
                                    <th>Detalle</th>
                                    <th>Cód. Barra</th>
                                    <th>Generador CB</th>
                                    <th>Plan Recreacional</th>
                                </tr>
                            </thead>
                            <tbody class="text-center"> @forelse ($control_estudio as $formacion) <tr data-plan-recreacional="{{ $formacion->plan_recreacional ?? 'NO' }}">
                                    <td>{{ $formacion->id }}</td>
                                    <td> @php $estado = strtolower($formacion->ESTADO); @endphp <span class="badge" style="background: {{ $estado === 'completado' ? 'linear-gradient(135deg, #27ae60, #219955)' : ($estado === 'en progreso' ? 'linear-gradient(135deg, #f39c12, #e67e22)' : 'linear-gradient(135deg, #95a5a6, #7f8c8d)') }}; color: white;">
                                            {{ $formacion->ESTADO }}
                                        </span>
                                    </td>
                                    <td>{{ $formacion->NOMBRE }}</td>
                                    <td>{{ $formacion->APELLIDO }}</td>
                                    <td>{{ $formacion->CEDULA }}</td>
                                    <td>{{ $formacion->certificado }}</td>
                                    <td>{{ $formacion->dia }}</td>
                                    <td>{{ $formacion->mes }}</td>
                                    <td>{{ $formacion->año }}</td>
                                    <td>{{ $formacion->duracion }}</td>
                                    <td>{{ $formacion->{'tipo de Formacion'} }}</td>
                                    <td>{{ $formacion->Programa }}</td>
                                    <td>{{ $formacion->Cohorte }}</td>
                                    <td>{{ $formacion->fila }}</td>
                                    <td>{{ $formacion->{'tipo de Formacion-Programa-Cohorte-fila'} }}</td>
                                    <td>{{ $formacion->{'Cod de Barra'} }}</td>
                                    <td>{{ $formacion->{'generador CB'} }}</td>
                                    <td>{{ $formacion->plan_recreacional ?? 'NO' }}</td>
                                </tr> @empty <tr>
                                    <td colspan="18" class="text-muted">No hay registros académicos.</td>
                                </tr> @endforelse </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer bg-white d-flex justify-content-between align-items-center">
                    <div class="text-muted small"> Mostrando <span id="contadorControlEstudios">{{ count($control_estudio) }}</span> de {{ count($control_estudio) }} registros </div>
                </div>
            </div>
        </div>
        <!-- TAB: Aprobación de Certificados - Versión profesional -->
        <div class="tab-pane fade" id="certificados" role="tabpanel" aria-labelledby="certificados-tab">
            <div class="card border-0 shadow-sm">
                <div class="card-header text-white d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 py-3" style="background: linear-gradient(90deg, #2c3e50, #678ca3);">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-file-earmark-medical fs-4 me-2"></i>
                        <h5 class="mb-0">Gestión de Certificados</h5>
                    </div>
                    <div class="d-flex flex-column flex-md-row gap-2 w-100 w-md-auto">
                        <!-- Filtro por tipo de formación -->
                        <div class="filter-group">
                            <select id="filtroTipo" class="form-select form-select-sm shadow-sm">
                                <option value="">Todos los tipos</option>
                                <option value="C">Cursos</option>
                                <option value="T">Talleres</option>
                                <option value="D">Diplomados</option>
                            </select>
                        </div>
                        <!-- Filtro por estado -->
                        <div class="filter-group">
                            <select id="filtroEstado" class="form-select form-select-sm shadow-sm">
                                <option value="">Todos los estados</option>
                                <option value="pendiente">Pendientes</option>
                                <option value="aprobado">Aprobados</option>
                                <option value="rechazado">Rechazados</option>
                            </select>
                        </div>
                        <!-- Buscador general -->
                        <div class="input-group input-group-sm shadow-sm">
                            <input type="text" id="buscadorGeneral" class="form-control" placeholder="Buscar...">
                            <button class="btn btn-outline-light" type="button" id="btnLimpiarFiltros">
                                <i class="bi bi-x-lg"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle mb-0" id="tablaCertificados">
                            <thead class="text-white" style="background: #2c3e50;">
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th>Participante</th>
                                    <th>Formación</th>
                                    <th class="text-center">Tipo</th>
                                    <th class="text-center">Estado</th>
                                    <th class="text-center">Fecha Solicitud</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody> @forelse($inscripciones as $inscripcion) <tr data-tipo="{{ $inscripcion->tipo_formacion }}" data-estado="{{ $inscripcion->estado_formacion }}">
                                    <td class="text-center">{{ $inscripcion->id }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0 me-2">
                                                <i class="bi bi-person-circle fs-5"></i>
                                            </div>
                                            <div>
                                                <h6 class="mb-0">{{ $inscripcion->nombre }}</h6>
                                                <small class="text-muted">{{ $inscripcion->email }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td> @if($inscripcion->tipo_formacion === 'C') {{ $inscripcion->curso }} @elseif($inscripcion->tipo_formacion === 'T') {{ $inscripcion->taller }} @elseif($inscripcion->tipo_formacion === 'D') {{ $inscripcion->diplomado }} @endif </td>
                                    <td class="text-center"> @switch($inscripcion->tipo_formacion) @case('C') <span class="badge rounded-pill bg-primary bg-opacity-10 text-primary">
                                            <i class="bi bi-book me-1"></i> Curso </span> @break @case('T') <span class="badge rounded-pill bg-info bg-opacity-10 text-info">
                                            <i class="bi bi-tools me-1"></i> Taller </span> @break @case('D') <span class="badge rounded-pill bg-warning bg-opacity-10 text-warning">
                                            <i class="bi bi-award me-1"></i> Diplomado </span> @break @endswitch </td>
                                    <td class="text-center"> @if($inscripcion->estado_formacion === 'aprobado') <span class="badge rounded-pill bg-success bg-opacity-10 text-success">
                                            <i class="bi bi-check-circle me-1"></i> Aprobado </span> @elseif($inscripcion->estado_formacion === 'pendiente') <span class="badge rounded-pill bg-warning bg-opacity-10 text-warning">
                                            <i class="bi bi-clock-history me-1"></i> Pendiente </span> @else <span class="badge rounded-pill bg-danger bg-opacity-10 text-danger">
                                            <i class="bi bi-x-circle me-1"></i> Rechazado </span> @endif </td>
                                    <td class="text-center">
                                        {{ $inscripcion->created_at->format('d/m/Y') }}
                                    </td>
                                    <td class="text-center"> @if($inscripcion->estado_formacion === 'pendiente_admin') <div class="d-flex justify-content-center gap-2">
                                            <form method="POST" action="{{ route('admin.certificados.aprobar', $inscripcion->id) }}" class="m-0"> @csrf @method('PUT') <button type="submit" class="btn btn-sm btn-success">
                                                    <i class="bi bi-check-lg"></i> Aprobar </button>
                                            </form>
                                            <!-- Botón que abre el modal de rechazo -->
                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#rechazarModal" data-inscripcion-id="{{ $inscripcion->id }}">
                                                <i class="bi bi-x-lg"></i> Rechazar </button>
                                        </div> @elseif($inscripcion->estado_formacion === 'aprobado') <span class="badge bg-success">Aprobado</span> @elseif($inscripcion->estado_formacion === 'rechazado_admin') <div>
                                            <span class="badge bg-danger">Rechazado</span> @if($inscripcion->comentarios_rechazo_admin) <div class="small text-muted mt-1">
                                                <i class="bi bi-chat-left-text"></i> {{ $inscripcion->comentarios_rechazo_admin }}
                                            </div> @endif
                                        </div> @elseif($inscripcion->estado_formacion === 'rechazado_facilitador') <div>
                                            <span class="badge bg-warning">Rechazado por facilitador</span> @if($inscripcion->comentarios_rechazo_facilitador) <div class="small text-muted mt-1">
                                                <i class="bi bi-chat-left-text"></i> <strong>Motivo del facilitador:</strong> {{ $inscripcion->comentarios_rechazo_facilitador }}
                                            </div> @endif <div class="d-flex justify-content-center gap-2 mt-2">
                                                <form method="POST" action="{{ route('admin.certificados.aprobar', $inscripcion->id) }}" class="m-0"> @csrf @method('PUT') <button type="submit" class="btn btn-sm btn-success">
                                                        <i class="bi bi-check-lg"></i> Aprobar igual </button>
                                                </form>
                                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#rechazarModal" data-inscripcion-id="{{ $inscripcion->id }}">
                                                    <i class="bi bi-x-lg"></i> Rechazar </button>
                                            </div>
                                        </div> @endif </td>
                                    <!-- Modal para Rechazar Certificado -->
                                    <div class="modal fade" id="rechazarModal" tabindex="-1" aria-labelledby="rechazarModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header text-white" style="background: linear-gradient(90deg, #e74c3c, #c0392b);">
                                                    <h5 class="modal-title" id="rechazarModalLabel">Rechazar Certificado</h5>
                                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                                </div>
                                                <form id="formRechazarCertificado" method="POST" action=""> @csrf @method('PUT') <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="motivo" class="form-label">Motivo del rechazo</label>
                                                            <textarea class="form-control" id="motivo" name="motivo" rows="3" required></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                        <button type="submit" class="btn btn-danger">Confirmar Rechazo</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    </td>
                                </tr> @empty <tr>
                                    <td colspan="7" class="text-center">No hay inscripciones pendientes</td>
                                </tr> @endforelse </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer bg-white d-flex justify-content-between align-items-center">
            <div class="text-muted small"> Mostrando <span id="contadorFilas">{{ count($inscripciones) }}</span> de {{ count($inscripciones) }} registros </div>
            <nav aria-label="Paginación">
                <ul class="pagination pagination-sm mb-0">
                    <!-- Aquí iría la paginación si la hubiera -->
                </ul>
            </nav>
        </div>
    </div>
</div>
</div>
</div>
<!-- Modal Detalle Certificado -->
<div class="modal fade" id="detalleCertificadoModal" tabindex="-1" aria-labelledby="detalleCertificadoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header text-white" style="background: linear-gradient(90deg, #2c3e50, #678ca3);">
                <h5 class="modal-title" id="detalleCertificadoModalLabel">Detalle del Certificado</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body" id="contenidoDetalleCertificado">
                <!-- Contenido cargado dinámicamente -->
                <div class="text-center py-5">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Cargando...</span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btnImprimirCertificado">
                    <i class="bi bi-printer-fill me-1"></i> Imprimir </button>
            </div>
        </div>
    </div>
</div>
<!-- Modal: Crear Nuevo Usuario -->
<div class="modal fade" id="crearUsuarioModal" tabindex="-1" aria-labelledby="crearUsuarioModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('admin.usuarios.create') }}"> @csrf <div class="modal-content">
                <div class="modal-header text-white" style="background: linear-gradient(90deg, #2c3e50, #678ca3);">
                    <h5 class="modal-title" id="crearUsuarioModalLabel">Crear Nuevo Usuario</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="rol" class="form-label">Rol</label>
                        <select class="form-select" id="rol" name="rol" required>
                            <option value="">Seleccione un rol</option>
                            <option value="admin">Administrador</option>
                            <option value="usuario">Usuario</option>
                            <option value="facilitador">Facilitador</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" required autocomplete="new-password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn text-white" style="background: linear-gradient(135deg, #3498db, #2980b9); border: none;">Crear Usuario</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Modal: Editar Usuario -->
<div class="modal fade" id="editarUsuarioModal" tabindex="-1" aria-labelledby="editarUsuarioModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="" id="formEditarUsuario"> @csrf @method('PUT') <div class="modal-content">
                <div class="modal-header text-white" style="background: linear-gradient(90deg, #2c3e50, #678ca3);">
                    <h5 class="modal-title" id="editarUsuarioModalLabel">Editar Usuario</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit_nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="edit_nombre" name="nombre" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="edit_email" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="edit_email" name="email" required autocomplete="off">
                    </div>
                    <div class="mb-3">
                        <label for="edit_rol" class="form-label">Rol</label>
                        <select class="form-select" id="edit_rol" name="rol" required>
                            <option value="admin">Administrador</option>
                            <option value="usuario">Usuario</option>
                            <option value="facilitador">Facilitador</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="edit_password" class="form-label">Nueva Contraseña (dejar en blanco para no cambiar)</label>
                        <input type="password" class="form-control" id="edit_password" name="password" autocomplete="new-password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn text-white" style="background: linear-gradient(135deg, #3498db, #2980b9); border: none;">Guardar Cambios</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Modal: Confirmación de Eliminación -->
<div class="modal fade" id="confirmarEliminarModal" tabindex="-1" aria-labelledby="confirmarEliminarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header text-white" style="background: linear-gradient(90deg, #e74c3c, #c0392b);">
                <h5 class="modal-title" id="confirmarEliminarModalLabel">Confirmar Eliminación</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="flex-shrink-0 me-3">
                        <i class="bi bi-exclamation-triangle-fill text-danger fs-1"></i>
                    </div>
                    <div>
                        <p class="mb-0">¿Estás seguro que deseas eliminar al usuario <strong id="nombreUsuarioEliminar"></strong>?</p>
                        <p class="text-muted small mt-1">Esta acción no se puede deshacer.</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn text-white" id="confirmarEliminarBtn" style="background: linear-gradient(135deg, #e74c3c, #c0392b); border: none;">Sí, Eliminar</button>
            </div>
        </div>
    </div>
</div> @endsection @section('style') <style>
    /* Estilos generales */
    body {
        background-color: #f8f9fa;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .container {
        max-width: 1400px;
    }

    .nav-pills .nav-link.active {
        background-color: #f8f9fa !important;
        color: #495057 !important;
        border-bottom: 3px solid #6c757d !important;
        box-shadow: none !important;
    }

    .nav-pills .nav-link {
        color: #6c757d !important;
        transition: all 0.3s ease;
        border-radius: 0 !important;
        margin: 0 5px !important;
    }

    .nav-pills .nav-link:hover:not(.active) {
        background-color: transparent !important;
        color: #2c3e50 !important;
        border-bottom: 3px solid #dee2e6 !important;
    }

    .nav-pills .nav-link i {
        color: inherit !important;
    }

    .nav-pills {
        border-bottom: 1px solid #dee2e6 !important;
    }

    .card {
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        border: none;
    }

    .card-header {
        border-radius: 0 !important;
    }

    .table {
        margin-bottom: 0;
    }

    .table th {
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.8rem;
        letter-spacing: 0.5px;
    }

    .table td {
        vertical-align: middle;
    }

    .badge {
        padding: 0.5em 0.75em;
        font-weight: 600;
        letter-spacing: 0.5px;
    }

    .btn {
        border-radius: 6px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.8rem;
    }

    @keyframes pulse {
        0% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.05);
        }

        100% {
            transform: scale(1);
        }
    }

    .table-hover tbody tr {
        transition: all 0.2s ease;
    }

    .table-hover tbody tr:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
    }

    .modal-header {
        border-radius: 0;
    }

    .form-control,
    .form-select {
        border-radius: 6px;
        padding: 0.5rem 0.75rem;
        border: 1px solid #dee2e6;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #3498db;
        box-shadow: 0 0 0 0.25rem rgba(52, 152, 219, 0.25);
    }

    .contador-numero {
        font-size: 2.5rem;
        font-weight: 700;
        background: linear-gradient(135deg, #3498db, #2c3e50);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .btn:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .btn-outline-primary {
        color: #3498db;
        border-color: #3498db;
    }

    .btn-outline-primary:hover {
        background-color: #3498db;
        color: white;
    }

    .btn-outline-danger {
        color: #e74c3c;
        border-color: #e74c3c;
    }

    .btn-outline-danger:hover {
        background-color: #e74c3c;
        color: white;
    }

    .card-footer {
        background-color: white;
        border-top: 1px solid rgba(0, 0, 0, 0.05);
    }

    .d-flex.gap-2 {
        gap: 0.5rem !important;
    }

    .btn-sm i {
        font-size: 0.875rem;
        line-height: 1;
    }

    /* Estilos específicos para las tablas */
    #tablaCertificados tbody tr,
    #table-usuarios tbody tr {
        transition: all 0.2s ease;
    }

    #tablaCertificados tbody tr:hover,
    #table-usuarios tbody tr:hover {
        background-color: rgba(0, 0, 0, 0.02);
    }

    .badge.bg-opacity-10 {
        padding: 0.35em 0.65em;
        font-weight: 500;
    }

    /* Estilos para los filtros */
    .filter-group {
        position: relative;
    }

    .filter-group label {
        position: absolute;
        left: -9999px;
    }

    #filtroRol,
    #filtroTipo,
    #filtroEstado,
    #filtroPlanRecreacional {
        min-width: 160px;
    }

    #buscadorUsuarios,
    #buscadorGeneral,
    #buscadorControlEstudios {
        min-width: 200px;
    }

    /* Responsividad */
    @media (max-width: 768px) {
        .card-header>div {
            gap: 0.5rem !important;
        }

        #filtroRol,
        #filtroTipo,
        #filtroEstado,
        #filtroPlanRecreacional,
        #buscadorUsuarios,
        #buscadorGeneral,
        #buscadorControlEstudios {
            width: 100%;
        }
    }
</style> @endsection @section('script') <script>
    document.addEventListener('DOMContentLoaded', function() {
        // 1. Filtrado para la tabla de usuarios
        const filtroRol = document.getElementById('filtroRol');
        const buscadorUsuarios = document.getElementById('buscadorUsuarios');
        const btnLimpiarFiltrosUsuarios = document.getElementById('btnLimpiarFiltrosUsuarios');
        const tablaUsuarios = document.getElementById('table-usuarios');
        const contadorUsuariosVisibles = document.getElementById('contadorUsuariosVisibles');

        function aplicarFiltrosUsuarios() {
            const rol = filtroRol.value.toLowerCase();
            const busqueda = buscadorUsuarios.value.toLowerCase();
            let filasVisibles = 0;
            const filas = tablaUsuarios.querySelectorAll('tbody tr');
            filas.forEach(fila => {
                const filaRol = fila.getAttribute('data-rol').toLowerCase();
                const filaTexto = fila.textContent.toLowerCase();
                const coincideRol = rol === '' || filaRol === rol;
                const coincideBusqueda = busqueda === '' || filaTexto.includes(busqueda);
                if (coincideRol && coincideBusqueda) {
                    fila.style.display = '';
                    filasVisibles++;
                } else {
                    fila.style.display = 'none';
                }
            });
            contadorUsuariosVisibles.textContent = filasVisibles;
        }
        // Event listeners para los filtros de usuarios
        [filtroRol, buscadorUsuarios].forEach(elemento => {
            elemento.addEventListener('change', aplicarFiltrosUsuarios);
            if (elemento === buscadorUsuarios) {
                elemento.addEventListener('keyup', aplicarFiltrosUsuarios);
            }
        });
        // Limpiar filtros de usuarios
        btnLimpiarFiltrosUsuarios.addEventListener('click', function() {
            filtroRol.value = '';
            buscadorUsuarios.value = '';
            aplicarFiltrosUsuarios();
        });
        // 2. Filtrado avanzado para certificados
        const filtroTipo = document.getElementById('filtroTipo');
        const filtroEstado = document.getElementById('filtroEstado');
        const buscadorGeneral = document.getElementById('buscadorGeneral');
        const btnLimpiarFiltros = document.getElementById('btnLimpiarFiltros');
        const tablaCertificados = document.getElementById('tablaCertificados');
        const contadorFilas = document.getElementById('contadorFilas');

        function aplicarFiltros() {
            const tipo = filtroTipo.value.toLowerCase();
            const estado = filtroEstado.value.toLowerCase();
            const busqueda = buscadorGeneral.value.toLowerCase();
            let filasVisibles = 0;
            const filas = tablaCertificados.querySelectorAll('tbody tr');
            filas.forEach(fila => {
                const filaTipo = fila.getAttribute('data-tipo').toLowerCase();
                const filaEstado = fila.getAttribute('data-estado').toLowerCase();
                const filaTexto = fila.textContent.toLowerCase();
                const coincideTipo = tipo === '' || filaTipo === tipo;
                const coincideEstado = estado === '' || filaEstado === estado;
                const coincideBusqueda = busqueda === '' || filaTexto.includes(busqueda);
                if (coincideTipo && coincideEstado && coincideBusqueda) {
                    fila.style.display = '';
                    filasVisibles++;
                } else {
                    fila.style.display = 'none';
                }
            });
            contadorFilas.textContent = filasVisibles;
        }
        // Event listeners para los filtros
        [filtroTipo, filtroEstado, buscadorGeneral].forEach(elemento => {
            elemento.addEventListener('change', aplicarFiltros);
            if (elemento === buscadorGeneral) {
                elemento.addEventListener('keyup', aplicarFiltros);
            }
        });
        // Limpiar filtros
        btnLimpiarFiltros.addEventListener('click', function() {
            filtroTipo.value = '';
            filtroEstado.value = '';
            buscadorGeneral.value = '';
            aplicarFiltros();
        });
        // 3. Filtrado para Control de Estudios
        const filtroPlanRecreacional = document.getElementById('filtroPlanRecreacional');
        const buscadorControlEstudios = document.getElementById('buscadorControlEstudios');
        const btnLimpiarFiltrosControl = document.getElementById('btnLimpiarFiltrosControl');
        const tablaControlEstudios = document.getElementById('table-control');
        const contadorControlEstudios = document.getElementById('contadorControlEstudios');

        function aplicarFiltrosControlEstudios() {
            const plan = filtroPlanRecreacional.value.toUpperCase();
            const busqueda = buscadorControlEstudios.value.toLowerCase();
            let filasVisibles = 0;
            const filas = tablaControlEstudios.querySelectorAll('tbody tr');
            filas.forEach(fila => {
                const filaPlan = fila.getAttribute('data-plan-recreacional').toUpperCase();
                const filaTexto = fila.textContent.toLowerCase();
                const coincidePlan = plan === '' || filaPlan === plan;
                const coincideBusqueda = busqueda === '' || filaTexto.includes(busqueda);
                if (coincidePlan && coincideBusqueda) {
                    fila.style.display = '';
                    filasVisibles++;
                } else {
                    fila.style.display = 'none';
                }
            });
            contadorControlEstudios.textContent = filasVisibles;
        }
        // Event listeners para los filtros de control de estudios
        [filtroPlanRecreacional, buscadorControlEstudios].forEach(elemento => {
            elemento.addEventListener('change', aplicarFiltrosControlEstudios);
            if (elemento === buscadorControlEstudios) {
                elemento.addEventListener('keyup', aplicarFiltrosControlEstudios);
            }
        });
        // Limpiar filtros de control de estudios
        btnLimpiarFiltrosControl.addEventListener('click', function() {
            filtroPlanRecreacional.value = '';
            buscadorControlEstudios.value = '';
            aplicarFiltrosControlEstudios();
        });
        // Cargar detalle del certificado en el modal
        const detalleModal = document.getElementById('detalleCertificadoModal');
        if (detalleModal) {
            detalleModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const certificadoId = button.getAttribute('data-id');
                const modalBody = this.querySelector('#contenidoDetalleCertificado');
                // Mostrar spinner mientras carga
                modalBody.innerHTML = `
	 <div class="text-center py-5">
	 <div class="spinner-border text-primary" role="status">
	 <span class="visually-hidden">Cargando...</span>
	 </div>
	 </div>
	 `;
                // Cargar contenido via AJAX
                fetch(`/admin/certificados/${certificadoId}/detalle`).then(response => response.text()).then(html => {
                    modalBody.innerHTML = html;
                }).catch(error => {
                    modalBody.innerHTML = `
	 <div class="alert alert-danger">
	 Error al cargar los detalles del certificado.
	 </div>
	 `;
                });
            });
        }
        // Configuración del botón de imprimir
        document.getElementById('btnImprimirCertificado')?.addEventListener('click', function() {
            window.print();
        });
        // Contador animado para usuarios
        const elemento = document.getElementById("contadorUsuarios");
        if (elemento) {
            const valorFinal = parseInt(elemento.getAttribute("data-valor"));
            let valorActual = 0;
            const animar = setInterval(() => {
                valorActual += Math.ceil(valorFinal / 40);
                if (valorActual >= valorFinal) {
                    valorActual = valorFinal;
                    clearInterval(animar);
                    elemento.classList.add('animate');
                }
                elemento.innerText = valorActual.toLocaleString();
            }, 40);
        }
        // Filtrado para otras tablas
        function filterTable(input, tableId) {
            const filter = input.value.toLowerCase();
            const rows = document.querySelectorAll(`#${tableId} tbody tr`);
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(filter) ? '' : 'none';
            });
        }
        // Configurar el modal de edición de usuario
        const editarModal = document.getElementById('editarUsuarioModal');
        if (editarModal) {
            editarModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const id = button.getAttribute('data-id');
                const nombre = button.getAttribute('data-name');
                const email = button.getAttribute('data-email');
                const rol = button.getAttribute('data-rol');
                const form = document.getElementById('formEditarUsuario');
                form.action = `/admin/usuarios/${id}`;
                document.getElementById('edit_nombre').value = nombre;
                document.getElementById('edit_email').value = email;
                document.getElementById('edit_rol').value = rol;
                document.getElementById('editarUsuarioModalLabel').textContent = `Editar Usuario #${id}`;
            });
        }
        // Configurar el modal de confirmación de eliminación
        const confirmarEliminarModal = document.getElementById('confirmarEliminarModal');
        let usuarioIdAEliminar = null;
        document.querySelectorAll('.btn-eliminar').forEach(btn => {
            btn.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const nombre = this.getAttribute('data-name');
                usuarioIdAEliminar = id;
                document.getElementById('nombreUsuarioEliminar').textContent = nombre;
                const modal = new bootstrap.Modal(confirmarEliminarModal);
                modal.show();
            });
        });
        document.getElementById('confirmarEliminarBtn').addEventListener('click', function() {
            if (usuarioIdAEliminar) {
                const form = document.getElementById(`delete-form-${usuarioIdAEliminar}`);
                form.submit();
            }
        });
        const rechazarModal = document.getElementById('rechazarModal');
        if (rechazarModal) {
            rechazarModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                if (!button) return; // prevención
                const inscripcionId = button.getAttribute('data-inscripcion-id');
                if (!inscripcionId) {
                    console.error('No se encontró el ID de inscripción para el rechazo');
                    return;
                }
                const form = document.getElementById('formRechazarCertificado');
                if (!form) return;
                // Aquí forzamos ruta admin para pruebas o confirmamos si la url contiene "admin"
                const esAdmin = window.location.pathname.includes('/admin');
                const ruta = esAdmin ? `/admin/certificados/${inscripcionId}/rechazar` : `/facilitador/inscripciones/${inscripcionId}/rechazar`;
                form.action = ruta;
                // Limpiar textarea
                const motivoTextarea = form.querySelector('#motivo');
                if (motivoTextarea) {
                    motivoTextarea.value = '';
                }
            });
        }
    });
</script> @endsection