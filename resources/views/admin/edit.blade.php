@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4 text-primary fw-bold">Panel de Administración</h1>

    <!-- Usuarios -->
    <h2>Usuarios ({{ $totalUsuarios }})</h2>
    <table class="table table-striped mb-5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->id }}</td>
                <td>{{ $usuario->name }}</td>
                <td>{{ $usuario->email }}</td>
                <td>{{ ucfirst($usuario->rol) }}</td>
                <td>
                    <a href="{{ route('admin.usuarios.edit', $usuario->id) }}" class="btn btn-sm btn-primary">Editar</a>
                    <form action="{{ route('admin.usuarios.destroy', $usuario->id) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('¿Eliminar usuario?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Control de Estudios -->
    <h2>Control de Estudios</h2>
    <table class="table table-striped mb-5">
        <thead>
            <tr>
                <th>ID</th>
                <th>Detalle</th>
                <!-- agrega columnas según tu tabla control_de_estudios -->
            </tr>
        </thead>
        <tbody>
            @foreach($control_estudio as $control)
            <tr>
                <td>{{ $control->id }}</td>
                <td>{{ $control->detalle ?? 'N/A' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Inscripciones -->
    <h2>Inscripciones</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Tipo Formación</th>
                <th>Estado</th>
                <th>Certificado</th>
                <th>Aprobación Facilitador</th> <!-- Nueva columna añadida -->
            </tr>
        </thead>
        <tbody>
            @foreach($inscripciones as $inscripcion)
            <tr>
                <td>{{ $inscripcion->nombre }}</td>
                <td>
                    @switch($inscripcion->tipo_formacion)
                        @case('C') Curso @break
                        @case('T') Taller @break
                        @case('D') Diplomado @break
                        @default Desconocido
                    @endswitch
                </td>
                <td>{{ $inscripcion->estado }}</td>
                <td>
                    @if($inscripcion->aprobado_por_facilitador === true)
                        @if($inscripcion->certificado_pdf_path)
                            <a href="{{ asset('storage/' . $inscripcion->certificado_pdf_path) }}" 
                               target="_blank" class="btn btn-sm btn-success">
                               Descargar certificado
                            </a>
                        @else
                            <a href="{{ route('admin.certificado.edit', $inscripcion->id) }}" 
                               class="btn btn-sm btn-warning">
                               Subir certificado
                            </a>
                        @endif
                    @elseif($inscripcion->aprobado_por_facilitador === false)
                        <span class="text-danger">No aprobado</span>
                    @else
                        <span class="text-warning">Pendiente</span>
                    @endif
                </td>
                <td>
                    @if($inscripcion->aprobado_por_facilitador === true)
                        <span class="text-success">Aprobado</span>
                    @elseif($inscripcion->aprobado_por_facilitador === false)
                        <span class="text-danger">Rechazado</span>
                    @else
                        <span class="text-warning">Pendiente</span>
                    @endif
                    @if($inscripcion->facilitador)
                        <br><small>Por: {{ $inscripcion->facilitador->name }}</small>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection