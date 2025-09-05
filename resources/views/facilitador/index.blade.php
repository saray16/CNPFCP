@extends('layouts.app')

@section('title', 'Aprobación de Certificados - Facilitador')

@section('content')
<div class="container py-4">
    <h1 class="text-center mb-4 fw-bold">Aprobación de Certificados</h1>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
    </div>
    @endif

    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
    </div>
    @endif

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
                    <tbody>
                        @forelse($inscripciones as $inscripcion)
                        <tr data-tipo="{{ $inscripcion->tipo_formacion }}" data-estado="{{ $inscripcion->estado_formacion }}">
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
                            <td>
                                @if($inscripcion->tipo_formacion === 'C')
                                    {{ $inscripcion->curso }}
                                @elseif($inscripcion->tipo_formacion === 'T')
                                    {{ $inscripcion->taller }}
                                @elseif($inscripcion->tipo_formacion === 'D')
                                    {{ $inscripcion->diplomado }}
                                @endif
                            </td>
                            <td class="text-center">
                                @switch($inscripcion->tipo_formacion)
                                    @case('C') 
                                        <span class="badge rounded-pill bg-primary bg-opacity-10 text-primary">
                                            <i class="bi bi-book me-1"></i> Curso
                                        </span>
                                    @break
                                    @case('T')
                                        <span class="badge rounded-pill bg-info bg-opacity-10 text-info">
                                            <i class="bi bi-tools me-1"></i> Taller
                                        </span>
                                    @break
                                    @case('D')
                                        <span class="badge rounded-pill bg-warning bg-opacity-10 text-warning">
                                            <i class="bi bi-award me-1"></i> Diplomado
                                        </span>
                                    @break
                                @endswitch
                            </td>
                            <td class="text-center">
                                @if($inscripcion->estado_formacion === 'aprobado')
                                    <span class="badge rounded-pill bg-success bg-opacity-10 text-success">
                                        <i class="bi bi-check-circle me-1"></i> Aprobado
                                    </span>
                                @elseif($inscripcion->estado_formacion === 'pendiente')
                                    <span class="badge rounded-pill bg-warning bg-opacity-10 text-warning">
                                        <i class="bi bi-clock-history me-1"></i> Pendiente
                                    </span>
                                @else
                                    <span class="badge rounded-pill bg-danger bg-opacity-10 text-danger">
                                        <i class="bi bi-x-circle me-1"></i> Rechazado
                                    </span>
                                @endif
                            </td>
                            <td class="text-center">
                                {{ date('d/m/Y', strtotime($inscripcion->created_at)) }}
                            </td>
                            <td class="text-center">
                        @if($inscripcion->estado_formacion === 'pendiente')
<div class="d-flex justify-content-center gap-2">
    <form method="POST" action="{{ route('facilitador.aprobar', $inscripcion->id) }}" class="m-0">
        @csrf
        <button type="submit" class="btn btn-sm btn-success" title="Aprobar certificado">
            <i class="bi bi-check-lg"></i> Aprobar
        </button>
    </form>
    <button type="button" class="btn btn-sm btn-danger" 
        data-bs-toggle="modal" 
        data-bs-target="#rechazarModal"
        data-inscripcion-id="{{ $inscripcion->id }}">
        <i class="bi bi-x-lg"></i> Rechazar
    </button>
</div>
@elseif($inscripcion->estado_formacion === 'pendiente_admin')
<span class="badge bg-info">Esperando admin</span>
@elseif($inscripcion->estado_formacion === 'rechazado_facilitador')
  <div>
<span class="badge bg-danger">Rechazado</span>
    @if($inscripcion->comentarios_rechazo_facilitador)
                <div class="small text-muted mt-1">
                    <i class="bi bi-chat-left-text"></i> {{ $inscripcion->comentarios_rechazo_facilitador }}
                </div>
            @endif
        </div>
    @endif
</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">No hay inscripciones pendientes</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal para Rechazar Certificado -->
<div class="modal fade" id="rechazarModal" tabindex="-1" aria-labelledby="rechazarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-white" style="background: linear-gradient(90deg, #e74c3c, #c0392b);">
                <h5 class="modal-title" id="rechazarModalLabel">Rechazar Certificado</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <form id="formRechazarCertificado" method="POST" action="">
                @csrf
                @method('POST')
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="motivo" class="form-label">Motivo del rechazo (será visible para el administrador)</label>
                        <textarea class="form-control" id="motivo" name="motivo" rows="3" required></textarea>
                        <small class="text-muted">Explica brevemente por qué rechazas este certificado.</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">
                        <i class="bi bi-x-circle me-1"></i> Confirmar Rechazo
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Configurar el modal de rechazo
     const rechazarModal = document.getElementById('rechazarModal');
    if (rechazarModal) {
        rechazarModal.addEventListener('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const inscripcionId = button.getAttribute('data-inscripcion-id');
            const form = document.getElementById('formRechazarCertificado');
            
            // Actualizar la acción del formulario
            form.action = `/facilitador/inscripciones/${inscripcionId}/rechazar`;
            
            // Limpiar el textarea cada vez que se abre el modal
            const motivoTextarea = form.querySelector('#motivo');
            if (motivoTextarea) {
                motivoTextarea.value = '';
            }
        });
    }

    // Filtrado para la tabla de certificados
    const filtroTipo = document.getElementById('filtroTipo');
    const buscadorGeneral = document.getElementById('buscadorGeneral');
    const btnLimpiarFiltros = document.getElementById('btnLimpiarFiltros');
    const tablaCertificados = document.getElementById('tablaCertificados');
    
    function aplicarFiltros() {
        const tipo = filtroTipo.value;
        const busqueda = buscadorGeneral.value.toLowerCase();
        
        const filas = tablaCertificados.querySelectorAll('tbody tr');
        
        filas.forEach(fila => {
            const filaTipo = fila.getAttribute('data-tipo');
            const filaTexto = fila.textContent.toLowerCase();
            
            const coincideTipo = tipo === '' || filaTipo === tipo;
            const coincideBusqueda = busqueda === '' || filaTexto.includes(busqueda);
            
            if (coincideTipo && coincideBusqueda) {
                fila.style.display = '';
            } else {
                fila.style.display = 'none';
            }
        });
    }
    
    // Event listeners para los filtros
    [filtroTipo, buscadorGeneral].forEach(elemento => {
        elemento.addEventListener('change', aplicarFiltros);
        if (elemento === buscadorGeneral) {
            elemento.addEventListener('keyup', aplicarFiltros);
        }
    });
    
    // Limpiar filtros
    btnLimpiarFiltros.addEventListener('click', function() {
        filtroTipo.value = '';
        buscadorGeneral.value = '';
        aplicarFiltros();
    });
});
</script>
@endsection
@endsection